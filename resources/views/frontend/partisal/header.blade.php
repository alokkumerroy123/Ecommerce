<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">Welcome to my webside</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            @if(auth()->user())

            <li><a href="{{route('profile')}}" class="text-white">Profile</a></li>
            <li><a href="{{route('logout')}}" class="text-white">Logout</a></li>

            @else
            <li><a href="{{route('register')}}" class="text-white">Registration</a></li>
            <li><a href="{{route('login')}}" class="text-white">Login</a></li>
            @endif

          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center">
      
      
        <strong>{{config('app.name')}}</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>