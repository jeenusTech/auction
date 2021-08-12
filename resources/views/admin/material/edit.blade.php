@extends('admin.layouts.header')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Material</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('material.index') }}" title="previous">All material</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
             <div class="card card-navy border-dark">
              <div class="card-header">
                <h3 class="card-title">Update material</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-8">
                  <form action="{{route('material.update',$material->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label for="name">Material name</label>
                        <input type="text" class="form-control {{$errors->has('name')? ' border-danger':''}}" id="name" placeholder="Enyter material Name" value="{{old('name')?old('name'):$material->name}}" name="name" required>
                        <small class="form-text text-danger">{!!$errors->first('name')!!}</small>
                      </div>
                      
                      <div class="form-group">
                        <button type="submit" class="btn bg-navy">Update</button>
                        
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </form>
                </div>
              </div>
              
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
      </div>
    </section>
        <!-- /.row -->
        {{-- row for data table --}}
@endsection
