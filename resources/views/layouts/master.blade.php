<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 1</title>

  

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.min.css')}}">
    <script src="{{asset('js/bundle.min.js')}}" ></script>
    
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
  <!--mini slider -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

  <!-- mini slider -->
    <style>
        
          
        .blog .carousel-indicators {
          left: 0;
          top: auto;
            bottom: -40px;

        }

        /* The colour of the indicators */
        .blog .carousel-indicators li {
            background: #a3a3a3;
            border-radius: 50%;
            width: 8px;
            height: 8px;
        }

        .blog .carousel-indicators .active {
        background: #707070;
        }



    </style>

    <script>


         // optional
		$('#blogCarousel').carousel({
				interval: 5000
		});
 

    </script>

</head>
<body>
    
    <!--Navigation Bar-->
    <div class="container mt-2">
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
              <a class="" href="/"><img src="{{asset('images/ggg1.png')}}" style="width: 60px;"></a>
              <a class="navbar-brand" href="/"><span style="color:white;">Home</span></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><span style="color:white;"> Contact Us </span> </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"><span style="color:white;"> About Us </span></a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('orders.ordertrack')}}"><span style="color:white;"> Order Track</span> </a>
                  </li>
                  
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item pt-2">
                      <a class="nav-link active" aria-current="page" href="{{route('cart.list')}}"><span style="color:white;">
                        <i class="fa fa-shopping-cart"></i>
                          @if(count((Array)Session::get('cart')))
                             {{count(Session::get('cart'))}}
                          @else
                            0
                          @endif 
                          </span>
                      </a>
                    </li>

                    @guest
                    <li class="nav-item">
                       <a class="nav-link active" aria-current="page" href="{{route('login')}}">
                       <button class="btn btn-outline-dark bg-light" data-mdb-ripple-color="dark" style="z-index: 1;"><strong><i class="fa fa-sign-in"></i> Login </strong></button>
                       </a>
                    </li>
                    @else
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{route('home')}}">
                      <button class="btn btn-outline-dark bg-light" data-mdb-ripple-color="dark" style="z-index: 1;"><i class="fa fa-user-circle"></i>User Account </button>
                      </a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <button class="btn btn-outline-dark bg-light" data-mdb-ripple-color="dark" style="z-index: 1;"><i class="fa fa-sign-in"></i>&nbsp;{{ __('Logout') }}</button>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </li>
                    @endguest
                </ul>
               


              </div>
            </div>
          </nav>
    </div>

    <!--Header-->
    <div class="container pt-2 mb-4">

      <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="3000">
            <img src="{{asset('images/bg.png')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="{{asset('images/bg1.png')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{asset('images/bg2.png')}}" class="d-block w-100" alt="...">
          </div>
        </div>
        
      </div>
      
    </div>
  
    <!--Contents -->
    @yield('contents')
    @yield('home')
    @yield('login')



<!-- promo sale -->
<div class="container">
      <div class="row my-4">
        <div class="col">
          <div class="card">
            <img src="{{asset('images/hot1.png')}}" alt="..." class="img-fluid">
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="{{asset('images/hot2.png')}}" alt="..." class="img-fluid">
          </div>
        </div>
      </div>
    </div>
<!-- promo sale -->


<!--Footer-->
<div class="container">
      <div class="row py-4">
        <div class="text-center" style="color: rgb(19, 19, 94); font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;font-weight: 900;">
          <h1>
            <p>We Are Available For</p>
            <p>You 24/7</p>
        </h1>
        </div>
        <div class="text-center mt-2" style="color: rgb(19, 19, 94);">
          <p>OUR ONLINE SUPPORT SERVICE IS ALWARYS 24HOURS</p>
        </div>
      </div>
      <div class="row">
        <div class="col p-3">

          <ul class="list-group list-group-flush">
            <li class="list-group-item bg-info">
              <i class="fa fa-home"></i>  Address 
            </li>
            <li class="list-group-item">
               <i class="fa fa-building"></i> Hledan Center
            </li>
            <li class="list-group-item">
              <i class="fa fa-map-marker"></i> Kamayut Township, Yangon
            </li>
          </ul>
        </div>

        <div class="col p-3">
          <ul class="list-group list-group-flush">
           
            <li class="list-group-item bg-info">
              <i class="fa fa-hand"></i>  Contact 
            </li>
            <li class="list-group-item">
              <i class="fa fa-phone"></i> Phone No: 09-000000000
            </li>
            <li class="list-group-item">
              <i class="fa fa-envelope"></i>  Email: companyname@gmail.com
            </li>
          </ul>
        </div>

      </div>
    </div>
<!--Footer-->

<!--Address Map--> 
    <div class="container">
      <p>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.007437618112!2d96.12766157432819!3d16.825987118736816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194ca13fff6e3%3A0x1334ced7a53c5bbc!2sHledan%20Centre!5e0!3m2!1sen!2smm!4v1689013988499!5m2!1sen!2smm" width="1100" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </p>
    </div>

    <!--copy rights-->
    <div class="container-fluid bg-dark text-white text-center p-2">
        Copy Rights &copy; All Rights Reserved. 2023
    </div>

  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</body>
</html>