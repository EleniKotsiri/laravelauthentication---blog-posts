<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // add authentication in order to post something (you can't post if you aren't logged in)
        $this->middleware('auth')->only('store');
    }
    public function index()
    {
        // with('user') for eager loading 
        $posts = Post::with('user')->latest()->paginate(10); // Collection of posts | latest() == orderBy('created_at', 'desc')
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        // derives from the relationship between User and Post
        $request->user()->posts()->create($request->only('body'));

        return redirect('dashboard');
    }

    public function destroy(Request $request, Post $post)
    {
        // get post if we passed $id instead of post:
        // $post = Post::find($id);

        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
