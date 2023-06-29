@extends('users.master')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')

<div class="row">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h2>Available Trips</h2>
            </div>
            <div class="col-md-6">
                <h4 style="color: #102883">{{$details->from}} - {{$details->to}}</h4>
            </div>
        </div>

        <div class="row">
            <div class="table mt-5">
                @if($installDetails)
                <table style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">S/No</th>
                            <th scope="col">Installment</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Pay Day</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($installDetails as $a)
                        <tr>
                            <td>{{($a['count'])}}</td>
                            <td>{{($a['installment'])}}</td>
                            <td>&#8358;{{$a['amount']}} </td>
                            <td>{{$a['payday']}}</td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>

                @else
                <p>No trip found</p>

                @endif

                @if($booking_status == 1 || $booking_status == 2)
                <div class="row" style="justify-content: space-between; margin-top: 30px">
                    <a class="btn btn-success" style="padding:10px" href="{{route('booking.payment',['trip_id'=>$details->id, 'booking_code' => isset($booking_code) ? $booking_code : '', 'passengers' => $passengers, 'amount'=>$amount/2])}}">Payment Now</a>
                </div>
                @endif
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