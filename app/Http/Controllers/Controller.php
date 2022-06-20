<?php

namespace App\Http\Controllers;

use App\Page;
use App\Setting;
use Faker\Provider\Image;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
       $this->setting = Setting::first();
    }

    public function sendEmails($data){        
        try {
            Mail::to($data['email'])->send(new NotificationMail($data));
        } catch (\Exception $th) {
            //throw $th;
            // dd($th->getMessage());
        }
    }

    public function uploadImage($file, $folder){
               
        $imageName = uniqid(9) . '.' . $file->getClientOriginalExtension();
        
        if(!is_dir($folder))
        {
            mkdir($folder);
        }

        $file->move(public_path($folder), $imageName);
        return $imageName;
    }

    public function deleteImage($image){
        
        if (file_exists(public_path($image))){
            unlink(public_path($image));
        }
        
        return;
    }
    
}
