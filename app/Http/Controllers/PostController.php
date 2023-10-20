<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['User' , 'Comment' , 'Category'])->paginate(3);
        foreach ($posts as $post) {
            $post->setAttribute('added_at', $post->created_at->diffForHumans());
            $post->setAttribute('comments_counts', $post->Comment->count());

        }
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
//        return $post->Comment;
        return response()->json([
            'id'=>$post->id,
            'slug'=>$post->slug,
            'body'=>$post->body,
            'added_at'=>$post->created_at->diffForHumans(),
            'comments_counts'=>$post->Comment()->count(),
            'user'=>$post->User,
            'image'=>$post->image,
            'title'=>$post->title,
            'category'=>$post->Category,
            'comments'=>$this->commentsFormatted($post->Comment),
        ]);
    }

    public function commentsFormatted($comments)
    {
        $new_comments=[];
        foreach ($comments as $comment){
            $new_comments[] = [
                'id' => $comment->id,
                'body' => $comment->body,
                'user' => $comment->user,
                'added_at' => $comment->created_at->diffForHumans(),
            ];
        }
        return $new_comments;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    /**
     * Return Posts By Category.
     */
    public function categoryPosts($slug)
    {
         $category = Category::where('slug' , $slug)->first();
         $posts = Post::where('category_id',$category->id)
             ->with(['User' , 'Comment' , 'Category'])->get();

         foreach ($posts as $post) {
             $post->setAttribute('added_at', $post->created_at->diffForHumans());
             $post->setAttribute('comments_counts', $post->Comment->count());
         }

         return response()->json($posts);
    }
    /**
     * Return Posts By Category.
     */
    public function searchPosts($query)
    {
         $posts = Post::where('title','like','%'. $query .'%')
             ->with(['User' , 'Comment' , 'Category']);
        $post_count=count($posts->get());
         foreach ($posts->get() as $post) {
             $post->setAttribute('added_at', $post->created_at->diffForHumans());
             $post->setAttribute('comments_counts', $post->Comment->count());
         }
         $posts = $posts->paginate($post_count);

         return response()->json($posts);
    }


}
