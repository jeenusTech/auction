@extends('admin.layouts.header')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Auction Management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin-auction.create')}}"><i class="fas fa-plus-circle"></i>Create auction</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-navy border-dark">
            <div class="card-header">
              <h3 class="card-title">All Auctions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Auction no.</th>
                  <th>Title</th>
                  {{-- <th>Category</th> --}}
                  <th>Date</th>
                  <th>Time</th>
                  <th>Latest</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($auctions as $auction)
                    <tr>
                      <td>{{$auction->auction_number}}</td>
                      <td>{{$auction->title}}</td>
                      {{-- <td>{{$auction->auction_category->cat_name}}</td> --}}
                      <td>{{$auction->start_date}} to {{$auction->end_date}}</td>
                      <td>{{$auction->start_time}} to {{$auction->end_time}}</td>
                      <td><form id="status{{ $auction->id }}" action="{{route('auction_status',$auction->id)}}" method="post" style="display: inline;">
                            @csrf
                            <label id="switch">
                              <input type="checkbox" class="form-control auction_status" name="status" {{$auction->status==1?'checked':''}} data-id="{{ $auction->id }}" >
                              <span class="slider round"></span>
                            </label>
                            
                        </form>
                      </td>
                      <td>
                        <a href="{{route('admin-auction.edit',$auction->id)}}" class="p-2 btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <a href="{{route('admin-auction.show',$auction->id)}}" id="show_cat_{{$auction->id}}" class="p-2 btn btn-primary btn-sm"><i class="fas fa-folder"></i> View</a>
                        <form id="deletecat{{ $auction->id }}" action="{{route('admin-auction.destroy',$auction->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $auction->id }}" class="delete-confirm btn btn-danger btn-sm p-2 rounded"><i class="fa fa-trash"></i> Delete</a>
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
   
  </script>