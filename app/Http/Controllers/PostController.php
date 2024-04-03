<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index')->with([
            'posts' => $posts,
            'recent_posts' => Post::latest()->get()->take(3)
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        if($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }
        $post = Post::create([
            'title' => $request->title,
            'contents' => $request->contents,
            'theme' => $request->theme,
            'info' => $request->info,
            'photo' => $path ?? null,
        ]);

        return redirect()->route('posts.index');

    }

    public function show(Post $post)
    {
        return view('posts.show')->with([
            'post' => $post,
            'recent_posts' => Post::latest()->get()->except($post->id)->take(3)
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        if ($request->hasFile('photo')) {

            if (isset($post->photo)) {
                Storage::delete($post->photo);
            }

            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }

        $post->update([
            'title' => $request->title,
            'contents' => $request->contents,
            'theme' => $request->theme,
            'info' => $request->info,
            'photo' => $path ?? null,
        ]);

        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy(string $id)
    {
        //
    }
}
