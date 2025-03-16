<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $videos = \App\Models\Video::latest()->with('user')->get();
    return view('welcome', compact('videos'));
});

Route::get('/dashboard', function () {
    $videos = \App\Models\Video::latest()->with('user')->get();
    return view('dashboard',compact('videos'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/videos/upload', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
    Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');
    Route::post('/comments/{video_id}', [CommentController::class, 'store'])->name('comment.store');
    Route::patch('/comments/{comment}/like', [CommentController::class, 'like'])->name('comment.like');
    Route::patch('/comments/{comment}/dislike', [CommentController::class, 'dislike'])->name('comment.dislike');
    Route::patch('/videos/{video}/like', [VideoController::class, 'like'])->name('video.like');
    Route::patch('/videos/{video}/dislike', [VideoController::class, 'dislike'])->name('video.dislike');

});

Route::get('/allvids', function () {
    $videos = \App\Models\Video::latest()->get();
    return view('videos.index', compact('videos'));
});

require __DIR__.'/auth.php';
