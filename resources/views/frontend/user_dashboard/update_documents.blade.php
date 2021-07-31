@extends('frontend.user_dashboard.layout.dashboard_nav')
@section('user_content')
<div class="container">
  <div class="row" id="manage-address-section">
    <div class="col-md-12 mb-3 p-0">
      <div class="bg-white shadow-sm rounded">
            <div class="p-3 border-bottom bold">
              Update Documents detail
            </div>
            <div class="row p-3">
              <div class="col-md-12 ml-auto mr-auto">
                <form id="reg_form" action="{{route('change_documents')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
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
                      <label for="pan" class="col-sm-3 col-form-label">PAN Number</label>
                      <div class="col-sm-9">
                        <div class="row">
                          <div class="col-sm-5">
                            <input type="text" class="form-control inp" value="{{old('pan')?old('pan'):auth()->user()->pan}}" id="pan" name="pan" placeholder="Enter your PAN number" {{old('pan_status')?'disabled="disabled"':''}}>
                            <small class="form-text text-danger">{!!$errors->first('pan')!!}</small>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="pan_status" name="pan_status">
                              <label class="form-check-label" for="pan_status">Update Pan</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-7">
                            <input type="file" class="form-control inp" value="{{old('pan_file')}}" id="pan-file" name="pan_file">
                            <small class="form-text text-danger">{!!$errors->first('pan_file')!!}</small>
                          </div>
                          <div class="col-sm-5">
                            <img src="{{getimg(auth()->user()->pan_file)}}" alt="" width="40%">                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="aadhaar" class="col-sm-3 col-form-label">Adhar Number</label>
                      <div class="col-sm-9">
                        <div class="row">
                          <div class="col-sm-5">
                          <input type="text" class="form-control inp" value="{{old('aadhaar')?old('aadhaar'):auth()->user()->aadhaar}}" id="aadhaar" name="aadhaar" placeholder="Enter your aadhaar number">
                        <small class="form-text text-danger">{!!$errors->first('aadhaar')!!}</small>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="aadhaar_status" name="aadhaar_status" >
                            <label class="form-check-label" for="aadhaar_status">Update AAdhaar</label>
                          </div>
                        </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-7">
                            <input type="file" class="form-control inp" value="{{old('aadhaar_file_1')}}" id="adhar-file1" name="aadhaar_file_1" >
                            <small class="form-text text-danger">{!!$errors->first('aadhaar_file_1')!!}</small>
                            <input type="file" class="form-control inp" value="{{old('aadhaar_file_2')}}" id="adhar-file2" name="aadhaar_file_2">
                            <small class="form-text text-danger">{!!$errors->first('aadhaar_file_2')!!}</small>
                          </div>
                          <div class="col-sm-5">
                            <img src="{{getimg(auth()->user()->aadhaar_file_1)}}" alt="" width="40%">
                            <img src="{{getimg(auth()->user()->aadhaar_file_2)}}" alt=""  width="40%">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="pan" class="col-sm-3 col-form-label">Passport Number</label>
                      <div class="col-sm-9">
                        <div class="row">
                          <div class="col-md-5">
                            <input type="text" class="form-control inp {{$errors->has('passport')? ' border-danger':''}}" name="passport" value="{{old('passport')?old('passport'):auth()->user()->passport}}" id="passport" placeholder="Enter your passport number">
                          </div>
                          <div class="col-md-5">
                            <input class="form-check-input" type="checkbox" id="update_passport" name="update_passport" >
                            <label class="form-check-label" for="update_passport">Update AAdhaar</label>
                          </div>
                        </div>
                        <div class="row">
                            <small class="form-text text-danger">{!!$errors->first('passport')!!}</small>
                          <div class="col-sm-7">
                            <input type="file" class="form-control inp {{$errors->has('passport_file_1')? ' border-danger':''}}" id="passport-file1" name="passport_file_1" value="{{old('passport_file_1')}}">
                            <small class="form-text text-danger">{!!$errors->first('passport_file_1')!!}</small>
                            <input type="file" class="form-control inp {{$errors->has('passport_file_2')? ' border-danger':''}}" id="passport-file2" name="passport_file_2" value="{{old('passport_file_2')}}">
                            <small class="form-text text-danger">{!!$errors->first('passport_file_2')!!}</small>
                          </div>
                          <div class="col-sm-5">
                            <img src="{{getimg(auth()->user()->passport_file_1)}}" alt="" width="40%">
                            <img src="{{getimg(auth()->user()->passport_file_2)}}" alt="" width="40%">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <p class="text-danger ">
                          By updating any Documents, your account status will turns into "Pending" mode till verification done !!
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
<script>
  window.addEventListener('load', () => {
        // enable disable fields
        $("#pan").attr("disabled", "disabled");
        $("#pan-file").attr("disabled", "disabled");
        $("#aadhaar").attr("disabled", "disabled");
        $("#adhar-file1").attr("disabled", "disabled");
        $("#adhar-file2").attr("disabled", "disabled");
        $("#passport").attr("disabled", "disabled");
        $("#passport-file1").attr("disabled", "disabled");
        $("#passport-file2").attr("disabled", "disabled");

        $("#pan_status").click(function () {
            if ($(this).is(":checked")) {
                $("#pan").removeAttr("disabled");
                $("#pan-file").removeAttr("disabled");
                $("#pan").focus();
            } else {
                $("#pan").attr("disabled", "disabled");
                $("#pan-file").attr("disabled", "disabled");
            }
        });
        $("#aadhaar_status").click(function () {
            if ($(this).is(":checked")) {
                $("#aadhaar").removeAttr("disabled");
                $("#adhar-file1").removeAttr("disabled");
                $("#adhar-file2").removeAttr("disabled");
                $("#aadhaar").focus();
            } else {
                $("#aadhaar").attr("disabled", "disabled");
                $("#adhar-file1").attr("disabled", "disabled");
                $("#adhar-file2").attr("disabled", "disabled");
            }
        });
        $("#update_passport").click(function () {
            if ($(this).is(":checked")) {
                $("#passport").removeAttr("disabled");
                $("#passport-file1").removeAttr("disabled");
                $("#passport-file2").removeAttr("disabled");
                $("#passport").focus();
            } else {
                
                $("#passport").attr("disabled", "disabled");
                $("#passport-file1").attr("disabled", "disabled");
                $("#passport-file2").attr("disabled", "disabled");
            }
        });
  });
</script>
