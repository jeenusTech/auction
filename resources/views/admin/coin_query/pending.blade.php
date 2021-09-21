@extends('admin.layouts.header')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Coin Query Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            {{-- <li class="breadcrumb-item active"><a href="{{route('query.create')}}"><i class="fas fa-plus-circle"></i>Create category</a></li> --}}
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
              <h3 class="card-title">All Pending queries</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Last name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $sno=1;
                  @endphp
                    @foreach ($queries as $query)
                    <tr>
                      <td>{{$sno}}</td>
                      <td>{{$query->name}}</td>
                      <td>{{$query->last_name}}</td>
                      <td>{{$query->email}}</td>
                      <td>{{$query->contact}}</td>
                      <td>{{$query->address}}</td>
                      <td>
                        <a href="{{getimg($query->image)}}" data-lightbox="{{getimg($query->image)}}" data-title="query image" data-width="30px">
                            <img class="img-fluid" src="{{getimg($query->image)}}" alt="{{$query->name}}" width="145px">
                        </a>

                      </td>
                      <td>
                        <a href="{{route('user-coin-query.edit',$query->id)}}" class="bg-success p-2 ">Contacted</a>
                        <form id="deletecat{{ $query->id }}" action="{{route('user-coin-query.destroy',$query->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $query->id }}" class="delete-confirm bg-danger p-2">Delete</a>
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