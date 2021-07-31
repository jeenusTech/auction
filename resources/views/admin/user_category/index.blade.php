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
            <li class="breadcrumb-item active"><a href="{{route('user_category.create')}}"><i class="fas fa-plus-circle"></i>Create category</a></li>
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
              <h3 class="card-title">All Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Bid Limit</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $sno=1;
                  @endphp
                    @foreach ($user_categories as $category)
                    <tr>
                      <td>{{$sno}}</td>
                      <td>{{$category->name}}</td>
                      <td>{{$category->bid_limit}}</td>
                      <td>
                        <a href="{{route('user_category.edit',$category->id)}}" class="bg-success p-2 rounded-circle"><i class="fa fa-pen"></i></a>
                        <a href="{{route('user_category.show',$category->id)}}" id="show_cat_{{$category->id}}" class="p-2" onclick="showcat({{$category->id}})"><i class="fa fa-eye"></i></a>
                        <form id="deletecat{{ $category->id }}" action="{{route('user_category.destroy',$category->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $category->id }}" class="delete-confirm bg-danger p-2 rounded-circle"><i class="fa fa-trash"></i></a>
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