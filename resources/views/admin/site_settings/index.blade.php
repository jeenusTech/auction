@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Basic Site Settings</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('site-info.create')}}">Add Site Settings</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  @if($site_info !=null)
<section class="content">
  <div class="container-fluid">
    <div class="row">
      
      <!-- /.col -->
      <div class="col-md-12 admin_user_detail">
        <div class="card card-navy border-dark">
          <div class="card-header p-2">
            
            <span class="float-right text-white" style="position: absolute; right: 2%;top: 10px"></span>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active">
                <!-- Post -->
                <div class="post">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" value="{{old('title')?old('title'):$site_info->title}}" name="title" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('title')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Facebook Link</label>
                        <input type="text" class="form-control" value="{{old('fb')?old('fb'):$site_info->fb}}" name="fb" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('fb')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Instagram Link</label>
                        <input type="text" class="form-control" value="{{old('instagram')?old('instagram'):$site_info->instagram}}" name="instagram" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('instagram')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Twitter Link</label>
                        <input type="text" class="form-control" value="{{old('twitter')?old('twitter'):$site_info->twitter}}" name="twitter" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('twitter')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Door number</label>
                        <input type="text" class="form-control" value="{{old('door_number')?old('door_number'):$site_info->door_number}}" name="door_number" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('door_number')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Street</label>
                        <input type="text" class="form-control" value="{{old('street')?old('street'):$site_info->street}}" name="street" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('street')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>District</label>
                        <input type="text" class="form-control" value="{{old('district')?old('district'):$site_info->district}}" name="district" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('district')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" value="{{old('state')?old('state'):$site_info->state}}" name="state" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('state')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" value="{{old('country')?old('country'):$site_info->country}}" name="country" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('country')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Pin</label>
                        <input type="text" class="form-control" value="{{old('pin')?old('pin'):$site_info->pin}}" name="pin" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('pin')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{old('email')?old('email'):$site_info->email}}" name="email" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('email')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" value="{{old('phone')?old('phone'):$site_info->phone}}" name="phone" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('phone')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Bank name</label>
                        <input type="text" class="form-control" value="{{old('bank_name')?old('bank_name'):$site_info->bank_name}}" name="bank_name" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('bank_name')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Account number</label>
                        <input type="text" class="form-control" value="{{old('account_number')?old('account_number'):$site_info->account_number}}" name="account_number" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('account_number')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>RTGS / NEFT code</label>
                        <input type="text" class="form-control" value="{{old('neft_code')?old('neft_code'):$site_info->neft_code}}" name="neft_code" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('neft_code')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>GSTIN</label>
                        <input type="text" class="form-control" value="{{old('gstin')?old('gstin'):$site_info->gstin}}" name="gstin" disabled>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('gstin')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Meta description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="meta_description" disabled>{{old('meta_description')?old('meta_description'):$site_info->meta_description}}</textarea>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('meta_description')!!}</i></b></small>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Map Embed code</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="map_link" disabled>{{old('map_link')?old('map_link'):$site_info->map_link}}</textarea>
                        <small class="form-text text-danger"><b><i>{!!$errors->first('map_link')!!}</i></b></small>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="text-center">
                    <a href="{{route('site-info.edit',$site_info->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                    <form id="deletecat{{ $site_info->id }}" action="{{route('site-info.destroy',$site_info->id)}}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                       <a href="javascript:void(0)" data-id="{{ $site_info->id }}" class="delete-confirm btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                    </form>
                  </div>
                </div>
                <!-- /.post -->
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
@endif
@endsection