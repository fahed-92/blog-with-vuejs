<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of posts for admin.
     * @param void
     * @return JsonResponse
     */
    public function getPosts()
    {
        $posts = Post::with(['User', 'Comment', 'Category'])->paginate(5);
        foreach ($posts as $post) {
            $post->setAttribute('added_at', $post->created_at->diffForHumans());
            $post->setAttribute('comments_counts', $post->Comment->count());

        }
        return response()->json($posts);
    }

    /**
     * Display a listing of Categories for admin.
     * @param void
     * @return JsonResponse
     */
    public function getCategories()
    {
        $categoriess = Category::get();

        return response()->json($categoriess);
    }

    /**
     * Add Post for admin.
     * @param Request $request
     * @return JsonResponse
     */
    public function addPosts(Request $request)
    {
        $fileName = '';
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/images/blog/'), $fileName);
        }
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'category_id' => $request->category,
            'user_id' => Auth::id(),
            'image' => $fileName,
        ]);

        return response()->json($post);
    }

    /**
     * Update Post for admin.
     * @param Request $request
     * @return JsonResponse
     */
    public function updatePost(Request $request)
    {
        $post = Post::find($request->id);

        $fileName = $post->image;
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/images/blog/'), $fileName);
        }
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'category_id' => $request->category,
            'image' => $fileName,
        ]);

        return response()->json($post);
    }

    /**
     * Delete Posts for admin.
     * @param Request $request
     * @return JsonResponse
     */
    public function DeletePosts(Request $request)
    {
        $ids = [$request->posts_ids];
        DB::table('posts')->whereIn('id', $ids)->delete();
        return response()->json(['message' => 'deleted']);
    }

    /**
     * Display the specified resource.
     * @param Post $post
     * @return JsonResponse
     */
    public function showPost(Post $post)
    {
        return response()->json([
            'id' => $post->id,
            'slug' => $post->slug,
            'body' => $post->body,
            'added_at' => $post->created_at->diffForHumans(),
            'comments_counts' => $post->Comment()->count(),
            'user' => $post->User,
            'image' => $post->image,
            'title' => $post->title,
            'category' => $post->Category,
            'comments' => $this->commentsFormatted($post->Comment),
        ]);
    }

    /**
     * Display the specified resource.
     * @param $comments
     * @return array
     */
    public function commentsFormatted($comments)
    {
        $new_comments = [];
        foreach ($comments as $comment) {
            $new_comments[] = [
                'id' => $comment->id,
                'body' => $comment->body,
                'user' => $comment->user,
                'added_at' => $comment->created_at->diffForHumans(),
            ];
        }
        return $new_comments;
    }

}
