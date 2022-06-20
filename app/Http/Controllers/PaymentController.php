<?php

namespace App\Http\Controllers;

use App\User;
use Paystack;
use App\Wallet;
use App\Transaction;
use App\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Traits\FunctionsTrait;

class PaymentController extends Controller
{
    public function allTransactions()
    {
        $i = 1;
        if($this->isAdmin()){
           $walletTrans = Transactions::orderBy('created_at', 'DESC')->with('user')->get();
            return view('dash.admin.users.wallet_transactions', compact('walletTrans'));
        }else{
            $walletTrans = Transactions::with('user')->whereUserId(auth()->user()->id)
            ->orderBy('created_at', 'DESC')->get();
            return view('dash.users.transactions.online', compact('walletTrans', 'i'));
        }
    }

    public function redirectToGateway(Request $request)
    {
        
        $user = $this->createUser($request->all());
        try {
           return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            $res = explode("{", $e->getMessage());
            return redirect()->back()->withErrors(['message' => preg_replace('/[^A-Za-z0-9 \:]/', '', $res[array_key_last($res)].". Please check your internet connection")]);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $user = User::where('email', $paymentDetails['data']['customer']['email'])->first();
        
        if($paymentDetails['data']['status'] == 'success'){
            
            $data = [
                'reference' => $paymentDetails['data']['reference'],
                'amount' => $paymentDetails['data']['amount']/100,
                'user_id' => $user->id ?? 0,
                'product' => $paymentDetails['data']['metadata']['product'] ?? 0,
                'type' => $paymentDetails['data']['metadata']['type'],
            ];

            $transaction = $this->createTransaction($data);

            Auth::login($user);
            // Send emails
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['phone'] = $paymentDetails['data']['customer']['phone'] ?? null;
            $data['product_name'] = $transaction->media->title ?? $transaction->type ?? null; 

            $data['type'] = 'new_product_user';
            
            $this->sendEmails($data);
            $data['type'] = 'new_product_admin';
            $data['email'] = $this->setting->mail;
            $this->sendEmails($data);
          
            return redirect(route('transactions.index'))->with('message', 'Transaction successful, thank you!');

        }

    }

    public function createUser($request){
        $user = User::firstOrCreate(
            ['email' =>  $request['email']],
                [
                    'name' => $request['name'], 
                    'password' => bcrypt(12345),

                ],
        );
        
        return $user;
    }

    public function createTransaction($data){
        $transaction = Transaction::create($data);
        
        return $transaction;
    }
}
