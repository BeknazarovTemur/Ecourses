<?php

namespace App\Http\Controllers;


use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['show', 'index']),
        ];
    }

    public function index()
    {
        $comments = Comment::all();
    }

    public function create()
    {
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $comment = Comment::create([
            'body' => $request->body,
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
        ]);
        return redirect()->back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Comment $comment)
    {
        Gate::authorize('update', $comment);
        return view('comments.edit', ['comment' => $comment]);
    }

    public function update(Comment $comment, Request $request)
    {
        Gate::authorize('update', $comment);
        $comment->update([
            'body' => $request->get('body'),
        ]);

        return redirect()->route('posts.show', ['post'=>$comment->post]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
