@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Auction Management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin-auction.index')}}">All Auctions</a></li>
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
                  <img class="profile-user-img img-fluid " src="{{getimg($auction->image)}}" alt="seller profile picture">
                </div>

                <h3 class="profile-sellername text-center">{{$auction->title}}</h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Auction Number</b> <a class="float-right">{{$auction->auction_number}}</a>
                  </li>
                  {{-- <li class="list-group-item">
                    <b>Category</b> <a class="float-right">{{$auction->auction_category->cat_name}}</a>
                  </li> --}}
                  <li class="list-group-item">
                    <b>Latest</b> <a class="float-right">{{$auction->status==1?'on':'off'}}</a>
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
                <h3 class="card-title">More Info</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-calendar mr-1"></i> Start Date</strong>

                <p class="text-muted">
                  {{$auction->start_date}}
                </p>

                <hr>
                <strong><i class="fas fa-calendar mr-1"></i> End Date</strong>

                <p class="text-muted">
                  {{$auction->start_date}}
                </p>

                <hr>
                <strong><i class="fas fa-clock mr-1"></i> Start Time</strong>

                <p class="text-muted">
                  {{$auction->start_time}}
                </p>

                <hr>
                <strong><i class="fas fa-clock mr-1"></i>End Time</strong>

                <p class="text-muted">
                  {{$auction->end_time}}
                </p>
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
                  <li class="nav-item"><a class="nav-link active" href="#docs" data-toggle="tab">Auction Detail</a></li>
                  <li class="nav-item"><a class="nav-link" href="#verify" data-toggle="tab">Lots</a></li>
                  <li class="nav-item"><a class="nav-link" href="#catelogue" data-toggle="tab">Catelogue</a></li>
                </ul>
                <span class="float-right text-white" style="position: absolute; right: 2%;top: 10px"><b><i>Auction Created - {{$auction->created_at->diffForHumans()}}</i></b></span>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="docs">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{getimg($auction->product_image)}}" alt="seller image">
                        <span class="username">
                          <a href="javascript:void(0)">Auction detail</a>
                        </span>
                        <span class="description">Last Modified - {{$auction->updated_at->diffForHumans()}}</span>
                      </div>
                      <!-- /.seller-block -->
                      <p>
                        {!!$auction->description!!} 
                      </p>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="verify">

          <div class="card card-navy border-dark">
            <div class="card-header">
              <h3 class="card-title">All Lots</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover" width="100%">
                <thead>
                <tr>
                  <th>Auction no.</th>
                  <th>Lot no</th>
                  <th>Price</th>
                  {{-- <th>Close</th> --}}
                  <th>Current bid - Asking bid</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($auction->lot as $lot)
                  <tr>
                    <td>Auction no.{{$lot->auctions->auction_number}}</td>
                    <td>Lot No.{{$lot->lot_number}}</td>
                    <td>Rs. {{number_format($lot->min_price,2)}} - Rs. {{number_format($lot->max_price,2)}}</td>
                    {{-- <td><form id="closed{{ $lot->id }}" action="{{route('lot_closed',$lot->id)}}" method="post" style="display: inline;">
                          @csrf
                          <label id="switch">
                            <input type="checkbox" class="form-control lot_closed" name="closed" {{$lot->closed==1?'checked':''}} data-id="{{ $lot->id }}" >
                            <span class="slider round"></span>
                          </label>
                          
                      </form>
                    </td> --}}
                    <td>Rs. {{number_format($lot->current_bid,2)}} - Rs. {{number_format($lot->asking_bid,2)}}</td>
                    <td>
                      <a href="{{route('admin_lot.show',$lot->id)}}" id="show_cat_{{$lot->id}}" class="p-2 btn btn-success btn-sm"><i class="fas fa-gavel"></i> View Bids</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
                  </div>
                  <div class="tab-pane" id="catelogue">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <p>
                        <iframe id="gen_view" src="{{$auction->catelogue}}" width="100%" height="600"></iframe>
                      </p>
                      </div>
                      <!-- /.seller-block -->
                      
                    </div>
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