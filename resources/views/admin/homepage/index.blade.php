@extends('admin.layouts.header')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Banner Management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('homePage.create')}}"><i class="fas fa-plus-circle"></i>Create Banner</a></li>
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
              <h3 class="card-title">All Banners</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>description</th>
                  <th>button_text</th>
                  {{-- <th>Category</th> --}}
                  <th>button_link</th>
                  <th>image_big</th>
                  <th>image_alt</th>
                  <th>image_title</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($homePages as $homePage)
                    <tr>
                      <td style="width: 150px">{{$homePage->description}}</td>
                      <td>{{$homePage->button_text}}</td>
                      {{-- <td>{{$homePage->homePage_category->cat_name}}</td> --}}
                      <td>{{$homePage->button_link}}</td>
                      <td><img src="{{getimg($homePage->image_big)}}" alt="" width="275px" height="200px"></td>
                      <td>{{$homePage->image_alt}}</td>
                      <td>{{$homePage->image_title}}</td>                      
                      
                      <td>
                        <a href="{{route('homePage.edit',$homePage->id)}}" class="p-2 btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i></a>
                        {{-- <a href="{{route('homePage.show',$homePage->id)}}" id="show_cat_{{$homePage->id}}" class="p-2 btn btn-primary btn-sm"><i class="fas fa-eye"></i></a> --}}
                        <form id="deletecat{{ $homePage->id }}" action="{{route('homePage.destroy',$homePage->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $homePage->id }}" class="delete-confirm btn btn-danger btn-sm p-2 rounded"><i class="fa fa-trash"></i></a>
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