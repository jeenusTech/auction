@extends('admin.layouts.header')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>lot Management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('admin_lot.index')}}">All lots</a></li>
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
              <div class="card-header bg-navy">
                <h3 class="card-title">Lot no.{{$lot->lot_number}}</h3>
              </div>
              <div class="card-body box-profile">
                <div class="text-center"></div>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Category name</b> <a class="float-right">{{$lot->singlecategory->cat_name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Material</b> <a class="float-right">{{$lot->materials?$lot->materials->name:'-'}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Auction No</b> <a class="float-right">{{$lot->auctions->auction_number}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Auction Title</b> <a class="float-right">{{$lot->auctions->title}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Price</b> <a class="float-right">{{$lot->min_price.'--'.$lot->max_price}}</a>
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
                <strong><i class="fas fa-file mr-1"></i> Description</strong>

                <p class="text-muted">
                  {{$lot->description}}
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
                  <li class="nav-item">
                    <a class="nav-link active" href="#verify" data-toggle="tab">Bid Info</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#images" data-toggle="tab">Images</a>
                  </li>
                </ul>
                <span class="float-right text-white" style="position: absolute; right: 2%;top: 10px"><b><i>lot Created - {{$lot->created_at->diffForHumans()}}</i></b></span>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="verify">
                    <div class="card card-navy border-dark">
            <div class="card-header">
              <h3 class="card-title">Bid info</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>User Email</th>
                  <th>Bid Amount</th>
                  <th>Bid Date</th>
                  <th>Invoice</th>
                  {{-- <th>Close</th> --}}
                </tr>
                </thead>
                <tbody>
                    @foreach($lot->bid as $bid)
                    <tr class="{{$bid->awarded==1?'bg-success':''}}">

                    <td>{{$bid->user->name}}</td>
                    <td>{{$bid->user->email}}</td>
                    <td>{{number_format($bid->bid_amount,2)}}</td>
                    <td>{{$bid->created_at->diffForHumans()}}</td>
                    <td>@if($bid->awarded==1)<a href="{{route('generate-invoice',$bid->id)}}" class="btn btn-warning" target="blank">Generate</a>@endif</td>
                    {{-- <td><form id="closed{{ $lot->id }}" action="{{route('lot_closed',$lot->id)}}" method="post" style="display: inline;">
                          @csrf
                          <label id="switch">
                            <input type="checkbox" class="form-control lot_closed" name="closed" {{$lot->closed==1?'checked':''}} data-id="{{ $lot->id }}" >
                            <span class="slider round"></span>
                          </label>
                          
                      </form>
                    </td> --}}
                  </tr>

                  @endforeach
                </tbody>
              </table>
              <span class="text-danger"><b><i>*The green color shows the awarded Bidder*</i></b></span>
            </div>
            <!-- /.card-body -->
          </div>
                  </div>
                  <div class="tab-pane" id="images">
                    <div class="post">
                      <div class="user-block">
                        <span class="username">
                          <a href="javascript:void(0)">Image Thumbnails </a>
                        </span>
                        <span class="description image_thumb">                          
                          @foreach(glob(ltrim($lot->thumbnail,'/').'/*.jpg') as $thumbnail)
                          <img src="{{URL::asset($thumbnail)}}" alt="" class="p-2 thumbs">
                          @endforeach
                        </span>
                      </div>
                      <div class="user-block">
                        <span class="username">
                          <a href="javascript:void(0)">Main Images</a>
                        </span>
                        <span class="description image_thumb">                          
                          @foreach(glob(ltrim($lot->image,'/').'/*.jpg') as $imgage)
                          <img src="{{URL::asset($imgage)}}" alt="" class="p-2 images">
                          @endforeach
                        </span>
                      </div>
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