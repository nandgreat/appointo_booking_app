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
                <h2>Barbing Schedules</h2>
            </div>
            <div class="col-md-6">
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="table mt-5">
                    @if($bookings->count()>0)
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">S/No</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($bookings as $key=>$a)
                            <tr>
                                <td>{{($key+1)}}</td>
                                <td>{{($a->customer_name)}}</td>
                                <td>{{($a->customer_email)}} </td>
                                <td>{{($a->customer_phone)}} </td>
                                <td>{{date('d-m-Y H:ia', strtotime($a->start_time))}}</td>
                                <td>{{date('d-m-Y H:ia', strtotime($a->end_time))}}</td>
                                <td>&#8358;{{($a->booking_amount)}}</td>
                                <td>{{($a->status->barbing_status)}}</td>
                                <td>
                                    <a class="btn btn-danger btn-sm" target="_blank" style="padding: 10px;" href="{{$a->cancel_url}}" role="button">Cancel</a>
                                    <a class="btn btn-primary btn-sm"  target="_blank" style="padding: 10px;" href="{{$a->reschedule_url}}" role="button">Reschedule</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    @else
                    <p>No trip found</p>

                    @endif

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