@extends('admin.layouts.header')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('category.index')}}" title="previous">All Category</a></li>
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
                <h3 class="card-title">Assign Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-5">
                  <form action="{{route('update_pendinguser',$pendinguser->id)}}" method="get" >
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="category">User name</label>
                        <input type="text" class="form-control" id="user" placeholder="Enyter Category Name" value="{{$pendinguser->name}}" name="category" disabled="disabled">
                       
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">User Plan</label>
                        <div class="input-group">
                          <select name="plan" id="plan" class="form-control">
                          	@foreach($category as $cat)
                          	<option value="{{$cat->id}}" {{$pendinguser->bid_plan == $cat->id?'selected':''}}>{{$cat->name}}</option>
                          	@endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputSkills" class="col-form-label">User Plan amount</label>    
                        <div class="input-group">
                            <input type="number" class="form-control" name="bid_plan_amount" value="{{$pendinguser->bid_plan_amount}}" >
                        </div>
                      </div>
                      
                      
                      <div class="form-group">
                        <button type="submit" class="btn btn-success">Update</button>
                        
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
