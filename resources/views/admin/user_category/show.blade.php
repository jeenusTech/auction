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
        <div class="col-lg-4 ml-auto mr-auto text-center">
           <div class="card card-navy border-dark">
            <div class="card-header text-center">
              <h3 class="card-title">Selected Plan <b><i>{{$category->name}}</i></b></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="row">
              <div class="col-md-6 ml-auto mr-auto">
                <div class="card-body">
                  <span> Bid Limit <b><i>{{$category->bid_limit}}</i></b></span>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card card-navy border-dark">
            <div class="card-header">
              <h3 class="card-title">All Users With {{$category->name}} Plan</h3>
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
                  <th>Plan Amount</th>
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
                      <td>{{$user->bid_plan_amount}}</td>
                      <td>
                        <a href="{{route('manageuser.edit',$user->id)}}" class="bg-success p-2 rounded-circle"><i class="fa fa-pen"></i></a>
                        <a href="{{route('manageuser.show',$user->id)}}" id="show_cat_{{$user->id}}" class="p-2" onclick="showcat({{$user->id}})"><i class="fa fa-eye"></i></a>
                        <form id="deletecat{{ $user->id }}" action="{{route('manageuser.destroy',$user->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $user->id }}" class="delete-confirm bg-danger p-2 rounded-circle"><i class="fa fa-trash"></i></a>
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