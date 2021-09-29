@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Bid management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin_lot.show',$bid)}}">All Lots</a></li>
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
        <h3 class="card-title">Update Bid Amount</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="" class="" method="post">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>User name</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Lot No</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Current Bid Amount</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>User Bid Amount</label>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label>New Bid Amount</label>
                <input type="text" class="form-control" name="bid_amount" value="{{old('bid_amount')?old('bid_amount'):''}}">
                    <small class="form-text text-danger"><b><i>{!!$errors->first('bid_amount')!!}</i></b></small>
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
