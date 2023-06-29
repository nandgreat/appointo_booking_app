@extends('users.master')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')

<div class="row">

    <div class="col-md-8 offset-2">

        <div class="calendly-inline-widget" id="calendlyEventDiv" data-url="https://calendly.com/angirlexy?hide_gdpr_banner=1" style="min-width:320px;height:630px; flex:1"></div>

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
    Calendly.initInlineWidget({
        url: 'https://calendly.com/angirlexy?hide_gdpr_banner=1',
        parentElement: document.getElementById('calendlyEventDiv'),
        prefill: {},
        utm: {}
    });
</script>

@stop