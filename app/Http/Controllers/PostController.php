<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use App\Tag;
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
        $tags = Tag::all();
        return view('pages.create', compact('categories', 'tags'));
    }
    public function store(Request $request) {
        $data = $request -> validate([
            'title' => 'required|string|max:255', 
            'subtitle' => 'required|string|max:255',
            'text' => 'required|string|max:2000',
        ]);

        $data['author']= Auth::user() -> name;

        $post = Post::make($data);
        
        $category = Category::findOrFail($request -> get('category_id'));

        $post -> category() -> associate($category);
        $post -> save();

        $tags = Tag::findOrFail($request -> get('tags'));
        $post  -> tags() -> attach($tags); 
        $post -> save();

        return redirect() -> route('posts');
    }
    public function edit($id) {
        $categories = Category::all();
        $tags = Tag::all();
        $post = Post::findOrFail($id);
        return view('pages.edit', compact('categories', 'tags', 'post'));
    }
    public function update(Request $request, $id) {
        $data = $request -> validate([
            'title' => 'required|string|max:255', 
            'subtitle' => 'required|string|max:255',
            'text' => 'required|string|max:2000',
        ]);

        $data['author']= Auth::user() -> name;

        $post = Post::findOrFail($id);
        $post -> update($data); 
        
        $category = Category::findOrFail($request -> get('category_id'));
        $post -> category() -> associate($category);
        $post -> save();

        $tags = Tag::findOrFail($request -> get('tags'));
        $post  -> tags() -> sync($tags); 
        $post -> save();

        return redirect() -> route('posts');
    }
    public function delete($id) {
        $post = Post::findOrFail($id);
        $post -> tags() -> sync([]);
        $post -> delete();

        return redirect() -> route('posts');

    }
     

    
}
