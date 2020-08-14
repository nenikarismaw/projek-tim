<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Question & Answer</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('index/img/favicon.ico')}}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('/index/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                @if (Route::has('login'))
                    @auth
                        <a class="navbar-brand js-scroll-trigger" href="{{ url('/home') }}">Home</a>
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                    @else
                        <ul class="navbar-nav ml-auto my-2 my-lg-0">
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a></li>
                            @endif
                            <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li> -->
                        </ul>
                    @endauth
                    </div>
                @endif
            </div>
        </nav>
            <div class="content">
            <!-- Masthead-->
                <header class="masthead">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center justify-content-center text-center">
                            <div class="col-lg-10 align-self-end">
                                <h1 class="text-uppercase text-white font-weight-bold">We love people who code</h1>
                                <hr class="divider my-4" />
                            </div>
                            <div class="col-lg-8 align-self-baseline">
                                <p class="text-white-75 font-weight-light mb-5">We build products that empower developers and connect them to solutions that enable productivity, growth, and discovery.</p>
                                <!-- <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a> -->
                            </div>
                            <div class="col-lg-8 align-self-baseline links">
                                <button><a href="{{ route('pertanyaan.index') }}">Questions List</a></button>
                                <button><a href="{{ route('pertanyaan.create') }}">New Create Question</a></button>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>
        @include('sweetalert::alert')
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Copyright © Juli 2020</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
