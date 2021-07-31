@extends('frontend.layout.header')
@section('content')
<section class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/registration.png')}}");'>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            <h1>Register</h1>
            <p>British coins have always been popular amongst numismatists, not least because of their historical context, but also as a result of some of the finest coins ever being minted within this broad period.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- End Hero -->
  <!-- ======= Hero Section ======= -->
  <section id="form-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <h4>Registration Form</h4>
          <div class="container reg-container">
            <form id="reg_form" action="{{route('user.store')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
              @csrf
              <fieldset>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-3 col-form-label">User Name</label>
                  <div class="col-sm-9">
                    <input type="text" name="name" class="form-control inp {{$errors->has('name')? ' border-danger':''}}" id="inputEmail" placeholder="Enter required user name *" value="{{old('name')}}" required>
                    <small class="form-text text-danger">{!!$errors->first('name')!!}</small>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                      <input type="password" name="password" class="form-control inp {{$errors->has('password')? ' border-danger':''}}" value="{{old('password')}}" id="inputPassword" placeholder="Enter password *" required>
                      <span toggle="#inputPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <small class="form-text text-danger">{!!$errors->first('password')!!}</small>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="confirmPassword" class="col-sm-3 col-form-label">Confirm Password</label>
                  <div class="col-sm-9">
                    <input type="password" name="confirmPassword" class="form-control inp {{$errors->has('confirmPassword')? ' border-danger':''}}" id="confirmPassword" placeholder="Re-type your password *"  value="{{old('confirmPassword')}}" required>
                      <span toggle="#confirmPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <small class="form-text text-danger">{!!$errors->first('confirmPassword')!!}</small>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fullname" class="col-sm-3 col-form-label">Full Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control inp {{$errors->has('fullname')? ' border-danger':''}}" id="fullname" placeholder="Enter your full name *" name="fullname" value="{{old('fullname')}}" required>
                    <small class="form-text text-danger">{!!$errors->first('fullname')!!}</small>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="address_1" class="col-sm-3 col-form-label">Address Line 1</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control inp {{$errors->has('address_1')? ' border-danger':''}}" id="address_1" placeholder="Enter your main address *" name="address_1" value="{{old('address_1')}}" required>
                    <small class="form-text text-danger">{!!$errors->first('address_1')!!}</small>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="address_2" class="col-sm-3 col-form-label">Address Line 2</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control inp {{$errors->has('address_2')? ' border-danger':''}}" id="address_2" placeholder="Enter your address (optional)" name="address_2" value="{{old('address_2')}}">
                    <small class="form-text text-danger">{!!$errors->first('address_2')!!}</small>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="landmark" class="col-sm-3 col-form-label">Landmark</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control inp {{$errors->has('landmark')? ' border-danger':''}}" id="landmark" placeholder="Enter landmark (optional)" name="landmark" value="{{old('landmark')}}">
                    <small class="form-text text-danger">{!!$errors->first('landmark')!!}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country" class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-3">
                      <select class="form-control inp {{$errors->has('country')? ' border-danger':''}}" name="country"  id="country" required>
                        <option value="">Select Country</option>
                        <option value="">Select Country</option>
                            @foreach(allCountry() as $country)
                            <option value="{{$country->id}}" 
                              @if(old('country') == $country->id) 
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
                       <select id="state" class="form-control inp {{$errors->has('state')? ' border-danger':''}}" name="state" required>
                        @if(old('country'))
                            <option value="">Select State</option>
                        @foreach(allState(old('country')) as $state)
                            <option value="{{$state->id}}"
                             @if(old('state') == $state->id)
                              {{'selected'}}
                              @else {{''}}
                              @endif>
                                {{$state->name}}</option>
                            @endforeach
                        @endif
                        </select>
                      <small class="form-text text-danger">{!!$errors->first('state')!!}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-3">
                      <select id="city" class="form-control inp {{$errors->has('city')? ' border-danger':''}}" name="city" required>
                        @if(old('state'))
                            <option value="">Select City</option>
                         @foreach(allCity(old('state')) as $city)
                            <option value="{{$city->id}}"
                             @if(old('city') == $city->id)
                              {{'selected'}}
                              @else {{''}}
                              @endif>
                              {{$city->name}}
                            </option>
                          @endforeach
                        @endif
                      </select>
                      <small class="form-text text-danger">{!!$errors->first('city')!!}</small>
                    </div>
                    <label for="pincode" class="col-sm-3 col-form-label">Pincode</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control inp {{$errors->has('pincode')? ' border-danger':''}}" name="pincode" id="pincode" placeholder="Enter your pincode *" value="{{old('pincode')}}" required>
                      <small class="form-text text-danger">{!!$errors->first('pincode')!!}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mobile" class="col-sm-3 col-form-label">Mobile Number</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control inp {{$errors->has('mobile')? ' border-danger':''}}" value="{{old('mobile')}}" id="mobile" placeholder="Enter your mobile number *" name="mobile" required>
                      <small class="form-text text-danger">{!!$errors->first('mobile')!!}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email ID</label>
                    <div class="col-sm-9">
                      <input type="mail" class="form-control inp {{$errors->has('email')? ' border-danger':''}}" id="email" value="{{old('email')}}" placeholder="Enter your email ID *" name="email" required>
                      <small class="form-text text-danger">{!!$errors->first('email')!!}</small>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3 form-check-label">Notification by</div>
                  <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="smsnote" name="sms" {{old('sms')?'checked':''}}>
                      <label class="form-check-label" for="notifictaion">SMS</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="emailnote" name="mail" {{old('mail')?'checked':''}}>
                      <label class="form-check-label" for="notifictaion">Email</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pan" class="col-sm-3 col-form-label">PAN Number</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <div class="col-sm-5">
                      <input type="text" class="form-control inp" value="{{old('pan')}}" id="pan" name="pan" placeholder="Enter your PAN number *" {{old('pan_status')?'disabled="disabled"':''}} required>
                      <small class="form-text text-danger">{!!$errors->first('pan')!!}</small>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check form-check-inline">
                        {{-- <input class="form-check-input" type="checkbox" {{old('pan_status')?'checked':''}} id="pan_status" name="pan_status" {{old('aadhaar_status')?'disabled="disabled"':''}}> --}}
                        {{-- <label class="form-check-label" for="pan_status">Will update later</label> --}}
                      </div>
                    </div>
                    </div>
                    <input type="file" class="form-control inp" value="{{old('pan_file')}}" id="pan-file" name="pan_file" {{old('pan_status')?'disabled="disabled"':''}} required>
                    <small class="form-text text-danger">{!!$errors->first('pan_file')!!}</small>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="aadhaar" class="col-sm-3 col-form-label">Adhar Number</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <div class="col-sm-6">
                      <input type="text" class="form-control inp" value="{{old('aadhaar')}}" id="aadhaar" name="aadhaar" placeholder="Enter your aadhaar number *" {{old('aadhaar_status')?'disabled="disabled"':''}} required>
                    <small class="form-text text-danger">{!!$errors->first('aadhaar')!!}</small>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-check form-check-inline">
                        {{-- <input class="form-check-input" {{old('aadhaar_status')?'checked':''}} type="checkbox" id="aadhaar_status" name="aadhaar_status" {{old('pan_status')?'disabled="disabled"':''}}> --}}
                        <i class="form-check-label" style="font-size: 10px;" for="aadhaar_status">format (#### #### ####)</i>
                      </div>
                    </div>
                    </div>
                    <input type="file" class="form-control inp" value="{{old('aadhaar_file_1')}}" id="adhar-file1" name="aadhaar_file_1" {{old('aadhaar_status')?'disabled="disabled"':''}} required>
                    <small class="form-text text-danger">{!!$errors->first('aadhaar_file_1')!!}</small>
                    <input type="file" class="form-control inp" value="{{old('aadhaar_file_2')}}" id="adhar-file2" name="aadhaar_file_2" {{old('aadhaar_status')?'disabled="disabled"':''}} required>
                    <small class="form-text text-danger">{!!$errors->first('aadhaar_file_2')!!}</small>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pan" class="col-sm-3 col-form-label">Passport Number</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control inp {{$errors->has('passport')? ' border-danger':''}}" name="passport" value="{{old('passport')}}" id="passport" placeholder="Enter your passport number(optional)">
                    <small class="form-text text-danger">{!!$errors->first('passport')!!}</small>

                    <input type="file" class="form-control inp {{$errors->has('passport_file_1')? ' border-danger':''}}" id="passport-file1" name="passport_file_1" value="{{old('passport_file_1')}}">
                    <small class="form-text text-danger">{!!$errors->first('passport_file_1')!!}</small>

                    <input type="file" class="form-control inp {{$errors->has('passport_file_2')? ' border-danger':''}}" id="passport-file2" name="passport_file_2" value="{{old('passport_file_2')}}">
                    <small class="form-text text-danger">{!!$errors->first('passport_file_2')!!}</small>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="reference1" class="col-sm-3 col-form-label">References 1</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control inp {{$errors->has('reference_1')? ' border-danger':''}}" id="reference1" name="reference_1" value="{{old('reference_1')}}" placeholder="Enter reference name (optional)">
                      <small class="form-text text-danger">{!!$errors->first('reference_1')!!}</small>
                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control inp {{$errors->has('reference_mbl_1')? ' border-danger':''}}" id="reference_1_mbl" name="reference_mbl_1" placeholder="Enter mobile number (optional)" value="{{old('reference_mbl_1')}}" >
                      <small class="form-text text-danger">{!!$errors->first('reference_mbl_1')!!}</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="reference2" class="col-sm-3 col-form-label">References 2</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control inp {{$errors->has('refernce_2')? ' border-danger':''}}" id="reference2" name="refernce_2" value="{{old('refernce_2')}}" placeholder="Enter reference name (optional)">
                      <small class="form-text text-danger">{!!$errors->first('refernce_2')!!}</small>

                    </div>
                    <div class="col-sm-4">
                      <input type="text" class="form-control inp {{$errors->has('reference_mbl_2')? ' border-danger':''}}" id="reference_2_mbl" name="reference_mbl_2" placeholder="Enter mobile number (optional)" value="{{old('reference_mbl_2')}}" >
                      <small class="form-text text-danger">{!!$errors->first('reference_mbl_2')!!}</small>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="">
                    <button type="submit" class="btn btn-danger float-end reg-btn">Register</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
        <div class="col-md-4 reg-right">
          <div class="row">
            <?php
              for ($i=0; $i <3 ; $i++) { 
                echo '<div class="col-md-12">
                        <h4>Heading 1</h4>
                        <p>Our experience has shown us that the very best collections in the world are achieved through a trusted relationship between collector and advisor. Whatever aspect of the numismatic world interests you, we have skilled numismatists who are always pleased to help.</p>
                      </div>';
              }
            ?>
            
          </div>
          <div class="row">
            <div class="col-md-12 support">
              <h4>Support</h4>
              <p>British Coins – neil@baldwin.co.uk or chris@baldwin.co.uk</p>
              <p>Ancient Coins – dominic@baldwin.co.uk</p>
              <p>World Coins – ema@baldwin.co.uk</p>
              <p>Military Medals – mark@baldwin.co.uk</p>
              <p>Tokens & Commemorative Medals – richard@baldwin.co.uk</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->
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
        $(".toggle-password").click(function() {
          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
        });
  });

</script>