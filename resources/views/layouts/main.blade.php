<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{  asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{  asset('css/style.min.css') }}" rel="stylesheet">

    <link href="{{  asset('css/categories-dropdown-style.css') }}" rel="stylesheet">

    <script src="{{ asset('lib/jquery-3.4.1.min.js') }}"></script>
</head>

<body>

@if(session()->has('success'))
    <div id="successSnackbar" class="snackbar d-none">
        {{ session('success') }}
    </div>
    <script>
        $(document).ready(function () {
            $('#successSnackbar').removeClass('d-none');
            setTimeout(function () {
                $('#successSnackbar').hide();
            }, 3000);
        });
    </script>
@endif

<!-- Topbar Start -->
@include ('layouts._topbar')
<!-- Topbar End -->

<!-- Navbar Start -->
<x-navbar :searchQuery="$searchQuery ?? ''"></x-navbar>
<!-- Navbar End -->

@yield('additional-content-on-top')

<!-- News With Sidebar Start -->
<div class="container-fluid mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @yield('main-content')
            </div>

            <div class="col-lg-4">
                <!-- Social Follow Start -->
                @include('layouts._social_follow')
                <!-- Social Follow End -->

                <!-- Ads Start -->
                <!--
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                    </div>
                    <div class="bg-white text-center border border-top-0 p-3">
                        <a href=""><img class="img-fluid" src="/img/news-800x500-2.jpg" alt=""></a>
                    </div>
                </div>
                -->
                <!-- Ads End -->

                <!-- Popular News Start -->
                <x-tranding-news></x-tranding-news>
                <!-- Popular News End -->

                <!-- Newsletter Start -->
                @include ('layouts._newsletter_sign_up_form')
                <!-- Newsletter End -->

                <!-- Categories Start -->
                <x-categories-card></x-categories-card>
                <!-- Categories End -->
            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->


<!-- Footer Start -->
@include ('layouts._footer')
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="{{ asset('lib/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
