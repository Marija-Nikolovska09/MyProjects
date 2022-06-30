<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../css/app.css">

  <!-- Latest compiled and minified Bootstrap 4.4.1 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <style>
    body {

      background-image: url('https://images.unsplash.com/photo-1447933601403-0c6688de566e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Y29mZmVlJTIwYmVhbnxlbnwwfHwwfHw%3D&w=1000&q=80');

      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    nav.brown {
      background-color: #8B4513;

    }

    div.left {
      padding-left: 650px !important;
    }

    .footer {


      background-color: #8B4513;
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
    }
  </style>

</head>

<body>



  <h1 class="text-center text-white my-5">BUSINESS CASUAL</h1>

  <nav class="navbar navbar-expand-lg navbar-light brown mt-5 ">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse left" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item ">
          <a class="nav-link" href="{{route('users.home')}}">HOME </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('users.create')}}">LOG IN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}">LOG OUT</a>
        </li>

        

      </ul>
    </div>
  </nav>

  <div class="col-6 offset-3 mt-5">

    <ul class="text-white font-weight-bold">
      <li>Your name is: {{$user['username']}}</li>
      <li>Your lastname is: {{$user['lname']}}</li>


      @if($user['email'])
      <li>Your email is: {{$user['email']}}</li>
      @endif
    </ul>

  </div>





  <div class="footer py-1">
    <p class="text-white text-center">Copyright &copy; Marija website</p>
  </div>



  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

  <!-- Latest Compiled Bootstrap 4.4.1 JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>