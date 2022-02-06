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
    
            <label for='author'>Autore:</label>
            <input type="text" value={{Auth::user()-> name}} name='author'> <br>
    
            <label for="text">Testo</label>
            <input type="text" name="text"> <br>
    
            <label for="date">Date:</label>
            <input type="date" name="date" >  <br>

            <label for="views">Views:</label>
            <input type="number" name="views" >  <br>

            <input class="btn btn-info" type="submit" value="CREATE">
    
        </form>
        

    </section>
    
@endsection