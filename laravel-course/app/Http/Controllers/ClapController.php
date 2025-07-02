<?php

namespace App\Http\Controllers;

use App\Models\Clap;
use App\Models\Post;
use Illuminate\Http\Request;

class ClapController extends Controller
{
    public function clapOrUnclap(Post $post)
    {
        $hasClapped = auth()->user()->hasClapped($post);

        if ($hasClapped) {
            // If the user has already clapped, we remove the clap
            $post->claps()->where('user_id', auth()->id())->delete();

        } else {
            // Clap::create([
            //     'post_id' => $post->id,
            //     'user_id' => auth()->id(),
            // ]);

            $post->claps()->create([
                'user_id' => auth()->id(),
            ]);
        }

        return response()->json([
            'clapsCount' => $post->claps()->count(),
        ]);
    }
}
