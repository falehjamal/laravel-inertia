<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {   

        $posts = Post::all()->take(20);

        return Inertia::render('Post/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return Inertia::render('Post/Create');
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        //create post
        // for ($i=0; $i < 10; $i++) { 
        $post = Post::create([
            'title'     => $request->title,
            'content'   => $request->content
        ]);
    // }

        if($post) {
            return Redirect::route('posts.index')->with('message', 'Data Berhasil Disimpan!');
        }
    }

    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Post $post)
    {
        return Inertia::render('Post/Edit', [
            'post' => $post
        ]);
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {
        //set validation
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        //update post
        $post->update([
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        if($post) {
            return Redirect::route('posts.index')
            ->with('message', 'Data Berhasil Diupdate!');
        }
    }
    public function destroy($id)
    {
        //find post by ID
        $post = Post::findOrfail($id);

        //delete post
        $post->delete();

        if($post) {
            return Redirect::route('posts.index')->with('message', 'Data Berhasil Dihapus!');
        }

    }
}
