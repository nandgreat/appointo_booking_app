<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title></title>
    <link rel="icon" type="image/x-icon" href="{{asset('frontend')}}/assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="{{asset('frontend')}}/css/bootstrap.min.css" rel="stylesheet" />

    @if (request()->url() === url('user/registration/show') || request()->url() === url('/user/login'))
    <link href="{{asset('frontend')}}/css/staff-interface.css" rel="stylesheet" />
    @endif

    @if (request()->url() === url('/') || request()->url() === url('/barbing_schedules') || request()->url() === url('/booking-options'))

    @if(auth()->user()->role == "admin")
    <link href="{{asset('frontend')}}/css/admin-page.css" rel="stylesheet" />
    @else
    <link href="{{asset('frontend')}}/css/appointment-page.css" rel="stylesheet" />
    @endif
    <script src="https://cdn.anychart.com/releases/8.11.1/js/anychart-base.min.js" type="text/javascript"></script>
    @endif

    @if (request()->url() === url('/barbing_schedules/book') || request()->url() === url('/payment-page'))
    <link href="{{asset('frontend')}}/css/appointment-page2.css" rel="stylesheet" />

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>

    <link href="{{asset('frontend')}}/packages/core/main.css" rel='stylesheet' />
    <link href="{{asset('frontend')}}/packages/daygrid/main.css" rel='stylesheet' />

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    @endif

</head>

<body id="page-top">
    <!-- Navigation-->


    <!-- Masthead-->
    @include('users.fixed.header')
    <!-- @include('users.fixed.navbar') -->
    @yield('content')

    <!-- Footer-->
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{asset('frontend')}}/js/scripts.js"></script>
</body>

</html>