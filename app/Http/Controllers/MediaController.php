<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
class MediaController extends Controller {


     public function index() {
        $media = Media::orderby('id','desc')->paginate(10);
        return view('admin.media.index',compact('media'));     
    }

    public function bulkdelete() {
        Media::truncate();
        return redirect()->route('admin.media.home')->with('success','data has been deleted successfully');
    }


    public function upload() {
        
        // set the file and the dir
        $dir = public_path('uploads/media');
        $file = $_FILES['media_file'];

        // set the uploader
        $uploader   = new \App\Helpers\Uploader('start');
        $uploaded = $uploader->file($file)->dir($dir)->save();

        $data = [ 
            'name' => $uploaded->name, 
            'post_mime_type' => $uploaded->type , 
            'size' => $uploaded->size , 
            'store_id' => \Auth::user()->id
        ];

        // insert the media to database
        \App\Media::create($data);

        // return data in json
        return response()->json($data, 200);
    }



    public function remove(Request $request) {
        $media = \App\Media::find($request->file);
        $file = public_path('uploads/media').$media->name;
        $media->delete();
        \File::delete($file);
    }


}
