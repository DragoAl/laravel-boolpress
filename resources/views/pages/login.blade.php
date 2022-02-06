@extends('layouts.main-layout')
@section('content')
    <section class="form-container">

   
        @if ($errors->any()) 
            <div class="alert alert-danger"> 
                <ul> 
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                    @endforeach 
                </ul> 
            </div> 
        @endif 
        <h2> Login </h2>
        <form action="{{route('login')}}" method="POST">
            @method("POST")
            @csrf
    
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Insert Email"> <br>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Insert password"> <br>
            <input class="btn btn-info" type="submit" value="Login">
    
        </form>    

    </section>
    
@endsection