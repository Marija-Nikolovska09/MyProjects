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
      overflow-x: hidden;
    }

    nav.brown {
      background-color: #8B4513;

    }

    div.left {
      padding-left: 650px !important;
    }

    .footer {


      background-color: #8B4513;

      left: 0;
      bottom: 0;
      width: 100%;
    }

    div.cappuccino {
      background-color: #F1BD89;
    }

    div.outline {
      border: 2px solid black;
      outline-style: outset;
      outline-color: #F1BD89;
    }

    .slika {
      position: relative;

    }

    img {
      width: 85%;

    }

    .text-block {
      position: absolute;
      bottom: 130px;
      right: 20px;
      background-color: white;
      color: black;
      padding-left: 10px;
      padding-right: 10px;
      opacity: 0.7;
      margin-left: 100px;
      margin-right: 100px;
    }

    button {
      opacity: 1;
    }
  </style>

</head>

<body>

  <h1 class="text-center text-white my-5">BUSINESS CASUAL</h1>

  <nav class="navbar navbar-expand-lg navbar-light brown my-5 ">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse left" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item ">
          <a class="nav-link" href="#">HOME </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('users.create')}}">LOG IN</a>
        </li>
        <li class="nav-item">
          @if (session()->has('user'))
          <a href="{{ route('logout') }}" class="nav-link">LOG OUT</a>
          @endif
        </li>



      </ul>
    </div>
  </nav>

  <div class="col-6 offset-5 slika">
    <img src="https://images.squarespace-cdn.com/content/v1/57eed7da5016e1e7268e2ea8/1489718255515-8UENRRGGQK6IGLB85D3R/20170202_catalystcafe_0409.jpg?format=1500w" alt="">


  </div>

  <div class="col-6 offset-1">
    <div class="text-block text-center">
      <h4>Lorem Ipsum</h4>
      <h2>Lorem ipsum</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit est saepe assumenda, doloribus impedit adipisci nam dolore aperiam non repudiandae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, explicabo doloremque! Perferendis magnam dolore odit unde pariatur! Sint, amet non?</p>
      <button class="btn btn-warning text-white">Visit us today</button>
    </div>


  </div>

  <div class="row bg-warning my-5">
    <div class="col-8 offset-2 cappuccino text-center py-5 my-5 outline">
      <h4>Our Promise</h4>
      @if (session()->has('user'))
          <h2>TO {{$user['username']}} {{$user['lname']}}</h2>
      @else 
      <h2>TO YOU</h2>
      @endif
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum officia deserunt aspernatur a modi obcaecati! Iusto nulla odio temporibus corporis perferendis, nesciunt ipsa fugit sit ipsam necessitatibus iure exercitationem suscipit cumque cupiditate, commodi corrupti soluta consectetur vitae, fuga accusamus est vero voluptatem quibusdam. Eius sed doloribus, error neque nemo dolorum commodi consequuntur! Fuga totam vitae tempore mollitia quas aspernatur laudantium!</p>






    </div>
  </div>





  <div class="footer py-1 ">
    <p class="text-white text-center">Copyright &copy; Marija website</p>
  </div>



  <!-- jQuery library -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

  <!-- Latest Compiled Bootstrap 4.4.1 JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>