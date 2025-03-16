<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function create()
    {
        return view('videos.upload');
    }

    public function store(Request $request)
    {
        //dd($request);
        $validData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video' => 'required' // 20MB max
        ]);
        //dd($request->file('video'));
        $path = $request->file('video')->store('videos', 'public');
        
        $video = Video::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'video_path' => $path,
        ]);
        
        return redirect()->route('videos.show',$video)->with('success', 'Video uploaded successfully!');
    }

    public function show(Video $video)
    {
        $videos = \App\Models\Video::latest()->get();
        $video->increment('views');
        $comments = $video ->comments;
        return view('videos.show', compact('video','videos','comments'));
    }

    public function like(Video $video)
    {
        $video->increment('likes'); // Increase likes by 1
        return back()->with('success', 'Liked the video');
    }

    public function dislike(Video $video)
    {
        if ($video->likes > 0) { // Ensure likes don't go below 0
            $video->decrement('likes'); // Decrease likes by 1
        }
        return back()->with('success', 'Disliked the video');
    }

    
}
