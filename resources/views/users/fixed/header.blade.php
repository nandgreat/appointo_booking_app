<header>

    @if (request()->url() === url('user/registration/show') || request()->url() === url('/user/login'))

    <div class="row">
        <div id="topbar">
            <h4>AAPointo</h4>
        </div>

        <div class="top-image">

            <img src="{{asset('frontend')}}/assets/img/topcalendar.png" alt="calendar at header">

            <div class="topbox">
                <p>An Online <br>Appointment<b>APP</b></p>
            </div>

        </div>
    </div>
    @endif

    @if (request()->url() === url('/') || request()->url() === url('/barbing_schedules'))

    <div id="topbar">
        <p><b>AAP</b>ointo</p>

    </div>

    <div class="top-image">

        <img src="{{asset('frontend')}}/assets/img/topcalendar.png" alt="calendar at header">

        <div class="topbox">
            <div class="aptmnt-bx">
                <h2><b>BOOK<br>APPOINTMENT</b></h2>
                <hr>
                <h2 ><a href="{{route('frontend.user')}}" class="btn" style="color:white">< Dashboard</a></h2>

            </div>
        </div>

    </div>

    @endif

    @if(request()->url() === url('/barbing_schedules/book') || request()->url() === url('/payment-page'))

    <div id="topbar">
        <p><b>AAP</b>ointo</p>

    </div>

    <div class="top-image">

        <div class="topbox">
            <div class="aptmnt-bx">
                <h2 style="color:white"><b>BOOK<br>APPOINTMENT</b></h2>
                <h2 ><a href="{{route('frontend.user')}}" class="btn" style="color:white">< Dashboard</a></h2>
                <hr>
            </div>
        </div>
        <img src="{{asset('frontend')}}/assets/img/topcalendar.png" alt="calendar at header">


    </div>

    @endif

</header>