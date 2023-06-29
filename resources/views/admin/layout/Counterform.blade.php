@extends('admin.master')

@section('content')

@if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
@endif

@if($errors->any())
    @foreach($errors->all() as $er)
        <p class="alert alert-danger">{{$er}}</p>
@endforeach
@endif
<h2>Counter Details </h2>
<form action="{{route('counter.store')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="name">Counter Location</label>
    <select input type="text" class="form-control"required id="counter_location"name="counter_location" >
    <option>Counter Location</option>
    <option value="To" disabled>To</option>
    <optgroup label="England">
     <option>Bedfordshire</option>
     <option>Berkshire</option>
     <option>Bristol</option>
     <option>Buckinghamshire</option>
     <option>Cambridgeshire</option>
     <option>Cheshire</option>
     <option>City of London</option>
     <option>Cornwall</option>
     <option>Cumbria</option>
     <option>Derbyshire</option>
     <option>Devon</option>
     <option>Dorset</option>
     <option>Durham</option>
     <option>East Riding of Yorkshire</option>
     <option>East Sussex</option>
     <option>Essex</option>
     <option>Gloucestershire</option>
     <option>Greater London</option>
     <option>Greater Manchester</option>
     <option>Hampshire</option>
     <option>Herefordshire</option>
     <option>Hertfordshire</option>
     <option>Isle of Wight</option>
     <option>Kent</option>
     <option>Lancashire</option>
     <option>Leicestershire</option>
     <option>Lincolnshire</option>
     <option>Merseyside</option>
     <option>Norfolk</option>
     <option>North Yorkshire</option>
     <option>Northamptonshire</option>
     <option>Northumberland</option>
     <option>Nottinghamshire</option>
     <option>Oxfordshire</option>
     <option>Rutland</option>
     <option>Shropshire</option>
     <option>Somerset</option>
     <option>South Yorkshire</option>
     <option>Staffordshire</option>
     <option>Suffolk</option>
     <option>Surrey</option>
     <option>Tyne and Wear</option>
     <option>Warwickshire</option>
     <option>West Midlands</option>
     <option>West Sussex</option>
     <option>West Yorkshire</option>
     <option>Wiltshire</option>
     <option>Worcestershire</option>
 </optgroup>
 <optgroup label="Wales">
     <option>Anglesey</option>
     <option>Brecknockshire</option>
     <option>Caernarfonshire</option>
     <option>Carmarthenshire</option>
     <option>Cardiganshire</option>
     <option>Denbighshire</option>
     <option>Flintshire</option>
     <option>Glamorgan</option>
     <option>Merioneth</option>
     <option>Monmouthshire</option>
     <option>Montgomeryshire</option>
     <option>Pembrokeshire</option>
     <option>Radnorshire</option>
 </optgroup>
 <optgroup label="Scotland">
     <option>Aberdeenshire</option>
     <option>Angus</option>
     <option>Argyllshire</option>
     <option>Ayrshire</option>
     <option>Banffshire</option>
     <option>Berwickshire</option>
     <option>Buteshire</option>
     <option>Cromartyshire</option>
     <option>Caithness</option>
     <option>Clackmannanshire</option>
     <option>Dumfriesshire</option>
     <option>Dunbartonshire</option>
     <option>East Lothian</option>
     <option>Fife</option>
     <option>Inverness-shire</option>
     <option>Kincardineshire</option>
     <option>Kinross</option>
     <option>Kirkcudbrightshire</option>
     <option>Lanarkshire</option>
     <option>Midlothian</option>
     <option>Morayshire</option>
     <option>Nairnshire</option>
     <option>Orkney</option>
     <option>Peeblesshire</option>
     <option>Perthshire</option>
     <option>Renfrewshire</option>
     <option>Ross-shire</option>
     <option>Roxburghshire</option>
     <option>Selkirkshire</option>
     <option>Shetland</option>
     <option>Stirlingshire</option>
     <option>Sutherland</option>
     <option>West Lothian</option>
     <option>Wigtownshire</option>
 </optgroup>
 <optgroup label="Northern Ireland">
     <option>Antrim</option>
     <option>Armagh</option>
     <option>Down</option>
     <option>Fermanagh</option>
     <option>Londonderry</option>
     <option>Tyrone</option>
 </optgroup>
													</select>
  </div>
  <div class="form-group">
    <label for="name">Phone</label>
    <input type="number" class="form-control" required id="phone" name="phone"placeholder="Phone">
  </div>
  
 
    
  

 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection