@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Category</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('category.index')}}">All category</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col-md-6 -->
        <div class="col-lg-4 ml-auto mr-auto">
           <div class="card card-navy border-dark">
            <div class="card-header">
              <h3 class="card-title">{{$category->cat_name}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="row">
              <div class="col-md-6 ml-auto mr-auto">
                <div class="card-body">
                  <img  src="{{getimg($category->cat_image)}}" alt="Placeholder"  height="75" >
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-navy border-dark">
            <div class="card-header">
              <h3 class="card-title">All Lots Under <b class="text-warning"><i>{{$category->cat_name}}</i></b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Auction no.</th>
                  <th>Lot no</th>
                  <th>Price</th>
                  <th>Close</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($category->lots as $lot)
                    <tr>

                      <td>Auction no.{{$lot->auctions->auction_number}}</td>
                      <td>Lot No.{{$lot->lot_number}}</td>
                      <td>{{$lot->min_price}} - {{$lot->max_price}}</td>
                      <td><form id="closed{{ $lot->id }}" action="{{route('lot_closed',$lot->id)}}" method="post" style="display: inline;">
                            @csrf
                            <label id="switch">
                              <input type="checkbox" class="form-control lot_closed" name="closed" {{$lot->closed==1?'checked':''}} data-id="{{ $lot->id }}" >
                              <span class="slider round"></span>
                            </label>
                            
                        </form>
                      </td>
                      <td>
                        
                        <a href="{{route('admin_lot.edit',$lot->id)}}" class="p-2 btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <a href="{{route('admin_lot.show',$lot->id)}}" id="show_cat_{{$lot->id}}" class="p-2 btn btn-primary btn-sm"><i class="fas fa-folder"></i> View</a>
                        <form id="deletecat{{ $lot->id }}" action="{{route('admin_lot.destroy',$lot->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $lot->id }}" class="delete-confirm btn btn-danger btn-sm p-2 rounded"><i class="fa fa-trash"></i> Delete</a>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
   
    <!-- /.container-fluid -->
  </section>
  <!-- /.content-wrapper -->
  @endsection
  <script>
    function auction_status(event) {
        const url = $(this).attr('href');
        const id = $(this).attr('data-id');
        swal({
            title: 'Are you sure?',
            text: 'Would you like to proceed with your current action!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                $('#status'+id).submit();
            }
        });
    }
  </script>