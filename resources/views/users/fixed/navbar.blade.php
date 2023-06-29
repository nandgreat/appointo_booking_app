<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">

    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/bookingticket/show')}}" style="margin-right: 15px;text-decoration: none">Buy Ticket</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/showbooking/info')}}" style="margin-right: 15px;text-decoration: none">Bookings</a></li>
                <li class="nav-item"><a Contact class="nav-link js-scroll-trigger" href="{{url('/check-in')}}">Check-In</a></li>
                <li class="nav-item"><a Contact class="nav-link js-scroll-trigger" href="{{route('booking.bookingCode')}}">Installmental Payment</a></li>
                @if(auth()->user())
                <span class="nav-item" style="margin-top: 24px; color: rgba(0, 0, 0, 0.5)">{{auth()->user()->name}}</span>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('user.logout')}}">Logout</a></li>
                @else
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('loginshow')}}">Log In</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('registration')}}">Registration</a></li>

                @endif

            </ul>
        </div>
    </div>
</nav>