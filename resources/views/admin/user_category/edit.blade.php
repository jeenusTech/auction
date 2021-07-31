@extends('admin.layouts.header')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Category Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('user_category.index') }}" title="previous">All Category</a></li>
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
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-8">
                  <form action="{{route('user_category.update',$category->id)}}" method="post" >
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      
                      <div class="form-group">
                        <label for="name">Category name</label>
                        <input type="text" class="form-control {{$errors->has('name')? ' border-danger':''}}" id="name" placeholder="Enyter Category Name" value="{{old('name')?old('name'):$category->name}}" name="name" required>
                        <small class="form-text text-danger">{!!$errors->first('name')!!}</small>
                      </div>
                      <div class="form-group">
                        <label for="bid_limit">Bid limit</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="text" class="form-control {{$errors->has('bid_limit')? ' border-danger':''}}" id="bid_limit" placeholder="Enyter Bid Limit" value="{{old('bid_limit')?old('bid_limit'):$category->bid_limit}}" name="bid_limit" required>
                        <small class="form-text text-danger">{!!$errors->first('bid_limit')!!}</small>
                          </div>
                        </div>
                        <small class="form-text text-danger">{!!$errors->first('cat_image')!!}</small>
                      </div>
                      
                      <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        
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
