@extends('layouts.main-layout')
@section('content')
    <h2> Login </h2>
    <form action="" method="POST">
        @method("POST")
        @csrf

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Insert E-mail"> <br>
        <label for="password">Password</label>
        <input type="password" name="password"> <br>
        <input type="submit" value="Login">

    </form>    
@endsection