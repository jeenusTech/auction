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
                <form id="reg_form" action="{{route('change_contact')}}" method="POST" autocomplete="off">
                  @csrf
                  <fieldset>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-3 col-form-label">User Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" class="form-control inp {{$errors->has('name')? ' border-danger':''}}" id="inputEmail" placeholder="Enter required user name" value="{{auth()->user()->name}}" disabled="disabled">
                        <small class="form-text text-danger">{!!$errors->first('name')!!}</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="mobile" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                          <input type="text" name="mobile" class="form-control inp {{$errors->has('mobile')? ' border-danger':''}}" value="{{old('mobile')?old('mobile'):auth()->user()->mobile_1}}" id="mobile_1" placeholder="Enter old Password" >
                        <small class="form-text text-danger">{!!$errors->first('mobile')!!}</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                          <input type="text" name="email" class="form-control inp {{$errors->has('email')? ' border-danger':''}}" value="{{old('email')?old('email'):auth()->user()->email}}" id="email_1" placeholder="Enter old Password" >
                        <small class="form-text text-danger">{!!$errors->first('email')!!}</small>
                      </div>
                    </div>
                <div class="row">
                  <div class="form-group">
                    <p class="text-danger ">
                      By updating Mobile No. / Email ID, your account status will turns into "Pending" mode till verification done !!
                    </p>
                    <p class="text-danger">
                      You are unable to access certain functionality of website till all verification process completed successfully !!
                    </p>
                  </div>
                </div>
                    <div class="form-group row">
                      <div class="">
                        <button type="submit" class="btn btn-danger float-end request-btn">Update Contact</button>
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
