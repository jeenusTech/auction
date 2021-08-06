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
            <form action="{{route('bank.store')}}" method="post" enctype="multipart/form-data">
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
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Bank Info</label>
                    <textarea class="form-control" rows="3" id="summernote" placeholder="Enter ..." name="bank_info">{{old('bank_info')}}</textarea>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('bank_info')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Bank Description</label>
                    <textarea class="form-control" rows="3" id="summernote1" placeholder="Enter ..." name="bank_description">{{old('bank_description')}}</textarea>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('bank_description')!!}</i></b></small>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Bank Logo Image:</label>
                    <div class="input-group">
                      <input type="file" name="bank_logo" class="form-control"/>
                      <small class="form-text text-danger"><b><i>{!!$errors->first('bank_logo')!!}</i></b></small>                      
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Bank Qr-Code</label>
                    <div class="input-group">
                      <input type="file" name="qr_code" class="form-control"/>
                      <small class="form-text text-danger"><b><i>{!!$errors->first('qr_code')!!}</i></b></small>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Bank Name</label>
                    <input type="text" class="form-control" value="{{old('name')}}" name="name">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('name')!!}</i></b></small>
                  </div>
                  <!-- /.form-group -->
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
           <img src="{{asset('/frontend/bankinfomodal.JPG')}}" alt="">
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection
<script>
  window.addEventListener('load', () => {
     $('#summernote1').summernote({
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'italic', 'underline', 'clear']],
          ['fontsize', ['fontsize']],
          ['fontname', ['fontname']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          // ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']],
          ['height', ['height']]
        ]
    })
  });
</script>