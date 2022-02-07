<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts() {
        $posts = Post::orderBy('created_at', 'desc') -> get();
        return view('pages.posts', compact('posts'));
    }
    public function create() {
        $categories = Category::all();
        return view('pages.create', compact('categories'));
    }
    public function store(Request $request) {
        $data = $request -> validate([
            'title' => 'required|string|max:255', 
            'subtitle' => 'required|string|max:255',
            // 'author' => 'required|string|max:255',
            'text' => 'required|string|max:2000',
            // 'date' => 'required|date',
            // 'views' => 'required|numeric'

        ]);
        $data['author']= Auth::user() -> name;
        $category = Category::findOrFail($request -> get('category_id'));

        $post = Post::make($data);
        $post -> category() -> associate($category);
        $post -> save();

        return redirect() -> route('posts');




    }
    
}
