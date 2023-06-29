@extends('users.master')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')

<div class="row">
    <main>

        <div id="form-wrapper">

            @if(session()->has('message'))
            <p class="alert alert-success col-md-4 offset-4">{{session()->get('message')}}</p>
            @endif

            @if(session()->has('error'))
            <p class="alert alert-danger col-md-4 offset-4">{{session()->get('error')}}</p>
            @endif
            <form method="post" action="{{route('user.store')}}">
                @csrf
                <input type="text" class="form-control" name="name" placeholder="Full Name">
                <input type="text" class="form-control" name="username" placeholder="User Name">
                <input type="email" class="form-control" name="email" id="" placeholder="Email">
                <input type="text" class="form-control" name="phone" id="" placeholder="Phone">
                <input type="password" class="form-control" name="password" id="" placeholder="Password">
                <input type="password" class="form-control" name="confirm_password" id="" placeholder="Confirm password">

                <button type="submit">Sign Up</button>

                <hr>

                <h4>Already have an account? <a href="{{route('loginshow')}}">Login</a></h4>
            </form>
        </div>
    </main>

</div>


@endsection

@section('myjsfile')
<!-- Styles -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>

<script src="{{ asset('js/main.js') }}" defer></script>

@stop