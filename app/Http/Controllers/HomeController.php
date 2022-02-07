<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    // public function posts() {
    //     $posts = Post::all();
    //     return view('pages.posts', compact('posts'));
    // }
    public function create() {
        return view('pages.create');
    }
    public function store(Request $request) {
        $data = $request -> validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'text' => 'required|string|max:2000',
            'date' => 'required|date',
            'views' => 'required|numeric'

        ]);
        $post = Post::create($data);

        return redirect() -> route('home');




    }
}
