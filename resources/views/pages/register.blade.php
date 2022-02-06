@extends('layouts.main-layout')
@section('content')
    <section class="form-container">
        <h2>Register</h2>
        @if ($errors->any()) 
            <div class="alert alert-danger"> 
                <ul> 
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li> 
                    @endforeach 
                </ul> 
            </div> 
        @endif 
        
        <form action="{{route('register')}}" method="POST">
            @method("POST")
            @csrf
    
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="Insert Name"> <br>
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Insert Email"> <br>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Insert password min 8 char."> <br>
            <label for="pasword_confirmation">Password Confirm:</label>
            <input type="password" name="password_confirmation" placeholder="Repeat Password"> <br>
            <input class="btn btn-info" type="submit" value="Register">
        </form>
    

    </section>
    
@endsection