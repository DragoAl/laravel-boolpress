@extends('layouts.main-layout')
@section('content')
    <section class="form-container">
        <h2>Edit New Post</h2>
        <form action="{{route('update', $post -> id)}}" method="post">
            @method('post')
            @csrf

            <label for="title">Titolo:</label>
            <input type="text" name="title" value="{{$post -> title}}" > <br>

            <label for="subtitle">Sottotitolo:</label>
            <input type="text" name="subtitle" value="{{$post -> subtitle}}"> <br>

    
            <label for="text">Testo:</label>
            <textarea type="text" name="text"> {{$post -> text}} </textarea> <br>

            <div class="categ-tag-container">
                <div class="category-box">
                    <label for="category_name"><h4>Categoria:</h4> </label> 
                    <select name="category_id" > 
                        @foreach ($categories as $category)
         
                            @if ($post->category_id == $category->id)
                                <option selected value="{{$category -> id}}">{{$category -> category_name }}</option>
                            @else
                                <option  value="{{$category -> id}}">{{$category -> category_name }}</option>
                            @endif
                        @endforeach
                    </select> 

                </div>
                <div class="tags-box">
                    <h4>Tags:</h4>
                    @foreach ($tags as $tag)
                        <span class="tag-name">{{$tag -> tag_name}}</span>  
                        <input class="checkbox" type="checkbox" name='tags[]' value="{{$tag -> id}}"
                            @foreach ($post -> tags as $postTag)
                                
                                @if ($tag ->id == $postTag->id)
                                    checked
                                @endif

                            @endforeach
                        >  <br>
                       
                        
                    @endforeach


                </div>
            </div>
            

           
            <input class="btn btn-info" type="submit" value="UPDATE">
    
        </form>
        

    </section>
    
@endsection