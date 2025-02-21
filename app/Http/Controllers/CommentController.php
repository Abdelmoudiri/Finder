<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Annonce $annonce)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->id();
        $comment->annonce_id = $annonce->id;
        $comment->save();

        return back()->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            return back()->with('error', 'Unauthorized action.');
        }

        $comment->delete();
        return back()->with('success', 'Comment deleted successfully!');
    }
    //
}
