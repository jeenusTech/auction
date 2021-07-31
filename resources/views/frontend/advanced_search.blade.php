@extends('frontend.layout.header')
@section('content')
<section class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/registration.png')}}");' alt="auction search" title="search auctions and lot">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="search_form_section">
	<div class="container">
	  <div class="row adv_header">
	    <div class="col-md-12 advnc_srchpadding">
	    		<h6>Advanced Search</h6>
	    		<form class="form-inline" action="{{route('advanced_search/search')}}" id="adv_form" method="get">
	    			@csrf
					<div class="form-group">
						<label for="Name2">Keywords:</label>
						<input type="text" class="form-control" id="key" name="keyword" value="{{request()->get('keyword')?request()->get('keyword'):''}}" placeholder="Enter key">
					</div>
					
					<div class="form-group">
						<label for="price_range">Price Range:</label>
						<input type="number" class="form-control" value="{{request()->get('price_range')?request()->get('price_range'):''}}" name="price_range" id="price_range">
						<select class="form-control" name="price_range_order" id="price_range_order">
              <option value="Hight-Low" {{request()->get('price_range_order')=='Hight-Low'?'selected':''}}>Hight-Low</option>
              <option value="Low-Hight" {{request()->get('price_range_order')=='Low-Hight'?'selected':''}}>Low-Hight</option>
						</select>
					</div>
					<div class="form-group">
						<label for="category">Category</label>
						<select class="form-control" name="category" id="category">
							@foreach(all_category() as $category)
							<option value="{{$category->id}}"  {{request()->get('category')==$category->id?'selected':''}}>{{$category->cat_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="auction">Auction</label>
						<select class="form-control" name="auction" id="auction">
							@foreach(all_auction() as $auction)
							<option value="{{$auction->id}}"  {{request()->get('auction')==$auction->id?'selected':''}}>Auction number {{$auction->auction_number}}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-danger">Search</button>
				</form>
	    </div>
	  </div>
	  <div class="row adv_paginate">
	  	<div class="col-md-8">
	  		@php
        $todayDate=now()->toDateString();
        $currentTime=date('H:i:s');
        $today = \Carbon::createFromTimestamp(strtotime($todayDate.$currentTime));
  
        $pages = App\Models\category::paginate(1);
        @endphp
        @if(isset($lots) && $lots != null)
          <div class="search_pagination">{{ $lots->links('frontend.pagination.custom_pagination') }}</div>
         @endif
	  	</div>
	  </div>
    @if(isset($lots) && $lots != null)
	  @foreach($lots as $lot)
      <div class="row adv_result_row">
        <div class="col-lg-12">
          <div class="container auction-container">
            <div class="row">
              <div class="width_20 singleauction-left">
                <div class="singleauctionswipper">
                  <div class="swiper-container" >
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <img data-toggle="magnify" src="{{getimg(glob(ltrim($lot->image,'/').'/*.jpg')[0])}}" width="100%" height="100%" alt="filter-result" title="auction filter" />
                      </div>
                    </div>
                  </div>
                </div>
                {{-- <div class="auction-detail">
                  <ul>
                    <li><a href=""><i class="fa fa-chart-line"></i>Increment Slab</a></li>
                    <li><a href=""><i class="fa fa-heart"></i>Wishlist</a></li>
                    <li><a href=""><i class="">2</i>Bids</a></li>
                  </ul>
                </div> --}}
              </div>
              {{-- bid description section starts here --}}
              <div class="width_50 singleauction-right">
                <div class="row">
                    <div class="col-sm-3"><label>Auc:</label>&nbsp;<span>{{$lot->auctions->auction_number}}</span></div>
                    <div class="col-sm-3"><label>Lot:</label>&nbsp;<span>{{$lot->lot_number}}</span></div>
                    <div class="col-sm-6"><label>Category:</label>&nbsp;<span class="">{{$lot->singlecategory->cat_name}}</span></div>
                </div>
                <div class="row">
                  <p class="auction_description">{{$lot->description}}</p>
                </div>
                <div class="row">
                  <div class="col-md-12 pt-3">
                    @if($today < \Carbon::createFromTimestamp(strtotime($lot->auctions->start_date.$lot->auctions->start_time)))
                   <button type="button" id="single_auc_bid_btn" class="bg-success"><i class="fa fa-gavel pr-2"></i>Coming soon</button>
                    @elseif($lot->sold == '1')
                    <button type="button" id="single_auc_bid_btn" class="bg-success"><i class="fa fa-gavel pr-2"></i>Lot Sold</button>
                    @elseif($today >= \Carbon::createFromTimestamp(strtotime($lot->auctions->end_date.$lot->auctions->end_time)))
                    <button type="button" id="single_auc_bid_btn"><i class="fa fa-gavel pr-2"></i>Lot Closed</button>
                    @else
                    {{-- <button id="single_auc_bid_btn"><i class="fa fa-gavel pr-2"></i>Bid Now</button> --}}
                    <a id="single_auc_bid_btn" class="btn" href="{{route('auction-bid',$lot->id)}}"><i class="fa fa-gavel pr-2"></i>View and Bid</a>
                    @endif         
                  </div>
                </div>
              </div>
              <div class="wid_30">
              	<a href="javascript:void(0)">{{$lot->auctions->title}}</a>

                <div class="row single_auc_bg">
                  <div class="col-md-12 p-2">
                    <div class="row">
                        <div class="col">
                            <label class="auc_blue">Estimate :</label>
                        </div>
                        <div class="col">
                            <p class="auc_blue">Rs {{number_format($lot->min_price,2)}} to Rs {{number_format($lot->max_price,2)}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="auc_blue">Current Bid :</label>
                        </div>
                        <div class="col">
                            <p class="auc_blue">Rs {{number_format($lot->current_bid,2)}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="auc_red">Asking Bid :</label>
                        </div>
                        <div class="col">
                            <p class="auc_red">Rs {{number_format($lot->asking_bid,2)}}</p>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- bid description section ends here --}}
            </div>
          </div>
        </div>
      </div>
      
    @endforeach
    @else
    <div class="row adv_result_row">
      <div class="col-lg-12">
        <div class="container auction-container">
          <div class="row text-center">
            <div class="col-md-6 m-auto">
              Search Something ...
            </div>
            
          </div>
        </div>
      </div>
    </div>
    @endif
	</div>
</section>
@endsection