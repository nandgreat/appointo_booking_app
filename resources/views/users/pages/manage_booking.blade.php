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


    <div class="col-md-1" style="background-color: rgb(62, 28, 74)">

        <a href="/">
            <div class="icons">
                <img src="{{asset('frontend')}}/assets/img/home-transparent.png" width="50px" alt="salon">
                <h5>Home</h5>
            </div>
        </a>
        <!-- <a href="">
            <div class="icons">
                <img src="{{asset('frontend')}}/assets/img/dashboard.png" width="40px" alt="salon">
                <h5>Dashboard</h5>
            </div>
        </a> -->
        <!-- <a href="">
            <div class="icons">
                <img src="{{asset('frontend')}}/assets/img/services.png" width="40px" alt="salon">
                <h5>Services</h5>
            </div>
        </a> -->
        <a href="">
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
        <!-- <a href="">
            <div class="icons">
                <img src="{{asset('frontend')}}/assets/img/documents.png" width="40px" alt="salon">
                <h5>Documents</h5>
            </div>
        </a> -->
        <!-- <a href="">
            <div class="icons">
                <img src="{{asset('frontend')}}/assets/img/notifications.png" width="40px" alt="salon">
                <h5>Notifications</h5>
            </div>
        </a> -->
        <!-- <a href="">
            <div class="icons">
                <img src="{{asset('frontend')}}/assets/img/reports.png" width="40px" alt="salon">
                <h5>Reorts</h5>
            </div>
        </a> -->
        <!-- <a href="">
            <div class="icons">
                <img src="{{asset('frontend')}}/assets/img/settings.png" width="40px" alt="salon">
                <h5>Settings</h5>
            </div>
        </a> -->


    </div>


    <div class="col-md-10">


        <div class="row">
            <div class="col-md-10 offset-1">

                @if ($message = Session::get('success'))
                <div class="col-md-12" role="alert">
                    <div class="alert alert-success mb-4" role="alert">
                        {{$message}}
                    </div>
                </div>
                @endif
                <div class="table mt-5">
                    @if($bookings->count()>0)
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">S/No</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($bookings as $key=>$a)
                            <tr>
                                <td>{{($key+1)}}</td>
                                <td>{{($a->customer_name)}}</td>
                                <td>{{($a->customer_email)}} </td>
                                <td>{{($a->customer_phone)}} </td>
                                <td>{{date('d-m-Y H:ia', strtotime($a->start_time))}}</td>
                                <td>{{date('d-m-Y H:ia', strtotime($a->end_time))}}</td>
                                <td>&#8358;{{($a->booking_amount)}}</td>
                                <td>{{($a->status->barbing_status)}}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm" target="_blank" style="padding: 10px;" href="{{$a->cancel_url}}" role="button">Cancel</a>
                                    <a class="btn btn-primary btn-sm" target="_blank" style="padding: 10px;" href="{{$a->reschedule_url}}" role="button">Reschedule</a>
                                   @if($a->barbing_status_id != 3 && $a->barbing_status_id != 4) <a class="btn btn-info btn-sm" style="padding: 10px;" href="{{route('mark-complete', ['schedule_id' => $a->id])}}" role="button">Mark Complete</a>@endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    @else
                    <p>No trip found</p>

                    @endif

                </div>

            </div>
        </div>

    </div>

    <div class="charts"> </div>

</div>

<div class="user">
    <a href="{{route('user.logout')}}">
        <div class="icon-2">
            <img src="{{asset('frontend')}}/assets/img/human.png" width="20px" alt=" admin human">
            <h4><b>User <br>Logout</b></h4>
        </div>
    </a>
</div>



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