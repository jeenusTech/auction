@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Seller Management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('seller.index')}}">All sellers</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-navy border-dark card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{getimg($seller->product_image)}}" alt="seller profile picture">
                </div>

                <h3 class="profile-sellername text-center">{{$seller->name}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Lot Number</b> <a class="float-right">{{$seller->lot_number}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Expected price</b> <a class="float-right">{{$seller->expected_price}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Allot price</b> <a class="float-right">{{$seller->allot_price}}</a>
                  </li>
                </ul>

                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-navy border-dark">
              <div class="card-header">
                <h3 class="card-title">Contact</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-phone mr-1"></i> email</strong>

                <p class="text-muted">
                  {{$seller->email}}
                </p>

                <hr>
                <strong><i class="fas fa-phone mr-1"></i> mobile</strong>

                <p class="text-muted">
                  {{$seller->mobile}}
                </p>

                <hr>
                <strong><i class="fas fa-book mr-1"></i> Address</strong>

                <p class="text-muted">
                  {{$seller->address}}
                </p>

                <hr>
                <strong><i class="fas fa-tree mr-1"></i> Land mark</strong>

                {{-- <p class="text-muted">
                  {{$seller->landmark}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{getCity($seller->city)->name}},{{getState($seller->state)->name}},<br>
                  {{getCountry($seller->country)->name}}-{{$seller->pincode}}</p> --}}

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9 admin_user_detail">
            <div class="card card-navy border-dark">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#docs" data-toggle="tab">Lot Insight</a></li>
                  <li class="nav-item"><a class="nav-link" href="#verify" data-toggle="tab">Invoice</a></li>
                </ul>
                <span class="float-right text-white" style="position: absolute; right: 2%;top: 10px"><b><i>Account Registered - {{$seller->created_at->diffForHumans()}}</i></b></span>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="docs">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{getimg($seller->product_image)}}" alt="seller image">
                        <span class="username">
                          <a href="javascript:void(0)">Lot detail</a>
                        </span>
                        <span class="description">Last Modified - {{$seller->updated_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.seller-block -->
                      <p>
                        <b>All lot data of this user will be displayed here</b> 
                      </p>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="verify">
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