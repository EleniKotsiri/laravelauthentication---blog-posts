<?php

namespace App\Http\Controllers;

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
        return view('posts.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        dd('passed validation');

        // return redirect('dashboard');
    }
}
