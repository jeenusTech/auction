@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Lot management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin_lot.index')}}">All Lots</a></li>
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
        <h3 class="card-title">Update Lot no. {{$lot->lot_number}}</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{route('admin_lot.update',$lot->id)}}" class="" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Auction</label>
                <select class="form-control select2bs4 " data-dropdown-css-class="select2-danger" style="width: 100%;" name="auction">
                  <option value="">--select auction--</option>
                  @foreach(all_auction() as $auction)
                  <option value="{{$auction->id}}" 
                    @if(old('auction')==$auction->id)
                    selected
                    @elseif($lot->auction_id==$auction->id)
                    selected
                    @endif>Auction No. {{$auction->auction_number}}</option>
                  @endforeach
                </select>
                <small class="form-text text-danger"><b><i>{!!$errors->first('auction')!!}</i></b></small>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Category</label>
                <select class="form-control select2bs4 " data-dropdown-css-class="select2-danger" style="width: 100%;" name="category">
                  <option value="">--select category--</option>
                  @foreach(all_category() as $category)
                  <option value="{{$category->id}}"
                    @if(old('category')==$category->id)
                    selected
                    @elseif($lot->category==$category->id)
                    selected
                    @endif>{{$category->cat_name}}</option>
                  @endforeach
                </select>
                <small class="form-text text-danger"><b><i>{!!$errors->first('category')!!}</i></b></small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Material</label>
                <select class="form-control select2bs4 " data-dropdown-css-class="select2-danger" style="width: 100%;" name="material">
                  <option value="">--select material--</option>
                  @foreach(all_materials() as $material)
                  <option value="{{$material->id}}"
                    @if(old('material')==$material->id)
                    selected
                    @elseif($lot->material==$material->id)
                    selected
                    @endif>{{$material->name}}</option>
                  @endforeach
                </select>
                <small class="form-text text-danger"><b><i>{!!$errors->first('material')!!}</i></b></small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Lot No</label>
                <input type="text" class="form-control" name="lot_number" value="{{old('lot_number')?old('lot_number'):$lot->lot_number}}">
                <small class="form-text text-danger"><b><i>{!!$errors->first('lot_number')!!}</i></b></small>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label>Estimated Price Min</label>
                <input type="text" class="form-control" name="min_price" value="{{old('min_price')?old('min_price'):$lot->min_price}}">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('min_price')!!}</i></b></small>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label>Estimated Price Max</label>
                <input type="text" class="form-control" name="max_price" value="{{old('max_price')?old('max_price'):$lot->max_price}}">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('max_price')!!}</i></b></small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Lot Description</label>
                <textarea class="form-control" rows="3" placeholder="Enter ..." name="description">{{old('description')?old('description'):$lot->description}}</textarea>
                  <small class="form-text text-danger"><b><i>{!!$errors->first('description')!!}</i></b></small>
              </div>
            </div>
          </div>
          <div class="row">
            
            <div class="col-md-6">
              <div class="form-group">
                <label>Lot Image:</label>
                  <table class="table table-bordered table-hover" id="dynamic_field">
                    <tr>
                      <td><input type="file" name="image[]" placeholder="Enter your Name" class="form-control name_list" /></td>
                      <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button></td>  
                    </tr>
                  </table>
                  <small class="form-text text-danger"><b><i>{!!$errors->first('image')!!}</i></b></small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Old Images:</label>
                <div class="">
                  @foreach(glob(ltrim($lot->image.'/*.jpg','/')) as $image)
              
                    <img src="{{URL::asset($image)}}" width="145" alt="">
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <input type="submit" class="form-control btn bg-navy" value="Update lot" />
            </div>
          </div>
          
        </form>
        <!-- /.row -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
       
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</section>
@endsection
<script>
  window.addEventListener('load', () => {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    
    var i = 1;

    $("#add").click(function(){
      i++;
      if(x < max_fields_limit){
        x++; //counter increment
        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="file" name="image[]" placeholder="Enter your Name" class="form-control name_list"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
      }else{
        // alert('sorry You can only add maximum of 10 files');
        swal("Sorry","You reached the maximum","warning");
      }
    });

    $(document).on('click', '.btn_remove', function(){  
      var button_id = $(this).attr("id");   
      $('#row'+button_id+'').remove(); x--;
    });
  });
</script>