@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Auction management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin-auction.index')}}">All Auctions</a></li>
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
            <h3 class="card-title">Edit Auction</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="{{route('admin-auction.update',$auction->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Auction no.</label>
                    <input type="number" class="form-control" value="{{old('auction_number')?old('auction_number'):$auction->auction_number}}" name="auction_number">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('auction_number')!!}</i></b></small>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Auction Title</label>
                    <input type="text" class="form-control" name="title" value="{{old('title')?old('title'):$auction->title}}">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('title')!!}</i></b></small>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Auction Description</label>
                    <textarea class="form-control" rows="3" id="summernote" placeholder="Enter ..." name="description">{{old('description')?old('description'):$auction->description}}</textarea>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('description')!!}</i></b></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Start Date:</label>
                      <div class="input-group date" id="startdate" data-target-input="nearest">
                          <input type="text" name="start_date" value="{{old('start_date')?old('start_date'):$auction->start_date}}" class="form-control datetimepicker-input" data-target="#startdate"/>
                          <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('start_date')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>End Date:</label>
                      <div class="input-group date" id="enddate" data-target-input="nearest">
                          <input type="text" name="end_date"  value="{{old('end_date')?old('end_date'):$auction->end_date}}" class="form-control datetimepicker-input" data-target="#enddate"/>
                          <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('end_date')!!}</i></b></small>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Start Time:</label>
                    <div class="input-group date" id="starttime" data-target-input="nearest">
                      <input type="text" name="start_time" value="{{old('start_time')?old('start_time'):$auction->start_time}}"  class="form-control datetimepicker-input" data-target="#starttime"/>
                      <div class="input-group-append" data-target="#starttime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                    </div>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('start_time')!!}</i></b></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>End Time:</label>
                    <div class="input-group date" id="endtime" data-target-input="nearest">
                      <input type="text" name="end_time" value="{{old('end_time')?old('end_time'):$auction->end_time}}"  class="form-control datetimepicker-input" data-target="#endtime"/>
                      <div class="input-group-append" data-target="#endtime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                    </div>
                    <small class="form-text text-danger"><b><i>{!!$errors->first('end_time')!!}</i></b></small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Auction Image:</label>
                    <div class="input-group">
                      <input type="file" name="image" onchange="previewFile(this);" class="form-control newfile"/>
                      <small class="form-text text-danger"><b><i>{!!$errors->first('image')!!}</i></b></small>                      
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Auction Catelogue:</label>
                    <div class="input-group">
                      <input type="file" name="catelogue" class="form-control"/>
                      <small class="form-text text-danger"><b><i>{!!$errors->first('catelogue')!!}</i></b></small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 text-center">
                  <figure>
                  <img id="oldimg" src="{{getimg($auction->image)}}" width="100%">
                    <figcaption id="oldtxt">old image</figcaption>
                  </figure>
                </div>
                <div class="col-md-2 text-center">
                    <figure>
                      <img id="previewImg" src="" alt="Placeholder" style="display: none;" height="150px" width="150px">
                      <figcaption id="caption" style="display: none;">New image</figcaption>
                    </figure>
                </div>
                <div class="col-md-7 text-center">
                  <p class="text-danger"  target="blank">Old catelogue</p>
                  <iframe id="gen_view" src="{{$auction->catelogue}}" width="450" height="400"></iframe>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                      <input type="submit" class="form-control btn bg-navy" value="Update auction" />
                </div>
              </div>
              
            </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer bg-navy">
           
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
  var file = $(input).get(0).files[0];
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