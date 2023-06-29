@extends('users.master')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')

<div class="row">
    <div class="container">

        <h2 class="text-center"><b>Payment Method</b></h2>
        <div>

            <div class="col-md-12" style="justify-content: center; text-align:center; flex-direction:column;">
                <ul class="nav nav-pills mb-3 flex-column flex-sm-row" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active flex-sm-fill text-sm-center" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Pay Now</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link flex-sm-fill text-sm-center" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Installmental Payment</button>
                    </li>
                </ul>

                <div class="row" style="justify-content: center;">
                    <h6>How do you want to pay?</h6>
                    <div class="row" style="justify-content: center; width: 100%;padding-top: 30px; padding-bottom:50px">
                        <div class="row col-md-4">
                            <div class=" col-md-4 payment-paypal-logos"> </div>
                            <div class=" col-md-4 payment-mastercard-logos"> </div>
                            <div class=" col-md-4 payment-visa-logos"> </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <form method="post" action="{{route('user.store')}}">
                            @csrf
                            <!-- Login Form -->
                            <div class="row">

                                <div class="col-md-6 offset-md-3">
                                    <label class="mt-3" for="card_name">Name on Card</label>
                                    <input type="text" id="card_name" class="form-control" placeholder="Name on Card" name='card_name' autofocus="">
                                    <label class="mt-3" for="card_name">Card Number</label>
                                    <input type="number" id="card_name" class="form-control" placeholder="Card Number" name='card_number' autofocus="">
                                    <label class="mt-3" for="exp_date">Expiry Date</label>
                                    <input type="text" id="exp_date" class="form-control" placeholder="Expiry Dateing (MM/YY)" name='exp_date' autofocus="">
                                    <label class="mt-3" for="cvv">CVV</label>
                                    <input type="number" id="cvv" class="form-control" placeholder="CVV" name='cvv' autofocus="">
                                    <a class="w-100 btn btn-md btn-primary mt-4" style="font-size: 20px;" href="{{route('user.book.ticket',['trip_id'=>$details->id, 'booking_code' => $booking_code, 'passengers' => $passengers])}}" type="submit">Pay {{$amount}}</a>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form method="post" action="{{route('user.store')}}">
                            @csrf
                            <!-- Login Form -->
                            <div class="row">


                                <div class="col-md-6 offset-md-3">
                                    <label class="mt-3" for="last_name">Name on Card</label>
                                    <input type="text" id="first_name" class="form-control" placeholder="Name on Card" name='card_name' autofocus="">

                                    <label class="mt-3" for="last_name">Card Number</label>
                                    <input type="number" id="last_name" class="form-control" placeholder="Card Number" name='card_number' autofocus="">
                                    <label class="mt-3" for="email">Expiry Date</label>
                                    <input type="text" id="exp_date" class="form-control" placeholder="Expiry Dateing (MM/YY)" name='exp_date' autofocus="">
                                    <label class="mt-3" for="phone">CVV</label>
                                    <input type="phone" id="phone" class="form-control" placeholder="CVV" name='phone' autofocus="">
                                    <a class="w-100 btn btn-md btn-primary mt-4" style="font-size: 20px;" href="{{route('user.book.ticket',['trip_id'=>$details->id,'booking_code' => isset($booking_code) ? $booking_code : '', 'passengers' => $passengers])}}" type="submit">Pay {{$amount}}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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