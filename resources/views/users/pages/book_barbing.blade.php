@extends('users.master')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')

<div class="row">

    <div class="col-md-8 offset-2">

        @if($service_type == "salon")
        <div class="calendly-inline-widget" id="calendlyEventDiv" data-url="https://calendly.com/angirlexy/salon-service?hide_gdpr_banner=1&utm_source={{auth()->user()->email}}&utm_content={{$amount}}" style="min-width:320px;height:730px; flex:1"></div>
        @elseif($service_type == "home")
        <div class="calendly-inline-widget" id="calendlyEventDiv" data-url="https://calendly.com/angirlexy/home-service?hide_gdpr_banner=1&utm_source={{auth()->user()->email}}&utm_content={{$amount}}" style="min-width:320px;height:730px; flex:1"></div>
        @endif
    </div>



    <div class="col-md-4 offset-4" style="text-align: center; margin-top:50px; margin-bottom:50px">

        <h5 style="margin-bottom: 10px;">Payment validates order. only paid bookings will be reserved</h5>
        <a href="{{route('booking.payment')}}" class="btn btn-primary default-btn form-control">Pay Now (&#8358;{{$amount}})</a>
    </div>


</div>


@endsection

@section('myjsfile')
<!-- Styles -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>

<script src="{{ asset('js/main.js') }}" defer></script>

<script src="{{asset('frontend')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('frontend')}}/js/popper.min.js"></script>
<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>


<script src="js/main.js"></script>

<script>
    // Calendly.initInlineWidget({
    //     url: 'https://calendly.com/angirlexy?hide_gdpr_banner=1',
    //     parentElement: document.getElementById('calendlyEventDiv'),
    //     prefill: {},
    //     utm: {}
    // });

    function isCalendlyEvent(e) {
        return e.origin === "https://calendly.com" && e.data.event && e.data.event.indexOf("calendly.") === 0;
    };

    window.addEventListener("message", function(e) {
        if (isCalendlyEvent(e)) {
            /* Example to get the name of the event */
            console.log("Event name:", e.data.event);

            /* Example to get the payload of the event */
            console.log("Event details:", e.data.payload);
        }
    });
</script>

@stop