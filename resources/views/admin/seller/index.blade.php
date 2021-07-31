@extends('admin.layouts.header')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Seller Management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            {{-- <li class="breadcrumb-item active"><a href="{{route('user.create')}}"><i class="fas fa-plus-circle"></i>Create category</a></li> --}}
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
              <h3 class="card-title">All Approved Sellers</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Lot number</th>
                  <th>email</th>
                  <th>mobile</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $sno=1;
                  @endphp
                    @foreach ($sellers as $seller)
                    <tr>
                      <td>{{$sno}}</td>
                      <td>{{$seller->name}}</td>
                      <td>{{$seller->lot_number}}</td>
                      <td>{{$seller->email}}</td>
                      <td>{{$seller->mobile}}<br>{{$seller->mobile_2}}</td>
                      <td>
                        <form id="block{{ $seller->id }}" action="{{route('block_seller',$seller->id)}}" method="post" style="display: inline;">
                            @csrf
                        <a href="javascript:void(0)" class="btn bg-danger btn-sm p-2 rounded block-seller"  data-id="{{ $seller->id }}"><i class="fas fa-ban"></i> Block</a>
                      </form>
                        <a href="{{route('seller.edit',$seller->id)}}" class="p-2 btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <a href="{{route('seller.show',$seller->id)}}" id="show_cat_{{$seller->id}}" class="p-2 btn btn-primary btn-sm"><i class="fas fa-folder"></i> View</a>
                        <form id="deletecat{{ $seller->id }}" action="{{route('seller.destroy',$seller->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $seller->id }}" class="delete-confirm btn btn-danger btn-sm p-2 rounded"><i class="fa fa-trash"></i> Delete</a>
                        </form>
                      </td>
                    </tr>
                    {{-- edit single category --}}
                    @php
                      $sno ++;
                    @endphp
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