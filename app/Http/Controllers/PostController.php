<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            $imagePath = Storage::url($post->featured_image);
            return view('posts/post', [
                'post' => $post,
                'imagePath' => $imagePath,
            ]);
        }

        // No match was found
        abort(404);
    }
}
