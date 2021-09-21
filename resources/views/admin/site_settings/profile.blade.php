@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Admin Profile</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            {{-- <li class="breadcrumb-item active"><a href="{{route('bank.index')}}">All Banks</a></li> --}}
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
 <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-dark border-dark">
          <div class="card-header bg-navy">
            <h3 class="card-title">Basic Info</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <form action="{{route('admin_basic_info')}}" method="post">
              @csrf
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" value="{{old('name')?old('name'):auth()->user()->name}}" name="name">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('name')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{old('email')?old('email'):auth()->user()->email}}" name="email">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('email')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Mobile</label>
                    <input type="text" class="form-control" value="{{old('mobile')?old('mobile'):auth()->user()->mobile_1}}" name="mobile">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('mobile')!!}</i></b></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                      <input type="submit" class="form-control btn bg-navy" value="Update Info" />
                </div>
              </div>
              
            </form>
            <!-- /.row -->
          </div>
         
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-dark border-dark">
          <div class="card-header bg-navy">
            <h3 class="card-title">Generate Password</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <form action="{{route('admin_password_update')}}" method="post">
              @csrf
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Old Password</label>
                    <input type="text" class="form-control" value="{{old('oldPassword')}}" name="oldPassword">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('oldPassword')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>New Password</label>
                    <input type="text" class="form-control" value="{{old('password')}}" name="password">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('password')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="text" class="form-control" value="{{old('confirmPassword')}}" name="confirmPassword">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('confirmPassword')!!}</i></b></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                    <input type="submit" class="form-control btn bg-navy" value="Update password" />
                </div>
              </div>
              
            </form>
            <!-- /.row -->
          </div>
         
        </div>
      </div>
    </section>
@endsection
