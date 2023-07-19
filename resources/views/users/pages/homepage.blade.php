@extends('users.master')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')

@if(auth()->user()->role == "user")
<div class="row">
    <h3 class="text-center" style="margin-top: 50px;">Welcome {{auth()->user()->name}}</h3>
    <h3 class="text-center" style="margin-top: 50px;">Select Booking Type</h3>

    <div class="col-md-4 offset-4" style="display:flex; flex-direction: row; margin-top: 50px; justify-content: space-between;">
        <div class="text-center">
            <a href="{{route('bookBarbingShow')}}">
                <img src="{{asset('frontend')}}/assets/img/scissors.png" style="height: 100px; width:auto;" alt="salon">
                <h5 style="margin-top: 20px;">Salon Appointment</h5>
            </a>
        </div>
        <div class="text-center">
            <a href="{{route('bookBarbingShow', ['service_type' => 'home'])}}">
                <img src="{{asset('frontend')}}/assets/img/home_logo.png" style="height: 100px; width:auto;" alt="homelogo" width="40" height="40">
                <h5 style="margin-top: 20px;">Home Service</h5>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 offset-4">
        <a href="{{route('myBookings')}}" class="btn btn-default default-btn form-control">My Bookings</a>
        <a href="{{route('user.logout')}}" class="btn btn-default outline-btn form-control">Logout</a>
    </div>

</div>

@endif


@if(auth()->user()->role == "admin")
<div class="row">
    <h3 class="" style="margin-top: 50px;">Welcome {{auth()->user()->name}}</h3>


    <main>
        <div class="section-1">

            <a href="">
                <div class="icons">
                    <img src="{{asset('frontend')}}/assets/img/home-transparent.png" width="50px" alt="salon">
                    <h5>Home</h5>
                </div>
            </a>
            <a href="">
                <div class="icons">
                    <img src="{{asset('frontend')}}/assets/img/dashboard.png" width="40px" alt="salon">
                    <h5>Dashboard</h5>
                </div>
            </a>
            <a href="">
                <div class="icons">
                    <img src="{{asset('frontend')}}/assets/img/services.png" width="40px" alt="salon">
                    <h5>Services</h5>
                </div>
            </a>
            <a href="{{route('myBookings')}}">
                <div class="icons">
                    <img src="{{asset('frontend')}}/assets/img/bookings.png" width="40px" alt="salon">
                    <h5>Manage Bookings</h5>
                </div>
            </a>
            <a href="">
                <div class="icons">
                    <img src="{{asset('frontend')}}/assets/img/payments.png" width="40px" alt="salon">
                    <h5>Manage Payments</h5>
                </div>
            </a>
            <a href="">
                <div class="icons">
                    <img src="{{asset('frontend')}}/assets/img/documents.png" width="40px" alt="salon">
                    <h5>Documents</h5>
                </div>
            </a>
            <a href="">
                <div class="icons">
                    <img src="{{asset('frontend')}}/assets/img/notifications.png" width="40px" alt="salon">
                    <h5>Notifications</h5>
                </div>
            </a>
            <a href="">
                <div class="icons">
                    <img src="{{asset('frontend')}}/assets/img/reports.png" width="40px" alt="salon">
                    <h5>Reorts</h5>
                </div>
            </a>
            <a href="">
                <div class="icons">
                    <img src="{{asset('frontend')}}/assets/img/settings.png" width="40px" alt="salon">
                    <h5>Settings</h5>
                </div>
            </a>


        </div>

</div>

<div class="section-2">
    <div class="charts">

        <img src="{{asset('frontend')}}/assets/img/histogram.png" width="500px">
        <img src="{{asset('frontend')}}/assets/img/pie chart.png" width="500px">
        <img src="{{asset('frontend')}}/assets/img/Monthly chart.png" width="500px">

    </div>
</div>

<div class="user">
<a href="{{route('user.logout')}}">
        <div class="icon-2">
            <img src="{{asset('frontend')}}/assets/img/human.png" width="20px" alt=" admin human">
            <h4><b>User <br>Logout</b></h4>
        </div>
    </a>
</div>




</main>

@endif


<script>
    anychart.onDocumentLoad(function() {
        // create an instance of a pie chart
        var chart = anychart.column();
        // set the data
        chart.data([
            ["Chocolate", 5],
            ["Rhubarb compote", 2],
            ["Crêpe Suzette", 2],
            ["American blueberry", 2],
            ["Buttermilk", 1]
        ]);
        // set chart title
        chart.title("Monthly Revenues Trend Chart");
        // set the container element 
        chart.container("container");
        // initiate chart display
        chart.draw();
    });
</script>

@endsection

@section('myjsfile')
<!-- Styles -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>

<script src="{{ asset('js/main.js') }}" defer></script>




@stop