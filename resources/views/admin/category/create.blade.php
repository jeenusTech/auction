@extends('admin.layouts.header')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('category.index') }}" title="previous">All Category</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
             <div class="card card-navy border-dark">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-8">
                  <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label for="catname">Category name</label>
                        <input type="text" class="form-control {{$errors->has('catname')? ' border-danger':''}}" id="catname" placeholder="Enyter Category Name" value="{{old('catname')}}" name="catname" required>
                        <small class="form-text text-danger">{!!$errors->first('catname')!!}</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Category Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input  {{$errors->has('cat_image')? ' border-danger':''}}" id="exampleInputFile" name="cat_image" required="" onchange="previewFile(this);">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            
                          </div>
                        </div>
                        <small class="form-text text-danger">{!!$errors->first('cat_image')!!}</small>
                      </div>
                      
                      <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </form>
                </div>
                <div class="col-md-4">
                  <div class="card-body">
                    <img id="previewImg" src="" alt="Placeholder" style="display: none;" height="150px" width="150px">
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
      </div>
    </section>
        <!-- /.row -->
        {{-- row for data table --}}
@endsection
<script>
function previewFile(input){
  var file = $("input[type=file]").get(0).files[0];
  if(file){
    var reader = new FileReader();
    reader.onload = function(){
      $("#previewImg").show();
      $("#previewImg").attr("src", reader.result);
    }
    reader.readAsDataURL(file);
  }
}
</script>