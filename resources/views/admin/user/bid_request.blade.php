@extends('admin.layouts.header')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Category Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('user_category.index')}}"><i class="fas fa-plus-circle"></i>All category</a></li>
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
              <h3 class="card-title">All Users With </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Mobile</th>
                  <th>Plan Amount</th>
                  <th>Requested Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $sno=1;
                  @endphp
                    @foreach ($users as $user)
                    <tr>
                      <td>{{$sno}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->address_1}}<br>{{$user->address_2}}</td>
                      <td>{{$user->mobile_1}}<br>{{$user->mobile_2}}</td>
                      <td>{{$user->bid_plan_amount}}</td>
                      <td>{{$user->bid_limit_request_amount}}</td>
                      <td>
                        <a href="{{route('bid-request/add',$user->id)}}" class="p-2 btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i> Approve</a>
                        <a href="{{route('manageuser.show',$user->id)}}"  class="p-2" onclick="showcat({{$user->id}})"><i class="fa fa-eye"></i></a>
                        <a href="{{route('bid-request-reject',$user->id)}}"  class="p-2 btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i> Reject</a>
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