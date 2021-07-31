@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('manageuser.index')}}">All users</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-navy border-dark card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('/frontend/logo/logo.png')}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->fullname}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$user->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Bid Plan</b> <a class="float-right">{{$user->bid_plan!= null?user_plan($user->bid_plan)->name:'null'}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Bid limit</b> <a class="float-right">{{$user->bid_plan_amount}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Notification</b> <a class="float-right">{{$user->mobile_notification==1?'mobile':''}}-{{$user->email_notification==1?'email':''}}</a>
                  </li>
                </ul>

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-navy border-dark">
              <div class="card-header">
                <h3 class="card-title">Contact</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-phone mr-1"></i> mobile</strong>

                <p class="text-muted">
                  {{$user->mobile_1}},<br>{{$user->mobile_2}}
                </p>

                <hr>
                <strong><i class="fas fa-book mr-1"></i> Address</strong>

                <p class="text-muted">
                  {{$user->address_1}},<br>{{$user->address_2}}
                </p>

                <hr>
                <strong><i class="fas fa-tree mr-1"></i> Land mark</strong>

                <p class="text-muted">
                  {{$user->landmark}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{getCity($user->city)->name}},{{getState($user->state)->name}},<br>
                  {{getCountry($user->country)->name}}-{{$user->pincode}}</p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9 admin_user_detail">
            <div class="card card-navy border-dark">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#docs" data-toggle="tab">Documents</a></li>
                  <li class="nav-item"><a class="nav-link" href="#verify" data-toggle="tab">Verify</a></li>
                </ul>
                <span class="float-right text-white" style="position: absolute; right: 2%;top: 10px"><b><i>Account Registered - {{$user->created_at->diffForHumans()}}</i></b></span>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="docs">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('/frontend/logo/logo.png')}}" alt="user image">
                        <span class="username">
                          <a href="javascript:void(0)">Documents detail</a>
                        </span>
                        <span class="description">Last Modified - {{$user->updated_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <b>Pan:</b>  {{$user->pan ? $user->pan : 'null'}}<br>
                        <b>aadhaar:</b>  {{$user->aadhaar ? $user->aadhaar : 'null'}}<br>
                        <b>Passport:</b>  {{$user->passport ? $user->passport : 'null'}}
                      </p>
                    </div>
                    <!-- /.post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('/frontend/logo/logo.png')}}" alt="user image">
                        <span class="username">
                          <a href="javascript:void(0)">References detail</a>
                        </span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        <b>Reference 1:</b>  {{$user->reference_name_1 ? $user->reference_name_1 : 'null'}}-{{$user->reference_number_1 ? $user->reference_number_1 : 'null'}}<br>
                        <b>Reference 2:</b>  {{$user->reference_name_2 ? $user->reference_name_2 : 'null'}}-{{$user->reference_number_2 ? $user->reference_number_2 : 'null'}}
                      </p>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('/frontend/logo/logo.png')}}" alt="User Image">
                        <span class="username">
                          <a href="javascript:void(0)">Documents</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Last Modified - {{$user->updated_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <!-- /.col -->
                        <div class="col-sm-12">
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
                              <a href="{{getimg($user->aadhaar_file_2)}}" data-lightbox="{{getimg($user->aadhaar_file_2)}}" data-title="Aadhaar back">
                                  <img class="img-fluid" src="{{getimg($user->aadhaar_file_2)}}" alt="{{$user->aadhaar}}">
                              </a>
                              Aadhaar image 2
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                              <a href="{{getimg($user->passport_file_1)}}" data-lightbox="{{getimg($user->passport_file_1)}}" data-title="Passport front">
                                  <img class="img-fluid" src="{{getimg($user->passport_file_1)}}" alt="{{$user->passport}}">
                              </a>
                              Passport image 1
                              <a href="{{getimg($user->passport_file_2)}}" data-lightbox="{{getimg($user->passport_file_2)}}" data-title="Passport back">
                                  <img class="img-fluid" src="{{getimg($user->passport_file_2)}}" alt="{{$user->passport}}">
                              </a>
                              Passport image 2
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="verify">
                    <form class="form-horizontal" action="{{route('verify_user_all',$user->id)}}" method="post">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Pan Verify</label>
                        <div class="col-sm-10">
                          <input type="checkbox" class="form-control" name="pan_verify" {{$user->pan_verify==1?'checked':''}} data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Aadhaar Verify</label>
                        <div class="col-sm-10">
                          <input type="checkbox" class="form-control" name="aadhaar_verify" {{$user->aadhaar_verify==1?'checked':''}} data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Passport Verify</label>
                        <div class="col-sm-10">
                          <input type="checkbox" class="form-control" name="passport_verify" {{$user->passport_verify==1?'checked':''}} data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Plan</label>
                        <div class="col-sm-10">
                          <select name="plan" id="" class="form-control">
                            <option value="">--select plan--</option>
                            @foreach(all_plan() as $cat)
                            <option value="{{$cat->id}}" {{$user->bid_plan == $cat->id?'selected':''}}>{{$cat->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">User Plan amount</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="bid_plan_amount" value="{{$user->bid_plan_amount}}" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Block user</label>
                        <div class="col-sm-10">
                          <input type="checkbox" class="form-control" name="block" {{$user->block==1?'checked':''}} data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Enable user</label>
                        <div class="col-sm-10">
                          <input type="checkbox" class="form-control" name="user_verify" {{$user->user_verify==1?'checked':''}} data-bootstrap-switch data-off-color="danger" data-on-color="success">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection