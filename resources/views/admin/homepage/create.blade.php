@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Home page Banner management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('homePage.index')}}">All Banners</a></li>
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
            <h3 class="card-title">Create Banner Detail</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{route('homePage.store')}}" method="post" enctype="multipart/form-data">
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
                    <label>Description</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="description">{{old('description')}}</textarea>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('description')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Button Text</label>
                    <input type="text" name="button_text" class="form-control" value="{{old('button_text')}}">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('button_text')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Button Link</label>
                    <input type="text" name="button_link" class="form-control" value="{{old('button_link')}}">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('button_link')!!}</i></b></small>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Banner Image:</label>
                    <div class="input-group">
                      <input type="file" name="banner_image" class="form-control"/>
                      <small class="form-text text-danger"><b><i>{!!$errors->first('banner_image')!!}</i></b></small>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Image Alt Text</label>
                    <input type="text" class="form-control" value="{{old('image_alt')}}" name="image_alt">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('image_alt')!!}</i></b></small>
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Image Title</label>
                    <div class="input-group">
                      <input type="text" name="image_title" class="form-control"/>
                      <small class="form-text text-danger"><b><i>{!!$errors->first('image_title')!!}</i></b></small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                      <input type="submit" class="form-control btn btn-success"/>
                </div>
              </div>
              
            </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer bg-navy">
           <b class="text-danger"><i>Note *: All the fields are required and the image alt and title are to manage the site SEO.*</i></b>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection
