<?php

namespace App\Http\Controllers;

use DB;
use App\Media;
use App\Http\Requests;
use App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MediaController extends Controller
{
   
   	public function index()
    { 
		$media = Media::orderBy('created_at', 'DESC')->get();
   	   	return view('backend.media.index', compact('media'));
   	}


	public function create()
    { 
   	   	return view('backend.media.create');
   	}


	public function store(Request $request)
    {
		$this->validate($request, [
			'title' => 'required|unique:media',
		]);
		// dd($request->all());
		if($request->has('filex') && ($request->type == 'video' || $request->type == 'audio')){
			// Upload media
			// dd($request->isFree);
			if($request->isFree == 'yes'){
				$upload = $this->uploadImage($request->filex, 'assets/media');
				$request['file'] = 'assets/media/' . $upload;
			}else{
			   
				$imageName = uniqid(9) . '.' . $request->filex->getClientOriginalExtension();
				
				$request->filex->move(base_path('uploads'), $imageName);
				$request['file'] = $imageName;
			}
		}
	
		if($request->has('image')){
			$featured_image = $this->uploadImage($request->image, 'assets/media/featured_images');
			$request['featured_image'] = 'assets/media/featured_images/' . $featured_image;
		}
		$request['slug'] = Str::slug($request->title);
		$request['uploaded_by'] = auth()->user()->name;

        Media::create($request->except(['_token', '_method', 'image']));

		return redirect()->route('media.index')->with('message', 'Media successfully added');
    }

	public function edit(Media $media, $id)
    {
		$media = Media::find($id);
	
   	   	return view('backend.media.update', compact('media'));
    }

	public function update(Request $request, $id)
    {
		$media = Media::find($id);
		
		if($request->has('image')){
			$featured_image = $this->uploadImage($request->image, 'assets/media/featured_images');
			$request['featured_image'] = 'assets/media/featured_images/' . $featured_image;
		}else{
			$request['featured_image'] = $media->featured_image;
		}
		
		if($request->isFree != $media->isFree && $request->isFree == 'no'){
			$cut = substr($media->file, 13);
			
			try {
				rename(public_path($media->file), base_path('uploads').'/'. $cut);
				$request['file'] = $cut;
			} catch (\Exception $th) {
				//throw $th;
				
			}
			
		}

		if($request->isFree != $media->isFree && $request->isFree == 'yes'){
			
			try {
				rename(base_path('uploads').'/'. $media->file, public_path('assets/media/'.$media->file));
				$request['file'] = 'assets/media/'.$media->file;
			} catch (\Exception $th) {
				//throw $th;
				
			}
			
		}
		
		$request['slug'] = Str::slug($request->title);
		$request['isFree'] = $request->isFree ?? $media->isFree;
		// dd($request->all());
        $media->update($request->except(['_token', '_method', 'image']));

		return back()->with('message', 'Update successful');
    }

	public function destroy(Media $media, $id)
    {
		$media = Media::find($id);
		if(isset($media->featured_image) && $media->featured_image != 'assets/media/featured_images/blog-3.jpeg'){
			$this->deleteImage($media->featured_image);
		}

		if($media->type == 'audio' || $media->type == 'video'){
			try {
				if($media->isFree == 'yes'){
					$this->deleteImage($media->featured_image);
				}else{
					if (file_exists(base_path('uploads/'.$media->file))){
						unlink(base_path('uploads/'.$media->file));
					}
				}
				} catch (\Throwable $th) {
					//throw $th;
				}
		}
		
        $media->delete();

		return back()->with('message', 'delete successful');
    }

	public function paidMedia2($id){
		$media = Media::find($id);
		return response()->download(base_path('uploads/'.$media->file));

	}
  
}
