@extends('users.master')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')

<div class="row">

    <div class="col-md-4 offset-4">
        <h4>Payment method</h4>

        <div class="top-btn">
            <div class="img-1">
                <div class="mastercard">
                    <img src="{{asset('frontend')}}/assets/img/mastercard.png" alt="mastercard">
                </div>
            </div>
            <div class="img-1">
                <div class="visa">
                    <img src="{{asset('frontend')}}/assets/img/visa.png" alt="visa">
                </div>
            </div>
            <div class="img-1">
                <div class="paypal">
                    <img src="{{asset('frontend')}}/assets/img/paypal.png" alt="paypal">
                </div>
            </div>

        </div>



        <div id="form-wrapper">

            <form action="">

                <input type="option" placeholder="Credit/Debit card">

                <h4>Card Details</h4>
                <input type="number" name="" id="" placeholder="">

                <input type="text" name="" id="" placeholder="Expiry Date">

                <button type="submit" style="padding-bottom: 20px !important;">Proceed To Confirm</button>

            </form>
        </div>
    </div>
</div>



@endsection

@section('myjsfile')
<!-- Styles -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>

<script src="{{ asset('js/main.js') }}" defer></script>

@stop