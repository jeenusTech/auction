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
            <form action="{{route('terms.update',$term->id)}}" method="post">
              @csrf
              @method('PUT')
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
                    <label>Enter Your Terms And Conditions</label>
                    <textarea class="form-control" rows="3" id="summernote" placeholder="Enter ..." name="detail">{{old('detail')?old('detail'):$term->detail}}</textarea>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('detail')!!}</i></b></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                      <input type="submit" class="form-control btn bg-navy" value="Update Terms" />
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