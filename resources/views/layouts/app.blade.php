<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/0752da24be.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>

/* Style the header */
h1 {
  background-color: thistle;
  text-align: center;
  font-size: 35px;
  color: black;
  font-style: italic;
  padding-bottom:10px;
}

/* Create two columns/boxes that floats next to each other */
#video_view {
  float: left;
  width: 50%;
  height: 200px; /* only for demonstration, should be removed */
  padding: 20px;
  margin-top: 0px;
  position: absolute;
}

article {
  float: right;
  width: 70%;
  background-color: #f1f1f1;
  height: 450px; /* only for demonstration, should be removed */
  margin-left: 8%;
  margin-top: 0px;
}

#abc {
    width: 90%;
    margin-left: 8%;
}
/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  align-content: flex-end;
  padding-top: 20px;
  text-align: center;
  color: black;
  float: bottom;
  clear: both;
  margin-bottom:0;
}
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}

</style>
</head>
<body>
    <!-- Preloader style, script and div -->
    <style>
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url("/preloader.gif") center no-repeat #fff;
    }    
    </style>
    <script>
    // Jquery 3.14 works with below ONLY
    $(window).on('load', function () {
        // Animate loader off screen
        console.log('ready');
		$(".se-pre-con").fadeOut("slow");
    });
    // old jquery works with below so removed.

    // $(window).load(function() {
	// 	// Animate loader off screen
    //     console.log('ready');
	// 	$(".se-pre-con").fadeOut("slow");
    //     $(".se-pre-con").hide();
	// });
    
    </script>
    <div class="se-pre-con"></div>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa fa-book" aria-hidden="true"></i>
                     {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                                     {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                         {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                     {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                                         {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
