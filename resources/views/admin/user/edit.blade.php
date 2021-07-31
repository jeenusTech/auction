@extends('admin.layouts.header')
@section('content')

  <!-- Content Header (Page header) -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card card-navy border-dark">
            <div class="card-header">
              <h3 class="card-title">Editing <b><i>{{$user->name}}'s</i></b> Data</h3>
            </div>
            <!-- /.card-header -->
              <div class="row">
                <div class="col-12">
                  <div class="conatiner">
                    <form action="{{route('admin_change_documents',$user->id)}}" method="POST" autocomplete="off" enctype="multipart/form-data">
                      @csrf
                      {{-- @method('PUT') --}}
                      <div class="card-body row">
                        <fieldset class="col-md-6">
                          <div class="form-group row">
                            <label for="pan" class="col-sm-3 col-form-label">PAN Number</label>
                            <div class="col-sm-9">
                              <div class="row">
                                <div class="col-sm-5">
                                  <input type="text" class="form-control inp" value="{{old('pan')?old('pan'):$user->pan}}" id="pan" name="pan" placeholder="Enter your PAN number" {{old('pan_status')?'disabled="disabled"':''}}>
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
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="aadhaar" class="col-sm-3 col-form-label">Adhar Number</label>
                            <div class="col-sm-9">
                              <div class="row">
                                <div class="col-sm-5">
                                <input type="text" class="form-control inp" value="{{old('aadhaar')?old('aadhaar'):$user->aadhaar}}" id="aadhaar" name="aadhaar" placeholder="Enter your aadhaar number">
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
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="pan" class="col-sm-3 col-form-label">Passport Number</label>
                            <div class="col-sm-9">
                              <div class="row">
                                <div class="col-md-5">
                                  <input type="text" class="form-control inp {{$errors->has('passport')? ' border-danger':''}}" name="passport" value="{{old('passport')?old('passport'):$user->passport}}" id="passport" placeholder="Enter your passport number">
                                </div>
                                <div class="col-md-5">
                                  <input class="form-check-input" type="checkbox" id="update_passport" name="update_passport" >
                                  <label class="form-check-label" for="update_passport">Update Passport</label>
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
                              </div>
                            </div>
                          </div>

                          <div class="form-group row">

                              <label for="reference1" class="col-sm-3 col-form-label">References 1</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control inp {{$errors->has('reference_1')? ' border-danger':''}}" id="reference1" name="reference_1" value="{{old('reference_1')?old('reference_1'):$user->reference_name_1}}" placeholder="Enter reference name">
                                <small class="form-text text-danger">{!!$errors->first('reference_1')!!}</small>
                              </div>
                              <div class="col-sm-4">
                                <input type="text" class="form-control inp {{$errors->has('reference_mbl_1')? ' border-danger':''}}" id="reference_1_mbl" name="reference_mbl_1" placeholder="Enter mobile number" value="{{old('reference_mbl_1')?old('reference_mbl_1'):$user->reference_number_1}}" >
                                <small class="form-text text-danger">{!!$errors->first('reference_mbl_1')!!}</small>
                              </div>
                                <div class="col-sm-1">
                                  <input class="form-check-input" type="checkbox" id="update_reference" name="update_reference" >
                                  <label class="form-check-label" for="update_references">Update References</label>
                                </div>
                          </div>
                          <div class="form-group row">
                              <label for="reference2" class="col-sm-3 col-form-label">References 2</label>
                              <div class="col-sm-4">
                                <input type="text" class="form-control inp {{$errors->has('refernce_2')? ' border-danger':''}}" id="reference2" name="refernce_2" value="{{old('refernce_2')?old('refernce_2'):$user->reference_name_2}}" placeholder="Enter reference name">
                                <small class="form-text text-danger">{!!$errors->first('refernce_2')!!}</small>

                              </div>
                              <div class="col-sm-4">
                                <input type="text" class="form-control inp {{$errors->has('reference_mbl_2')? ' border-danger':''}}" id="reference_2_mbl" name="reference_mbl_2" placeholder="Enter mobile number" value="{{old('reference_mbl_2')?old('reference_mbl_2'):$user->refernce_number_2}}" >
                                <small class="form-text text-danger">{!!$errors->first('reference_mbl_2')!!}</small>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="user_verify" class="col-sm-3 col-form-label">User verify</label>
                              <div class="col-sm-4">
                                <input type="checkbox" name="user_verify" {{$user->user_verify==1?'checked':''}} data-bootstrap-switch data-off-color="danger" data-on-color="success">

                              </div>
                          </div>
                          <div class="form-group">
                            <div class="">
                              <button type="submit" class="btn btn-success float-end request-btn">Update Contact</button>
                              <a  class="btn btn-danger float-end request-btn" href="{{route('manageuser.index')}}">Go Back</a>
                            </div>
                          </div>
                        </fieldset>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                          <div class="row">
                            <div class="col-sm-4">
                              <a href="{{getimg($user->pan_file)}}" data-lightbox="{{getimg($user->pan_file)}}" data-title="Pan">
                                  <img class="img-fluid" src="{{getimg($user->pan_file)}}" alt="{{$user->pan}}">
                              </a>
                              Pan image
                            </div>
                            <div class="col-sm-4">
                              <a href="{{getimg($user->aadhaar_file_1)}}" data-lightbox="{{getimg($user->aadhaar_file_1)}}" data-title="Aadhaar front">
                                  <img class="img-fluid" src="{{getimg($user->aadhaar_file_1)}}" alt="{{$user->aadhaar}}">
                              </a>
                              Aadhaar image 1
                            </div>
                            <div class="col-sm-4">
                              <a href="{{getimg($user->aadhaar_file_2)}}" data-lightbox="{{getimg($user->aadhaar_file_2)}}" data-title="Aadhaar back">
                                  <img class="img-fluid" src="{{getimg($user->aadhaar_file_2)}}" alt="{{$user->aadhaar}}">
                              </a>
                              Aadhaar image 2
                            </div>
                                  
                            <div class="col-sm-4">
                              <a href="{{getimg($user->passport_file_1)}}" data-lightbox="{{getimg($user->passport_file_1)}}" data-title="Passport front">
                                  <img class="img-fluid" src="{{getimg($user->passport_file_1)}}" alt="{{$user->passport}}">
                              </a>
                              Passport image 1
                            </div>
                            <div class="col-sm-4">
                              <a href="{{getimg($user->passport_file_2)}}" data-lightbox="{{getimg($user->passport_file_2)}}" data-title="Passport back">
                                  <img class="img-fluid" src="{{getimg($user->passport_file_2)}}" alt="{{$user->passport}}">
                              </a>
                              Passport image 2
                            </div>
                          </div>
                                
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </form>
                  </div>
                </div>
              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
   
    <!-- /.container-fluid -->
  </section>
  <!-- /.content-wrapper -->
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
        $("#reference1").attr("disabled", "disabled");
        $("#reference2").attr("disabled", "disabled");
        $("#reference_1_mbl").attr("disabled", "disabled");
        $("#reference_2_mbl").attr("disabled", "disabled");

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
        $("#update_reference").click(function () {
            if ($(this).is(":checked")) {
                $("#reference1").removeAttr("disabled");
                $("#reference2").removeAttr("disabled");
                $("#reference_1_mbl").removeAttr("disabled");
                $("#reference_2_mbl").removeAttr("disabled");
                $("#reference1").focus();
            } else {
                $("#reference1").attr("disabled", "disabled");
                $("#reference2").attr("disabled", "disabled");
                $("#reference_1_mbl").attr("disabled", "disabled");
                $("#reference_2_mbl").attr("disabled", "disabled");
            }
        });
  });
</script>
