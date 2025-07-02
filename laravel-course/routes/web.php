<?php

use App\Http\Controllers\ClapController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [PostController::class, 'index'])
//     ->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/post/create', [PostController::class, 'create'])
//     ->middleware(['auth', 'verified'])->name('post.create');

Route::get('/@{user:username}', [PublicProfileController::class, 'show'])
    ->name('profile.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PostController::class, 'index'])
        ->name('dashboard');

    Route::get('/post/create', [PostController::class, 'create'])
        ->name('post.create');

    Route::post('/post/create', [PostController::class, 'store'])
        ->name('post.store');

    // {post} (post id, can send Post or id)
    // Route::get('/@{username}/{post}', [PostController::class, 'show'])->name('post.show');

    // Using slug instead of id for better SEO and readability
    // {post:slug} (post slug, can send Post or slug)
    // This allows us to have more readable URLs like /@username/post-title
    // and also helps with SEO.
    // This is a route model binding, so it will automatically resolve the Post model
    // based on the slug provided in the URL.
    // If the slug does not match any post, it will return a 404 error.
    Route::get('/@{username}/{post:slug}', [PostController::class, 'show'])->name('post.show');

    Route::post('/follow/{user}', [FollowerController::class, 'followOrUnfollow'])->name('follow');

    Route::post('/clap/{post}', [ClapController::class, 'clap'])->name('clap');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
