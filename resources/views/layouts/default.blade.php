<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Products App</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/app.css" />
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" />
    </head>
    <body>
      <header>
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-md-3">
              <h1>Product App</h1>
            </div>
          <div class="col-md-9">
            <div class="row justify-content-center">
            @guest
              <li class="mr-4"><a class="text-white" href={{route('register')}}>Register</a></li>
              <li class="mr-4"><a class="text-white" href={{route('login')}}>Login</a></li>
              @else
              <li><a class="text-white" href={{route('logout')}} onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
              <form id="logout-form" action={{route('logout')}} method="post" style="display:none">
                @csrf
              </form>
            @endguest
          </div>
          </div>
        </div>
      </div>
      </header>
        <main>
            @yield('content')
        </main>
</body>
</html>
