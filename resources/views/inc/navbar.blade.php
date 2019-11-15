<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container"> 
    <a class="navbar-brand" href="{{ url('/') }}">
      {{ config('app.name', 'AppDemo') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="/charts">Charts</a></li>
        @auth
        {{-- <li class="nav-item"><a class="nav-link" href="/home">home</a></li> --}}
        @endauth
       {{--  <li class="nav-item"><a class="nav-link" href="/feedback">Feedback</a></li> --}}
      </ul>

      <ul class="navbar-nav navbar-right">  
        @auth
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">  
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
          </div>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li> --}}
        @endauth
      </ul>  
    </div>
  </div>
</nav>
