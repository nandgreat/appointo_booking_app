@extends('users.master')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')

<div class="row">
    <div class="container">

        <div class="row">
            <div class="col-md-6" style="margin-top: 40px;">
                <!--Card-->
                <div class="card col-md-12 shadow mb-5 bg-white rounded">
                    <!--Card-Body-->
                    <div class="card-body">
                        <!--Card-Title-->
                        <p class="card-title text-center shadow mb-5 rounded">Ticket Booking Form</p>
                        <div class="icons text-center">

                            <p class="searchText"><strong>Search For Trip</strong></p>


                            <form action="{{route('webbusdetails')}}" method="GET">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <select class="browser-default custom-select mb-4" required id="from" name="from">
                                            <option value="">Select Departure</option>
                                            @foreach($from as $data)
                                            <option value="{{$data->route_name}}">{{$data->route_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="browser-default custom-select mb-4" required id="to" name="to">
                                            <option value="">Select Destination</option>
                                            @foreach($from as $data)
                                            <option value="{{$data->route_name}}">{{$data->route_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="row mt-4">
                                    <div class="col-sm-6">
                                        <select class="browser-default custom-select mb-4" required id="no_of_passegers" name="no_of_passegers">
                                            <option value="">Select No of Passengers</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <p>Date: <input name="date" type="date" id="datepicker"></p>
                                    </div>

                                    <!-- <div class="col-sm-6"> <select class="browser-default custom-select mb-4" required id="select"
                            name="time">
                            <option value="" disabled="" selected="">Time</option>
                            <option>Morning(6:00 AM)</option>
                            <option>Morning(7:00 AM)</option>
                            <option>Morning(10:00 AM)</option>
                            <option>Afternoon(12:00 PM)</option>
                            <option>Afternoon(3:00 PM)</option>
                            <option>Afternoon(5:00 PM)</option>
                            <option>Night(7:00 PM)</option>
                            <option>Night(8:00 PM)</option>
                            <option>Night(10:00 PM)</option>
                          </select> 
                      </div> -->
                                </div>

                                <div class="row">


                                </div>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="right-image"></div>
            </div>

        </div>


    </div>

</div>


@endsection

@section('myjsfile')
<!-- Styles -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>

<script src="{{ asset('js/main.js') }}" defer></script>

@stop
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .header {
        overflow: hidden;
        background-color: #f1f1f1;
        padding: 20px 10px;
    }

    .header a {
        float: left;
        color: black;
        text-align: center;
        padding: 2px;
        text-decoration: none;
        font-size: 18px;
        line-height: 25px;
        border-radius: 4px;
    }

    .header a.logo {
        font-size: 25px;
        font-weight: bold;
    }

    .header a:hover {
        background-color: #ddd;
        color: black;
    }

    .header a.active {
        background-color: dodgerblue;
        color: white;
    }

    .header-right {
        float: right;
    }

    @media screen and (max-width: 500px) {
        .header a {
            float: none;
            display: block;
            text-align: left;
        }

        .header-right {
            float: none;
        }
    }

    .card {
        margin: auto;
        border: solid 1px #dbdad7;
        width: 40%;
        padding-left: 10px !important;
        padding-bottom: 10px !important;
        padding-right: 10px !important;
        padding-top: 0px !important
    }

    .card-title {
        margin: auto;
        padding: 15px;
        background-color: #2f7fad;
        color: white;
        width: 80%
    }

    div.card-body {
        padding: 0px
    }

    .custom-select {
        width: 100%
    }

    .btn2 {
        margin-left: 10%
    }

    input {
        outline: 0 !important;
        border-width: 0 0 2px !important;
        border-color: #d1d1cf !important
    }

    input:focus {
        border-color: #d1d1cf !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important
    }

    select {
        outline: 0 !important;
        border-width: 0 0 2px !important;
        border-color: #d1d1cf !important
    }

    select:focus {
        border-color: #d1d1cf !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important
    }

    .radiobtn {
        margin-left: 3.5%
    }

    .icons {
        margin: auto !important
    }

    .fa {
        border-radius: 25px;
        width: 10%;
        margin-left: 5%;
        border: solid 2px #dbdad7;
        margin-top: 5%;
        text-align: center
    }

    .fa-plane {
        color: #1cad9f
    }

    .fa-taxi {
        color: #c2f700
    }

    .fa-train {
        color: red
    }

    @media only screen and (max-width: 600px) {
        .card {
            margin: auto;
            border: solid 1px #dbdad7;
            width: 90%;
            padding-left: 10px !important;
            padding-bottom: 10px !important;
            padding-right: 10px !important;
            padding-top: 0px !important
        }

        .fa {
            border-radius: 25px;
            width: 15%;
            margin-left: 5%;
            border: solid 2px #dbdad7;
            margin-top: 5%;
            text-align: center
        }
    }
</style>