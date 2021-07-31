@extends('admin.layouts.header')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Management</h1>
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
              <h3 class="card-title">All Blocked Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>email</th>
                  <th>address</th>
                  <th>mobile</th>
                  <th>action</th>
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
                      <td>
                        <form id="block{{ $user->id }}" action="{{route('unblock_user',$user->id)}}" method="post" style="display: inline;">
                            @csrf
                        <a href="javascript:void(0)" class="bg-danger p-2 rounded block-user"  data-id="{{ $user->id }}">Un Block</a>
                      </form>
                        <a href="{{route('manageuser.edit',$user->id)}}" class="bg-success p-2 rounded"><i class="fa fa-pen"></i></a>
                        <a href="{{route('manageuser.show',$user->id)}}" id="show_cat_{{$user->id}}" class="p-2 bg-dark" onclick="showcat({{$user->id}})"><i class="fa fa-eye"></i></a>
                        <form id="deletecat{{ $user->id }}" action="{{route('manageuser.destroy',$user->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $user->id }}" class="delete-confirm bg-danger p-2 rounded"><i class="fa fa-trash"></i></a>
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