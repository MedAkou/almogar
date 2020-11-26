<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostsApiController extends Controller
{
    /**
     * Get all posts.
     * 
     * @return JsonResponse
     */
    public function index(){
        return new JsonResponse([
            'posts' => Post::get()
        ]);
    }

    /**
     * Get post which id = $id.
     * 
     * @param int $id
     * @return JsonResponse
     */
    public function details($id){
        return new JsonResponse([
            'post' => Post::find($id)
        ]);
    }

    /**
     * Store post.
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request){
        $post = new Post();
        $post->author = $request->author;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumbnail = $request->thumbnail;
        $post->statue = $request->statue;
        $post->comments_enabled = $request->comments_enabled;
        $post->type = $request->type;
        $post->slug = str_slug($request->title);
        $post->categoryID = $request->categoryID;

        $post->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'post created successfully'
        ]);
    }

    /**
     * Update post which id = $id.
     * 
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->author = $request->author;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->thumbnail = $request->thumbnail;
        $post->statue = $request->statue;
        $post->comments_enabled = $request->comments_enabled;
        $post->type = $request->type;
        $post->slug = str_slug($request->title);
        $post->categoryID = $request->categoryID;

        $post->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'post updated successfully'
        ]);
    }

    public function delete($id){
        Post::find($id)->delete();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'post deleted successfully'
        ]);
    }

    public function duplicate($id){
        Post::find($id)->replicate()->save();

        return new JsonResponse([
            'status' => 'success',
            'message' => 'post duplicated successfully'
        ]);
    }
}
