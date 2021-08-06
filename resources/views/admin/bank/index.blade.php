@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Bank Management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('bank.create')}}">Add Bank</a></li>
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
                <ul class="nav nav-pills">
                  @foreach($banks as $bank)
                  <li class="nav-item"><a class="nav-link" href="#bank_{{$bank->id}}" data-toggle="tab">{{$bank->name}}</a></li>
                  @endforeach
                </ul>
                <span class="float-right text-white" style="position: absolute; right: 2%;top: 10px"></span>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  @foreach($banks as $bank)
                  <div class="tab-pane" id="bank_{{$bank->id}}">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{getimg($bank->bank_logo)}}" alt="seller image">
                        <span class="username">
                          <a href="javascript:void(0)">{{$bank->name}}</a>
                        </span>
                        <span class="description">Last Modified - {{$bank->created_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.seller-block -->
                      <div class="row">
                            <div class="col-sm-12 col-md-9">
                              {!!$bank->bank_info!!}
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <img src="{{getimg($bank->qr_code)}}" alt="" class="qr-upi">
                            </div>
                        </div>
                       <p>{!!$bank->bank_description!!}</p>
                       <div class="text-center">
                        <a href="{{route('bank.edit',$bank->id)}}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                        <form id="deletecat{{ $bank->id }}" action="{{route('bank.destroy',$bank->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $bank->id }}" class="delete-confirm btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </form>
                      </div>
                    </div>
                    <!-- /.post -->
                  </div>
                  @endforeach
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