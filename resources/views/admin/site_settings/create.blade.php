@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Bank management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('bank.index')}}">All Banks</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
 <!-- Content Header (Page header) -->
 

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-dark border-dark">
          <div class="card-header bg-navy">
            <h3 class="card-title">Create Bank Detail</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{route('site-info.store')}}" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" value="{{old('title')}}" name="title">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('title')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Facebook Link</label>
                    <input type="text" class="form-control" value="{{old('fb')}}" name="fb">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('fb')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Instagram Link</label>
                    <input type="text" class="form-control" value="{{old('instagram')}}" name="instagram">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('instagram')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Twitter Link</label>
                    <input type="text" class="form-control" value="{{old('twitter')}}" name="twitter">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('twitter')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Door number</label>
                    <input type="text" class="form-control" value="{{old('door_number')}}" name="door_number">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('door_number')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Street</label>
                    <input type="text" class="form-control" value="{{old('street')}}" name="street">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('street')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>District</label>
                    <input type="text" class="form-control" value="{{old('district')}}" name="district">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('district')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>State</label>
                    <input type="text" class="form-control" value="{{old('state')}}" name="state">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('state')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Country</label>
                    <input type="text" class="form-control" value="{{old('country')}}" name="country">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('country')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Pin</label>
                    <input type="text" class="form-control" value="{{old('pin')}}" name="pin">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('pin')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" value="{{old('email')}}" name="email">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('email')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" value="{{old('phone')}}" name="phone">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('phone')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Bank name</label>
                    <input type="text" class="form-control" value="{{old('bank_name')}}" name="bank_name">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('bank_name')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Account number</label>
                    <input type="text" class="form-control" value="{{old('account_number')}}" name="account_number">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('account_number')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>RTGS / NEFT code</label>
                    <input type="text" class="form-control" value="{{old('neft_code')}}" name="neft_code">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('neft_code')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>GSTIN</label>
                    <input type="text" class="form-control" value="{{old('gstin')}}" name="gstin">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('gstin')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Meta description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="meta_description">{{old('meta_description')}}</textarea>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('meta_description')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Map Embed code</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="map_link">{{old('map_link')}}</textarea>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('map_link')!!}</i></b></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                      <input type="submit" class="form-control btn bg-navy" value="Add Settings" />
                </div>
              </div>
              
            </form>
            <!-- /.row -->
          </div>
         
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection
