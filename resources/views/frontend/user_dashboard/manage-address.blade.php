@extends('frontend.user_dashboard.layout.dashboard_nav')
@section('user_content')
<div class="container">
	<div class="row" id="manage-address-section">
		<div class="col-md-12 mb-3 p-0">
			<div class="bg-white shadow-sm rounded">
		        <div class="p-3 border-bottom bold">
		          Manage Address
		        </div>
		        <div class="row p-3">
              <div class="col-md-12 ml-auto mr-auto">
                <form id="reg_form" action="{{route('manage_address')}}" method="POST" autocomplete="off">
                  @csrf
                  <fieldset>
                    <div class="form-group row">
                      <label for="fullname" class="col-sm-3 col-form-label">Full Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control inp {{$errors->has('fullname')? ' border-danger':''}}" id="fullname" placeholder="Enter your full name" name="fullname" value="{{old('fullname')?old('fullname'):auth()->user()->fullname}}">
                        <small class="form-text text-danger">{!!$errors->first('fullname')!!}</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="address_1" class="col-sm-3 col-form-label">Address Line 1</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control inp {{$errors->has('address_1')? ' border-danger':''}}" id="address_1" placeholder="Enter your main address" name="address_1" value="{{old('address_1')?old('address_1'):auth()->user()->address_1}}">
                        <small class="form-text text-danger">{!!$errors->first('address_1')!!}</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="address_2" class="col-sm-3 col-form-label">Address Line 2</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control inp {{$errors->has('address_2')? ' border-danger':''}}" id="address_2" placeholder="Enter your main address" name="address_2" value="{{old('address_2')?old('address_2'):auth()->user()->address_2}}">
                        <small class="form-text text-danger">{!!$errors->first('address_2')!!}</small>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="landmark" class="col-sm-3 col-form-label">Landmark</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control inp {{$errors->has('landmark')? ' border-danger':''}}" id="landmark" placeholder="Enter landmark (optional)" name="landmark" value="{{old('landmark')?old('landmark'):auth()->user()->landmark}}">
                        <small class="form-text text-danger">{!!$errors->first('landmark')!!}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="country" class="col-sm-3 col-form-label">Country</label>
                        <div class="col-sm-3">
                          <select class="form-control inp {{$errors->has('country')? ' border-danger':''}}" name="country"  id="country">
                            <option value="">Select Country</option>
                            @foreach(getregCountry(101) as $country)
                            <option value="{{$country->id}}" 
                              @if(old('country') == $country->id) 
                              {{'selected'}}
                             @elseif(auth()->user()->country == $country->id)
                              {{'selected'}}
                              @else {{''}}
                              @endif>
                                {{$country->name}}</option>
                            @endforeach
                          </select>
                        <small class="form-text text-danger">{!!$errors->first('country')!!}</small>
                        </div>
                        <label for="state" class="col-sm-3 col-form-label">state</label>
                        <div class="col-sm-3">
                           <select id="state" class="form-control inp {{$errors->has('state')? ' border-danger':''}}" name="state">
                            <option value="">Select State</option>
                            @foreach(allState(auth()->user()->country) as $state)
                            <option value="{{$state->id}}"
                             @if(old('state') == $state->id)
                              {{'selected'}} 
                              @elseif(auth()->user()->state == $state->id) 
                              {{'selected'}}
                              @else {{''}}
                              @endif>
                                {{$state->name}}</option>
                            @endforeach
                            </select>
                          <small class="form-text text-danger">{!!$errors->first('state')!!}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-sm-3 col-form-label">City</label>
                        <div class="col-sm-3">
                          <select id="city" class="form-control inp {{$errors->has('city')? ' border-danger':''}}" name="city">
                            <option value="">Select State</option>
                            @foreach(allCity(auth()->user()->state) as $city)
                            <option value="{{$city->id}}"
                             @if(old('city') == $city->id)
                              {{'selected'}} 
                              @elseif(auth()->user()->city == $city->id) 
                              {{'selected'}}
                              @else {{''}}
                              @endif>
                                {{$city->name}}</option>
                            @endforeach
                          </select>
                          <small class="form-text text-danger">{!!$errors->first('city')!!}</small>
                        </div>
                        <label for="pincode" class="col-sm-3 col-form-label">Pincode</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control inp {{$errors->has('pincode')? ' border-danger':''}}" name="pincode" id="pincode" placeholder="Enter your pincode" value="{{old('pincode')?old('pincode'):auth()->user()->pincode}}">
                          <small class="form-text text-danger">{!!$errors->first('pincode')!!}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mobile_2" class="col-sm-3 col-form-label">Mobile Number 2</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control inp {{$errors->has('mobile_2')? ' border-danger':''}}" value="{{old('mobile_2')?old('mobile_2'):auth()->user()->mobile_2}}" id="mobile_2" placeholder="Enter your mobile_2 number" name="mobile_2">
                          <small class="form-text text-danger">{!!$errors->first('mobile_2')!!}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                      <div class="">
                        <button type="submit" class="btn btn-danger float-end request-btn">Update Address</button>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection
<script>
  window.addEventListener('load', () => {
    $.ajaxSetup({
    beforeSend: function(xhr, type) {
        if (!type.crossDomain) {
            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        }
    },
});
 $('#country').on('change', function () {
                var idCountry = this.value;
                $("#state").html('');
                $.ajaxSetup({
                  beforeSend: function(xhr, type) {
                      if (!type.crossDomain) {
                          xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                      }
                  },
              });
                $.ajax({
                    url: "api/fetch-states",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{!! csrf_token() !!}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state').html('<option value="">Select State</option>');
                        $.each(result.states, function (key, value) {
                            $("#state").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city').html('<option value="">Select City</option>');
                    }
                });
            });
            $('#state').on('change', function () {
                var idState = this.value;
                $("#city").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

        // enable disable fields
        $("#pan_status").click(function () {
            if ($(this).is(":checked")) {
                $("#pan").attr("disabled", "disabled");
                $("#pan-file").attr("disabled", "disabled");
                $("#aadhaar_status").attr("disabled", "disabled");
                $("#pan").focus();
            } else {
                $("#pan").removeAttr("disabled");
                $("#pan-file").removeAttr("disabled");
                $("#aadhaar_status").removeAttr("disabled");
            }
        });
        $("#aadhaar_status").click(function () {
            if ($(this).is(":checked")) {
                $("#aadhaar").attr("disabled", "disabled");
                $("#adhar-file1").attr("disabled", "disabled");
                $("#adhar-file2").attr("disabled", "disabled");
                $("#pan_status").attr("disabled", "disabled");
                $("#pan").focus();
            } else {
                $("#aadhaar").removeAttr("disabled");
                $("#adhar-file1").removeAttr("disabled");
                $("#adhar-file2").removeAttr("disabled");
                $("#pan_status").removeAttr("disabled");
            }
        });
  });
   

</script>