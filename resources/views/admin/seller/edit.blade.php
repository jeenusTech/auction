@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Seller management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('manageuser.index')}}">All Sellers</a></li>
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
            <h3 class="card-title">Edit Seller <b class="text-warning"><i>{{$seller->name}}'s</i></b> Info</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{route('seller.update',$seller->id)}}"  method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Seller Name</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')?old('name'):$seller->name}}">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('name')!!}</i></b></small>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Seller Product Image</label>
                    <input type="file" class="form-control" name="product_image" value="{{old('product_image')}}" onchange="previewFile(this);">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('product_image')!!}</i></b></small>
                  </div>
                </div>
                <!-- /.col -->
                
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Lot Number:</label>
                      <input class="form-control" type="text" name="lot_number" value="{{old('lot_number')?old('lot_number'):$seller->lot_number}}" />
                    <small class="form-text text-danger"><b><i>{!!$errors->first('lot_number')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Mobile Number:</label>
                      <input class="form-control" type="number" name="mobile" value="{{old('mobile')?old('mobile'):$seller->mobile}}" />
                    <small class="form-text text-danger"><b><i>{!!$errors->first('mobile')!!}</i></b></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Seller Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')?old('email'):$seller->email}}">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('email')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Expected Price</label>
                    <input type="text" class="form-control" name="expected_price" value="{{old('expected_price')?old('expected_price'):$seller->expected_price}}">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('expected_price')!!}</i></b></small>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <label>Allot Price</label>
                    <input type="text" class="form-control" name="allot_price" value="{{old('allot_price')?old('allot_price'):$seller->allot_price}}">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('allot_price')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Seller Address</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="address" >{{old('address')?old('address'):$seller->address}}</textarea>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('address')!!}</i></b></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 text-center">
                  <figure>
                  <img id="oldimg" src="{{getimg($seller->product_image)}}" width="100%">
                    <figcaption id="oldtxt">old image</figcaption>
                  </figure>
                </div>
                <div class="col-md-2 text-center">
                    <figure>
                      <img id="previewImg" src="" alt="Placeholder" style="display: none;" height="150px" width="150px">
                      <figcaption id="caption" style="display: none;">New image</figcaption>
                    </figure>
                </div>
                <div class="col-md-8 text-center">
                  <b class="text-danger"><i>* After Editing Seller {{$seller->name}}'s Data, The Account Will Be Moved To Pending</i></b>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                      <input type="submit" class="form-control btn bg-navy" value="update seller" />
                </div>
              </div>
              
            </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
           
          </div>
        </div>
        <!-- /.card -->

               <!-- /.card -->


      </div>
      <!-- /.container-fluid -->
    </section>
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