<?php

namespace App\Http\Controllers;

use App\Page;
use App\Media;
use App\Assembly;
use App\District;
use App\Leadership;
use App\Transaction;
use App\Http\Requests;
use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
   	public function home()
    { 
		$setting = $this->setting;
		$pageTitle = 'The Gospel Faith Mission International (GOFAMINT) - Wonders Cathedral, Magodo Assembly, Region 12 HQ, Magodo Lagos.';
		$media = Media::where('status', 'published')->take(4)->get();
		$pastors = Leadership::orderBy('rank', 'ASC')->get();
		// dd($pastors);
		$values = isset($setting->core_values) ? json_decode($setting->core_values, true) : [];

		return view('pages.home')
			->with('pageTitle', $pageTitle)
			->with('medias', $media)
			->with( 'pastors', $pastors)
			->with('values', $values)
			->with('setting', $setting);
   	}

	public function contact()
    { 
		$setting = $this->setting;
		$pageTitle = 'Contact us';

   	   	return view('pages.contact')
			->with('pageTitle', $pageTitle)
			->with('setting', $setting);
   	}

	public function sendContact(Request $request){
		$data = $this->validate($request, [
			'name' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
			'message' => 'required',
		]);

		$data['type'] = 'user-contact';
		
		$this->sendEmails($data);
		$data['type'] = 'admin-contact';
		$data['email'] = $this->setting->mail;
		$this->sendEmails($data);

		return back()->with('message', 'Thank you for contacting us, we will get to you in a jiffy!');
	}

	public function about(){
		$setting = $this->setting;
		$pageTitle = 'About us';

   	   	return view('pages.about')
			->with('pageTitle', $pageTitle)
			->with('setting', $setting);
	}

	public function showDistricts(){
		$setting = $this->setting;
		$pageTitle = 'Our Districts';
		$districts = District::all();
   	   	return view('pages.districts')
			->with('pageTitle', $pageTitle)
			->with('setting', $setting)
			->with('districts', $districts);
	}

	public function showAssesmblies(){
		$setting = $this->setting;
		$pageTitle = 'Our Assemblies';
		$assembly = Assembly::with('district')->get();
   	   	return view('pages.assembly')
			->with('pageTitle', $pageTitle)
			->with('setting', $setting)
			->with('assemblies', $assembly);
	}

	public function singleDistrict($id){
		$setting = $this->setting;
		$district = District::with('assemblies')->find($id);
	
		$pageTitle = $district->name. ' : Assemblies';
		$assembly = Assembly::with('district')->get();
   	   	return view('pages.single_district')
			->with('pageTitle', $pageTitle)
			->with('setting', $setting)
			->with('district', $district);
	}

	public function media(){
		$setting = $this->setting;
		$pageTitle = 'Media Gallery';
		$media = Media::where('status', 'published')->orderBy('id', 'DESC')->paginate(20);
   	   	return view('pages.media')
			->with('pageTitle', $pageTitle)
			->with('setting', $setting)
			->with('medias', $media);
	}

	public function viewMedia($slug){
		$setting = $this->setting;
		$media = Media::where('slug', $slug)->where('status', 'published')->first();
		
		if(is_null($media)){
			return abort(404);
		}
		$pageTitle = 'Media Gallery';
		$related = Media::where('type', $media->type)->where('status', 'published')->orderBy('created_at', 'DESC')->take(2)->get();
		
		return view('pages.singlemedia')
			->with('pageTitle', $pageTitle)
			->with('setting', $setting)
			->with('related', $related)
			->with('media', $media);
	}

	public function purchaseMedia($slug = null){
		$setting = $this->setting;
		$pageTitle = 'Purchase media';
		$type = 'product';
		
		$media = Media::where('slug', $slug)->where('status', 'published')->first();
		
		$total= $media->price;
		return view('pages.cart')
			->with('pageTitle', $pageTitle)
			->with('setting', $setting)
			->with('media', $media)
			->with('total', $total)
			->with('type', $type);
	}
	public function viewCart($slug){
	
	}

	public function leadership(){
		$setting = $this->setting;
		$leaders = Leadership::RankAscending()->get();
		
		$pageTitle = 'Church Leadership';
		
		return view('pages.leadership')
			->with('pageTitle', $pageTitle)
			->with('setting', $setting)
			->with('leaders', $leaders);
	}
  
	public function donate(){
		$setting = $this->setting;
		$pageTitle = 'Make Donation';
		$related = Media::where('status', 'published')->orderBy('created_at', 'DESC')->get()->take(2);

		return view('pages.donate')
			->with('pageTitle', $pageTitle)
			->with('related', $related)
			->with('setting', $setting);
	}

	public function donateCart(Request $request){
		$setting = $this->setting;
		$pageTitle = 'Make donation';
		$type = $request->type;
		$amount = $request->amount;
		$total = $amount;
		$name = $request->name;
		$email = $request->email;
		
		return view('pages.cart')
			->with('pageTitle', $pageTitle)
			->with('setting', $setting)
			->with('total', $total)
			->with('name', $name)
			->with('email', $email)
			->with('type', $type);
	}

	public function youtube(){
		$related = Media::where('status', 'published')->orderBy('created_at', 'DESC')->take(3)->get();
		$type = 'youtube';
		$setting = $this->setting;
		$pageTitle = 'Youtube Livestream';
		
		return view('pages.livestream')
			->with('pageTitle', $pageTitle)
			->with('setting', $setting)
			->with('related', $related)
			->with('type', $type);
	}

	public function paidMedia($id){
		$transaction = Transaction::find($id);
		if(!$transaction){
			return abort(404);
		}
	
		if($transaction->user->id == auth()->user()->id || auth()->user()->role == 1){
			// open for user
			$setting = $this->setting;
			$media = $transaction->media;
			
			return response()->download(base_path('uploads/'.$media->file));
		}else{
			return abort(404);
		}
	}

}
