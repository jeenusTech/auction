@extends('frontend.layout.header')
@section('content')
@php
$stimestamp = strtotime($auction->start_date);
$sday = date('D', $stimestamp);
$sdate = date('d', $stimestamp);
$smonth = date('M', $stimestamp);
$syear = date('Y', $stimestamp);
@endphp
<section class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/Mask_Group_1@2x.png')}}");' alt="auction-categories" title="auction category">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            <h1>Auction No:{{$auction->auction_number}}</h1>
            <p>{{$sday.' '.$sdate.'th '. $smonth.' '. $syear .'  '.$auction->start_time}} Onwards</p>
            <a href="{{route('realization',$auction->id)}}" class="btn btn-danger slider-btn auc-banner-btn">View Realisation</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- End Hero -->
<section id="" class="ltst_auction">
  <div class="container">
    <div class="row">
        {{-- start filter --}}
        @include('frontend.sidebar-filter')
        {{-- end filter --}}
        <div class="col-lg-8">
          <div class="row">
            <div class="col-md-12">
               <h6 class="auctitle">Auction no: {{$auction->auction_number}}</h6>
                {{-- start pagination --}}
                <div class="float-right auction-lot-top">
                {{ $lots->links('frontend.pagination.custom_pagination') }}
                </div>
                {{-- end pagination --}}
            </div>
          </div>
          {{-- start the sorting section --}}
          <div class="row">
            <div class="col-md-12 auc_filter">
              <ul>
                <li><a href="{{url('auction-lot/'.$auction->id.'/lots')}}">Sort by:</a></li>
                <li><a href="{{url('auction-lot/'.$auction->id.'/LotDesc')}}">Lot<i class="fa fa-arrow-down"></i></a></li>
                <li><a href="javascript:void(0)" class="divider">|</a></li>
                <li><a href="{{url('auction-lot/'.$auction->id.'/LotAsc')}}">Lot<i class="fa fa-arrow-up"></i></a></li>
                <li><a href="javascript:void(0)" class="divider">|</a></li>
                <li><a href="{{url('auction-lot/'.$auction->id.'/EstimateDesc')}}">Estimate<i class="fa fa-arrow-down"></i></a></li>
                <li><a href="javascript:void(0)" class="divider">|</a></li>
                <li><a href="{{url('auction-lot/'.$auction->id.'/EstimateAsc')}}">Estimate<i class="fa fa-arrow-up"></i></a></li>
                <li><a href="javascript:void(0)" class="divider">|</a></li>
                <li><a href="{{url('auction-lot/'.$auction->id.'/BidDesc')}}">Bids<i class="fa fa-arrow-down"></i></a></li>
                <li><a href="javascript:void(0)" class="divider">|</a></li>
                <li><a href="{{url('auction-lot/'.$auction->id.'/BidAsc')}}">Bids<i class="fa fa-arrow-up"></i></a></li>
              </ul>
            </div>
          </div>
          {{-- end of sorting --}}
            {{-- start the blocks --}}
           @php
            $todayDate=now()->toDateString();
            $currentTime=date('H:i:s');
            $today = \Carbon::createFromTimestamp(strtotime($todayDate.$currentTime));
            @endphp
          <div class="row">
            @foreach($lots as $lot)
            <div class="div_width_30">
              <div class="shop_auc" style="position: relative;">
                 @if($today < \Carbon::createFromTimestamp(strtotime($lot->auctions->start_date.$lot->auctions->start_time)))
                 <div class="ribbon-wrapper">
                    <div class="ribbon bg-success">
                      New
                    </div>
                  </div>
                 @elseif($lot->sold == 1)
                  <div class="ribbon-wrapper">
                    <div class="ribbon bg-success">
                      Sold
                    </div>
                  </div>
                  @elseif($today >= \Carbon::createFromTimestamp(strtotime($lot->auctions->end_date.$lot->auctions->end_time)))
                  <div class="ribbon-wrapper">
                    <div class="ribbon bg-danger">
                      Closed
                    </div>
                  </div>
                  @endif
                  <img src="{{getimg(glob(ltrim($lot->image,'/').'/*.jpg')[0])}}" alt="todays-lot-{{$lot->lot_number}}" title="today's lot {{$lot->lot_number}}" width="100%">
                  <div class="row">
                    <div class="width_30"><span>Auc:</span>&nbsp;{{$lot->auctions->auction_number}}</div>
                    <div class="width_30"><span>Lot:</span>&nbsp;{{$lot->lot_number}}</div>
                    <div class="width_100"><span>Category:</span>&nbsp;{{$lot->singlecategory->cat_name}}</div>
                  </div>
                  {{-- <div class="row">
                    <div class="width_100"><span>Anicient:</span>&nbsp;Punch marked</div>
                  </div> --}}
                  <div class="row">
                    <div class="width_100"><span>Estimate:</span>&nbsp;Rs {{number_format($lot->min_price)}} to Rs {{number_format($lot->max_price)}}</div>
                  </div>
                  <div class="row">
                    <div class="width_100">{{Str::substr($lot->description, 0,51);}}...</div>
                  </div>
                  <div class="row shop_auc_ask">
                    <div class="width_100">Current Bid: Rs {{number_format($lot->current_bid)}}</div>
                    <div class="width_100">Asking Bid: Rs {{number_format($lot->asking_bid)}}</div>
                  </div>

                  <div class="row shop_auc_btn">
                    <div class="col-md-12 pt-3">
                      <a id="single_auc_bid_btn" class="btn" href="{{route('auction-bid',$lot->id)}}"><i class="fa fa-gavel pr-2"></i>View and Bid</a>
                    </div>
                  </div>
                
              </div>
            </div>
            @endforeach
          </div>
            
            {{-- end of the blocks --}}
          <div class="row">
            <div class="shop_footer_pagination">
              {{-- start pagination --}}
                {{ $lots->links('frontend.pagination.custom_pagination') }}
                {{-- end pagination --}}
            </div>
          </div>  
        </div>
      </div>
    </div>
  </section>
@endsection


