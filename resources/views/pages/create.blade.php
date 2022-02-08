@extends('layouts.main-layout')
@section('content')
    <section class="form-container">
        <h2>Create New Post</h2>
        <form action="{{route('store')}}" method="post">
            @method('post')
            @csrf

            <label for="title">Titolo:</label>
            <input type="text" name="title"> <br>

            <label for="subtitle">Sottotitolo:</label>
            <input type="text" name="subtitle"> <br>

    
            <label for="text">Testo:</label>
            <textarea type="text" name="text"> </textarea> <br>


            <label for="category_name">Categoria:</label>
            <select name="category_id" > 
                @foreach ($categories as $category)
                    <option value="{{$category -> id}}">{{$category -> category_name }}</option>
                @endforeach
            </select> <br>

            <label for="tags[]">Tags:</label> <br>
            @foreach ($tags as $tag)
                
                <input class="checkbox" type="checkbox" name='tags[]' value="{{$tag -> id}}"> {{$tag -> tag_name}} <br>
            @endforeach

            <input class="btn btn-info" type="submit" value="CREATE">
    
        </form>
        

    </section>
    
@endsection