<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(6);

        return view('posts.index')->with([
            'posts' => $posts,
            'recent_posts' => Post::latest()->get()->take(3),
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('posts.create')->with([
            'categories' => Category::all(),
        ]);
    }

    public function store(StorePostRequest $request)
    {
        if($request->hasFile('photo')) {
            $name = $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('post-photos', $name);
        }
        $post = Post::create([
            'user_id' => 1,
            'category_id' => $request->category_id,
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
            'recent_posts' => Post::latest()->get()->except($post->id)->take(3),
            'categories' => Category::all(),
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

    public function destroy(Post $post)
    {
        if (isset($post->photo)) {
            Storage::delete($post->photo);
        }

        $post->delete();

        return redirect()->route('posts.index');
    }
}
