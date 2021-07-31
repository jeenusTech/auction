@extends('frontend.user_dashboard.layout.dashboard_nav')
@section('user_content')
<div class="container">
	<div class="row">
		<div class="col-md-12 mb-3 p-0">
			<div class="bg-white shadow-sm rounded">
		        <div class="p-3 border-bottom bold">
		          My Profile
		        </div>
		        <div class="p-3">
              <fieldset>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-3 col-form-label">User Name</label>
                  <div class="col-sm-9">
          			{{auth()->user()->name}}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fullname" class="col-sm-3 col-form-label">Full Name</label>
                  <div class="col-sm-9">
          			{{auth()->user()->fullname}}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="address_1" class="col-sm-3 col-form-label">Address Line 1</label>
                  <div class="col-sm-9">
          			{{auth()->user()->address_1}}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="address_2" class="col-sm-3 col-form-label">Address Line 2</label>
                  <div class="col-sm-9">
          			{{auth()->user()->address_2 ? auth()->user()->address_2 : 'null'}}
                  </div>
                </div>
                <div class="form-group row">
                    <label for="landmark" class="col-sm-3 col-form-label">Landmark</label>
                    <div class="col-sm-9">
          			{{auth()->user()->landmark}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country" class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-3">
          			{{getCountry(auth()->user()->country)->name}}
                    </div>
                    <label for="state" class="col-sm-3 col-form-label">state</label>
                    <div class="col-sm-3">
          			{{getState(auth()->user()->state)->name}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="col-sm-3 col-form-label">City</label>
                    <div class="col-sm-3">
          			{{getCity(auth()->user()->city)->name}}
                    </div>
                    <label for="pincode" class="col-sm-3 col-form-label">Pincode</label>
                    <div class="col-sm-3">
          			{{auth()->user()->pincode}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="city" class="col-sm-3 col-form-label">Primary Contact</label>
                    <div class="col-sm-3">
          				{{auth()->user()->mobile_1}}
                    </div>
                    <label for="pincode" class="col-sm-3 col-form-label">Secondary Contact</label>
                    <div class="col-sm-3">
          			{{auth()->user()->mobile_2 ? auth()->user()->mobile_2 : 'null'}}
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email ID</label>
                    <div class="col-sm-9">
          			{{auth()->user()->email}}
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3 form-check-label">Notification by</div>
                  <div class="col-sm-9">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="smsnote" name="sms" 
          			{{auth()->user()->mobile_notification == '1'?'checked':''}} disabled="disabled">
                      <label class="form-check-label" for="notifictaion">SMS</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="emailnote" name="mail" {{auth()->user()->email_notification == '1'?'checked':''}} disabled="disabled">
                      <label class="form-check-label" for="notifictaion">Email</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pan" class="col-sm-3 col-form-label">PAN Number</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <div class="col-sm-10">
	          			      {{auth()->user()->pan ? auth()->user()->pan : 'null'}}
	                   </div>
                    {{-- <div class="col-sm-5">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" {{auth()->user()->pan_status == '1'?'checked':''}} disabled="disabled" id="pan_status" name="pan_status">
                        <label class="form-check-label" for="pan_status">Will update later</label>
                      </div>
                    </div> --}}
                    </div>
                    <img class="pt-2" src="{{getimg(auth()->user()->pan_file)}}" alt="user-pan" height="175px" width="175px">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="aadhaar" class="col-sm-3 col-form-label">Adhar Number</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <div class="col-sm-10">
	          			      {{auth()->user()->aadhaar ? auth()->user()->aadhaar : 'null'}}
                      </div>
                    {{-- <div class="col-sm-5">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" {{auth()->user()->aadhaar_status == '1'?'checked':''}} disabled="disabled" type="checkbox" id="aadhaar_status" name="aadhaar_status">
                        <label class="form-check-label" for="aadhaar_status">Will update later</label>
                      </div>
                    </div> --}}
                    </div>
                    <img class="pt-2" src="{{getimg(auth()->user()->aadhaar_file_1)}}" alt="user-pan" height="175px" width="175px">
                    <img class="pt-2" src="{{getimg(auth()->user()->aadhaar_file_2)}}" alt="user-pan" height="175px" width="175px">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pan" class="col-sm-3 col-form-label">Passport Number</label>
                  <div class="col-sm-9">
                  	<div class="row">
                      <div class="col-sm-5">
	          			      {{auth()->user()->passport}}
                      </div>
                  	</div>
                    <img class="pt-2" src="{{getimg(auth()->user()->passport_file_1)}}" alt="user-pan" height="175px" width="175px">
                    <img class="pt-2" src="{{getimg(auth()->user()->passport_file_2)}}" alt="user-pan" height="175px" width="175px">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="city" class="col-sm-3 col-form-label">References 1</label>
                  <div class="col-sm-3">
        				    {{auth()->user()->reference_name_1 ? auth()->user()->reference_name_1 : 'null'}}
                  </div>
                  <label for="pincode" class="col-sm-3 col-form-label">References Contact</label>
                  <div class="col-sm-3">
        			     {{auth()->user()->reference_number_1 ? auth()->user()->reference_number_1 : 'null'}}
                  </div>
                </div>
                <div class="form-group row">
                  <label for="city" class="col-sm-3 col-form-label">References 1</label>
                  <div class="col-sm-3">
        				    {{auth()->user()->reference_name_2 ? auth()->user()->reference_name_2 : 'null'}}
                  </div>
                  <label for="pincode" class="col-sm-3 col-form-label">References Contact</label>
                  <div class="col-sm-3">
        			     {{auth()->user()->reference_number_2 ? auth()->user()->reference_number_2 : 'null'}}
                  </div>
                </div>
              </fieldset>
		        	
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection