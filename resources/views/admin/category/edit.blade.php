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
              <li class="breadcrumb-item active"><a href="{{ route('category.index')}}" title="previous">All Category</a></li>
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
                <h3 class="card-title">Update Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-5">
                  <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="category">Category name</label>
                        <input type="text" class="form-control {{$errors->has('category')? ' border-danger':''}}" id="category" placeholder="Enyter Category Name" value="{{old('category')?old('category'):$category->cat_name}}" name="category" required>
                        <small class="form-text text-danger">{!!$errors->first('category')!!}</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Category Image</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input  {{$errors->has('categoryImage')? ' border-danger':''}}" id="exampleInputFile" name="categoryImage"  onchange="previewFile(this);">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            
                          </div>
                        </div>
                        <small class="form-text text-danger">{!!$errors->first('categoryImage')!!}</small>
                      </div>
                      
                      <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                        
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </form>
                </div>
                <div class="col-md-4">
                  <div class="card-body text-center">
                    <figure>
                      <img id="previewImg" src="" alt="Placeholder" style="display: none;" height="150px" width="150px">
                      <figcaption id="caption" style="display: none;">New image</figcaption>
                    </figure>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="card-body text-center">
                    <figure>
                      <img src="{{getimg($category->cat_image)}}" alt="{{getimg($category->cat_name)}}" height="150">
                      <figcaption>Old image</figcaption>
                    </figure>
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
      $("#caption").show();
      $("#previewImg").attr("src", reader.result);
    }
    reader.readAsDataURL(file);
  }
}
</script>