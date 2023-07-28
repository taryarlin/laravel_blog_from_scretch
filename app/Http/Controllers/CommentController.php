<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $attributes = $request->validate(['body' => 'required|min:1']);

        $user = auth()->user();

        $post->Comment()->create([
            'user_id' => $user->id,
            'body' => $attributes['body']
        ]);

        return back()->with('success', 'Commented');
    }
}
