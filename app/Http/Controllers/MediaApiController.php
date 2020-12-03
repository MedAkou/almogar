<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaApiController extends Controller
{
    /**
     * Get all medias.
     * 
     * @return JsonResponse
     */
    public function index(){
        return new JsonResponse([
            'media' => Media::get()
        ]);
    }

    /**
     * Get media which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function details($id){
        return new JsonResponse([
            'media' => Media::find($id)
        ]);
    }

    /**
     * Updload media.
     * 
     * @return JsonResponse
     */
    public function upload(){
        $dir = public_path('uploads/media');
        $file = $_FILES['media_file'];

        // set the uploader
        $uploader   = new \App\Helpers\Uploader('start');
        $uploaded = $uploader->file($file)->dir($dir)->save();
        
        $media = new Media();
        $media->name = $uploaded->file['name'];
        $media->post_mime_type = $uploaded->file['type'];
        $media->size = $uploaded->file['size'];
        $media->store_id = \Auth::user()->id;

        $media->save();
        return new JsonResponse([
            'status' => 'success',
            'message' => 'Media uploaded successfully'
        ]);
    }

    /**
     * Update media which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function update($id){
        $dir = public_path('uploads/media');
        $file = $_FILES['media_file'];

        // set the uploader
        $uploader   = new \App\Helpers\Uploader('start');
        $uploaded = $uploader->file($file)->dir($dir)->save();
        
        $media = Media::find($id);
        $media->name = $uploaded->file['name'];
        $media->post_mime_type = $uploaded->file['type'];
        $media->size = $uploaded->file['size'];
        // $media->store_id = \Auth::user()->id;

        $media->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Media updated successfully'
        ]);
    }

    /**
     * Delete media which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id){
        Media::find($id)->delete();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'Media deleted successfully'
        ]);
    }
}
