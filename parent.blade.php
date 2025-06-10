<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title'){{env("APP_NAME")}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>

  {{--header---}}
  <div class="navbar navbar-expand navbar-dark bg-success">
    <div class="container">
        <a href="{{route('homepage')}}" class="navbar-brand">{{env("APP_NAME") }}</a>

         <form action="{{route('search')}}" method="post" class=" search-form mx-auto my-2 my-lg-0 d-flex">
          @csrf
            <input type="text" name="search" size="30" placeholder="Search products..." class="form-control">
            <input type="submit" class="btn btn-dark" value="Go">
         </form>

         <div class="navbar-nav">
              <a href="{{route('homepage')}}" class="nav-item nav-link">Home</a>

              <li class="nav-item">
                @auth
                  <span class="text-white nav-link">{{auth()->user()->name}}</span>
                 
                  @else
                 <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
              @endauth
            </li>

              <a href="{{route('register')}}" class="nav-item nav-link">Register</a>
              <a href="" class="btn btn-light">Cart</a>
            </div>
       </div>
    </div>
  @section('content')
  @show



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>