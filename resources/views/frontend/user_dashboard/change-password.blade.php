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
                <form id="reg_form" action="{{route('change_password')}}" method="POST" autocomplete="off">
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
                      <label for="oldPassword" class="col-sm-3 col-form-label">Old Password</label>
                      <div class="col-sm-9">
                          <input type="password" name="oldPassword" class="form-control inp {{$errors->has('oldPassword')? ' border-danger':''}}" value="{{old('oldPassword')}}" id="inputPassword" placeholder="Enter old Password" >
                        <small class="form-text text-danger">{!!$errors->first('oldPassword')!!}</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="Password" class="col-sm-3 col-form-label">New Password</label>
                      <div class="col-sm-9">
                        <input type="password" name="password" class="form-control inp {{$errors->has('password')? ' border-danger':''}}" id="confirmPassword" placeholder="Enter your new password"  value="{{old('password')}}">
                        <small class="form-text text-danger">{!!$errors->first('password')!!}</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="confirmPassword" class="col-sm-3 col-form-label">Confirm Password</label>
                      <div class="col-sm-9">
                        <input type="password" name="confirmPassword" class="form-control inp {{$errors->has('confirmPassword')? ' border-danger':''}}" id="confirmPassword" placeholder="Re-type your password"  value="{{old('confirmPassword')}}">
                        <small class="form-text text-danger">{!!$errors->first('confirmPassword')!!}</small>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="">
                        <button type="submit" class="btn btn-danger float-end request-btn">Change Password</button>
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
