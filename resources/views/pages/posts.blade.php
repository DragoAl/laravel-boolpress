@extends('layouts.main-layout')
@section('content')
<a class="add-post" href="{{route('create')}}"><i class="fas fa-plus-circle" title="Add Post"></i>
</a>

    <div class="container">
        @auth
            <h1>Posts</h1>
            
            @foreach ($posts as $post)
                <div class="post-container">
                    <h5>{{$post-> title}}</h5>
                    <div class="text-container"> {{$post-> text}}</div>
                    <span>Data Pubblicazione:{{$post-> date}} </span>
                    <span>Autore : {{$post-> author}}</span>

                </div>
                
            @endforeach
            
        @else 
            <h2>you have to login</h2>
        @endauth
    </div>
    
   


@endsection