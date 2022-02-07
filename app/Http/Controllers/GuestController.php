<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    // public function posts() {
    //     $posts = Post::orderBy('created_at', 'desc') -> get();
    //     return view('pages.posts', compact('posts'));
    // }
    public function home() {
        return view('pages.home');
    }
}
