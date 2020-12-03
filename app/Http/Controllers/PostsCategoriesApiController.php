<?php

namespace App\Http\Controllers;

use App\Models\PostCategories;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class PostsCategoriesApiController extends Controller
{

    /**
     * Get all posts categories.
     * 
     * @return JsonResponse
     */
    public function index(){
        return new JsonResponse([
            'postsCategories' => PostCategories::get()
        ]);
    }

    /**
     * Get posts categories which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function details($id){
        return new JsonResponse([
            'postCategory' => PostCategories::find($id)
        ]);
    }

    public function store(Request $request){
        $postsCategories = new PostCategories();

        $postsCategories->name = $request->name;
        $postsCategories->slug = str_slug($request->name);
        $postsCategories->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'post category created successfully'
        ]);
    }
    
    /**
     * Update post category which id = $id.
     * 
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id){
        $postsCategories = PostCategories::find($id);

        $postsCategories->name = $request->name;
        $postsCategories->slug = str_slug($request->name);
        $postsCategories->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'post category updated successfully'
        ]);
    }


    /**
     * Delete post category which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id){
        PostCategories::find($id)->delete();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'post category deleted successfully'
        ]);
    }

    public function duplicate($id){
        PostCategories::find($id)->replicate()->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'post category duplicated successfully'
        ]);
    }
}
