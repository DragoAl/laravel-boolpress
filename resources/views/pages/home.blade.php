@extends('layouts.main-layout')
@section('content')
    @auth
        <h1>Hello</h1>

    @else 
     <h2>you have to login</h2>
    @endauth
   


@endsection