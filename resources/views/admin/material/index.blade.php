@extends('admin.layouts.header')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Material</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('material.create')}}"><i class="fas fa-plus-circle"></i>Create material</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-8 m-auto">
          <div class="card card-navy border-dark">
            <div class="card-header">
              <h3 class="card-title">All material</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                  <th>S.no.</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $sno=1;
                  @endphp
                    @foreach ($materials as $material)
                    <tr>
                      <td>{{ $sno }}</td>
                      <td>{{ $material->name }}</td>
                      <td>
                        <a href="{{route('material.edit',$material->id)}}" class="bg-success p-2 rounded-circle"><i class="fa fa-pen"></i></a>
                        <a href="{{route('material.show',$material->id)}}" id="show_cat_{{$material->id}}" class="p-2" onclick="showcat({{$material->id}})"><i class="fa fa-eye"></i></a>
                        <form id="deletecat{{ $material->id }}" action="{{route('material.destroy',$material->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $material->id }}" class="delete-confirm bg-danger p-2 rounded-circle"><i class="fa fa-trash"></i></a>
                        </form>
                      </td>
                    </tr>
                    {{-- edit single material --}}
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