<header>
    <h1>BoolPress</h1>
    @auth
        <div>
            <h2>Ciao {{Auth::user()-> name}}</h2>
            <a class="btn btn-secondary" href="{{route('logout')}}">Logout</a>

        </div>
       



    @else
        <div>
            <a class="btn btn-primary" href="{{route('show.login')}}">Login</a>
            <a class="btn btn-primary" href="{{route('show.register')}}">Register</a>
        </div>
    @endauth
    
   
   
</header>