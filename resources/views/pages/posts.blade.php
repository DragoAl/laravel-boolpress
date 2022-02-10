@extends('layouts.main-layout')
@section('content')

@auth
<a class="add-post" href="{{route('create')}}"><i class="fas fa-plus-circle" title="Add Post"></i></a>
@endauth

    <div class="container">
        

        <h1>Posts</h1>
        @foreach ($posts as $post)
            <div class="post-container">
                <div class="post-head">
                    <h5>{{$post-> title}}</h5>
                    <div>
                        <a href="{{route('edit', $post ->id)}}"><i class="fas fa-pen"></i></a>
                        <a href="{{route('delete', $post->id)}}"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
                              
                <span>{{$post -> category -> category_name}}</span>
                <div class="text-container"> {{$post-> text}}</div>
                <span>Data Pubblicazione:{{$post-> created_at -> format('d/m/Y H:m')}} </span>
                <span>Autore : {{$post-> author}}</span> <br>
                <span>Likes: {{$post -> likes}}</span>
                <span>Tags:
                    @foreach ($post -> tags as $tag)
                        - {{$tag -> tag_name}} 
                    @endforeach
                                            
                </span>

            </div>
            
        @endforeach
    </div>
    
   


@endsection