<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin  @yield('title'){{env("APP_NAME")}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>

  {{--header---}}
  <div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="{{route('admin.dashboard')}}" class="navbar-brand">{{env("APP_NAME") }}</a>

         <div class="navbar-nav">
              <a href="" class="btn btn-light">Logout</a>
            </div>
       </div>
    </div>

    <div class="navbar navbar-expand-lg navbar-dark bg-secondary py-0">
      <div class="container">

      <div class="navbar-nav">
        <a href="{{route('admin.dashboard')}}" class="nav-item nav-link">Home</a>
        <a href="{{route('admin.manageProduct')}}" class="nav-item nav-link">Product</a>
        <a href="{{route('admin.manageCategory')}}" class="nav-item nav-link">Category</a>
        <a href="" class="nav-item nav-link">Users</a>
        <a href="" class="nav-item nav-link">Orders</a>


      </div>
      </div>
</div>
    

  @section('content')
  @show



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>