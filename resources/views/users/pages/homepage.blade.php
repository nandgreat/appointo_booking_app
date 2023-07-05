@extends('users.master')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')

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


@endsection

@section('myjsfile')
<!-- Styles -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>

<script src="{{ asset('js/main.js') }}" defer></script>

@stop