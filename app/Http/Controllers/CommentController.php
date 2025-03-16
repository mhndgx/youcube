<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){

    }

    public function store(Request $request, $video_id){
        $request->validate([
            'comment'=> 'required',
        ]);

        Comments::create([
            'comment'=> $request->comment,
            'user_id' => auth()->user()->id,
            'video_id' => $video_id,
            'likes' => 0,
        ]);

        return back()->with('success','201');
    }

    public function like(Comments $comment)
    {
        $comment->increment('likes'); // Increase likes by 1
        return back()->with('success', 'Liked the comment');
    }

    public function dislike(Comments $comment)
    {
        if ($comment->likes > 0) { // Ensure likes don't go below 0
            $comment->decrement('likes'); // Decrease likes by 1
        }
        return back()->with('success', 'Disliked the comment');
    }
}
