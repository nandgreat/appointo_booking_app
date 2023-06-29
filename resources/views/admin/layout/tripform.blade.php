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

<form method="post" action="{{route('trip.store')}}">
@csrf


<h2>Add Trip</h2>
  <div class="form-group">
    <label for="name">Bus name</label>
    <input type="text" class="form-control" required id="bus_name"name="bus_name" placeholder="">
    
  </div>
    <div class="form-group">
    <label for="contact">Bus Type</label>
    <select class="form-control"required id="bus_type"name="bus_type" >
                               <option  ></option>
                                    <option >AC</option>
                                    <option >NON AC</option>
						            
    </select>
            
  </div>
  
  <div class="form-group">
    <label for="contact">From</label>
    <select class="form-control"required id="from"name="from" >
         <option value="From" disabled>From</option>
<option ></option>
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
    <label for="contact">To</label>
    <select class="form-control"required id="to"name="to" >
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
    <label for="time">Time</label>
    <select class="form-control"required id="time"name="time" >
         <option value="Time" disabled>Time</option>
              <option > </option>
			        <option>Morning(6:00 AM)</option>
              <option>Morning(7:00 AM)</option>
              <option>Morning(10:00 AM)</option>
			        <option>Afternoon(12:00 PM)</option>
              <option>Afternoon(3:00 PM)</option>
              <option>Afternoon(5:00 PM)</option>
              <option>Night(7:00 PM)</option>
              <option>Night(8:00 PM)</option>
              <option>Night(10:00 PM)</option>


	</select>
    
  </div>
  
  <div class="form-group">
    <label for="contact">Price</label>
    <input type="number" class="form-control" required id="price" name="price"  placeholder="">
  </div>
  
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection
