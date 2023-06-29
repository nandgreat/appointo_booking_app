@extends('users.master')

@section('title', 'Dashboard')

@section('content_header')
<h1>Users</h1>
@stop

@section('content')

<div class="row">
    <main>

        <div id="form-wrapper">

        <h2 class="text-center">Login</h2>

            @if(session()->has('message'))
            <p class="alert alert-success col-md-4 offset-4">{{session()->get('message')}}</p>
            @endif

            @if(session()->has('error'))
            <p class="alert alert-danger col-md-4 offset-4">{{session()->get('error')}}</p>
            @endif
            <form method="post" action="{{route('user.post.login')}}">
                @csrf
                <input type="text" class="form-control" name="username" placeholder="User Name">
                <input type="password" class="form-control" name="password" id="" placeholder="Password">

                <button type="submit">Login</button>
                <hr>
                <h6>Don't have an account? <a href="{{route('loginshow')}}">Signup</a></h6>
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