@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Terms And Conditions</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('terms.create')}}">Add terms</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12 admin_user_detail">
            <div class="card card-navy border-dark">
              <div class="card-header p-2">
                
                <span class="float-right text-white" style="position: absolute; right: 2%;top: 10px"></span>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active">
                    <!-- Post -->
                    <div class="post">
                      
                      @if($term !=null)
                     
                       <p>{!!$term->detail!!}</p>
                       <div class="text-center">
                        <a href="{{route('terms.edit',$term->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                        <form id="deletecat{{ $term->id }}" action="{{route('terms.destroy',$term->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $term->id }}" class="delete-confirm btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </form>
                      </div>
                      @endif
                    </div>
                    <!-- /.post -->
                  </div>
                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection