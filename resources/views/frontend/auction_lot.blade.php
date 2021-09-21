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
    <div class="row">
      @if(site_navigation() == 'auction-lot')
        <div class="col-md-12">
          <a href="{{route('realization',$auction->id)}}" class="btn btn-danger slider-btn auc-banner-btn float-right">View Realisation</a>
        </div>
      @endif
    </div>
    <div class="row adv_header">

      <div class="col-md-12 advnc_srchpadding">
          <h6>Search Criteria</h6>
          @if(site_navigation() == 'auction-lot')
            <form class="form-inline" action="{{url('auction-lot/'.$auction->id.'/search')}}" id="adv_form" method="get">
          @elseif(site_navigation() == 'category-auctions')
            <form class="form-inline" action="{{url('category-auctions/'.$category->id.'/search')}}" id="adv_form" method="get">
          @elseif(site_navigation() == 'latest-category-auctions')
            <form class="form-inline" action="{{url('latest-category-auctions/'.$category->id.'/'.$auction->id.'/search')}}" id="adv_form" method="get">
          @endif
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
              @if(site_navigation() == 'auction-lot')
              <option value="null"  {{request()->get('category')=='null'?'selected':''}}>All</option>
                @foreach(cat_by_auc($auction->id) as $category)
                <option value="{{$category->category}}"  {{request()->get('category')==$category->category?'selected':''}}>{{$category->singlecategory->cat_name}}</option>
                @endforeach
              @elseif(site_navigation() == 'category-auctions')
                <option value="{{$category->id}}"  {{request()->get('category')==$category->id?'selected':''}}>{{$category->cat_name}}</option>
              @elseif(site_navigation() == 'latest-category-auctions')
                <option value="{{$category->id}}"  {{request()->get('category')==$category->id?'selected':''}}>{{$category->cat_name}}</option>
              @endif
            </select>
          </div>
          <div class="form-group">
            <label for="auction">Auction</label>
            <select class="form-control" name="auction" id="auction">
              @if(site_navigation() == 'auction-lot')
                <option value="{{$auction->id}}"  {{request()->get('auction')==$auction->id?'selected':''}}>Auction number {{$auction->auction_number}}</option>
              @elseif(site_navigation() == 'latest-category-auctions')
                <option value="{{$auction->id}}"  {{request()->get('auction')==$auction->id?'selected':''}}>Auction number {{$auction->auction_number}}</option>
                @else
                <option value="null"  {{request()->get('auction')=='null'?'selected':''}}>All</option>
                @foreach(auc_by_cat($category->id) as $auction)
                <option value="{{$auction->auctions->id}}"  {{request()->get('auction')==$auction->auctions->id?'selected':''}}>Auction number {{$auction->auctions->auction_number}}</option>
                @endforeach
              @endif
            </select>
          </div>
          
          <div class="form-group">
            <label for="material">Material</label>
            <select class="form-control" name="material" id="material">
              @if(site_navigation() == 'auction-lot')
                @if(mat_by_auc($auction->id) ==null)
                <option value="null">null</option>
                @else

                @foreach(mat_by_auc($auction->id) as $material)
                @if($material->material != '' && $material->material != null)
                <option value="{{$material->materials->id}}"  {{request()->get('material')==$material->material?'selected':''}}>{{$material->materials->name}}</option>
                @else
                <option value="null"  {{request()->get('material')==null?'selected':''}}>Other</option>
                @endif
                @endforeach
                @endif

              @elseif(site_navigation() == 'latest-category-auctions')
                @if(mat_by_cat($category->id) ==null)
                  <option value="null">null</option>
                @else
                  @foreach(mat_by_cat_auc($category->id,$auction->id) as $material)
                    @if($material->material != '' && $material->material != null)
                    <option value="{{$material->materials->id}}"  {{request()->get('material')==$material->material?'selected':''}}>{{$material->materials->name}}</option>
                    @else
                    <option value="null"  {{request()->get('material')==null?'selected':''}}>Other</option>
                    @endif
                  @endforeach
                @endif
              @else
                @if(mat_by_cat($category->id) ==null)
                <option value="null">null</option>
                @else
                @foreach(mat_by_cat($category->id) as $material)
                @if($material->material != '' && $material->material != null)
                <option value="{{$material->materials->id}}"  {{request()->get('material')==$material->material?'selected':''}}>{{$material->materials->name}}</option>
                @else
                <option value="null"  {{request()->get('material')==null?'selected':''}}>Other</option>
                @endif
                @endforeach
                @endif
              @endif
            </select>
          </div>
          <div class="form-group">
            <label for="">Lot:</label>
          </div>
          <div class="form-group">
            <label for="material">from</label>
            <input type="number" class="form-control" name="lot_from" id="lotfrom" value="{{request()->get('lot_from')?request()->get('lot_from'):''}}">
          </div>
          <div class="form-group">
            <label for="material">To</label>
            <input type="number" class="form-control" name="lot_to" id="lot_to" value="{{request()->get('lot_to')?request()->get('lot_to'):''}}">
          </div>
          <input type="hidden" class="form-control" name="sort_by" id="sort_by" value="{{request()->get('sort_by')?request()->get('sort_by'):'lots'}}">
          <button type="submit" class="btn btn-danger">Search</button>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        @if(site_navigation() == 'auction-lot')
         <h6 class="auctitle">Auction no: {{$auction->auction_number}} {{$auction->title}}</h6>
         @elseif(site_navigation() == 'latest-category-auctions')
         <h6 class="auctitle">Auction no: {{$auction->auction_number}} {{$auction->title}}</h6>
         <h6 class="auctitle">{{$category->cat_name}}</h6>
         @else
         <h6 class="auctitle">{{$category->cat_name}}</h6>
         @endif
          {{-- start pagination --}}
          <div class="float-right auction-lot-top">
          {{ $lots->links('frontend.pagination.custom_pagination') }}
          </div>
          {{-- end pagination --}}
      </div>
    </div>
        {{-- start the sorting section --}}
    <div class="row adv_result_row">
      <div class="col-md-12 auc_filter">
        <ul class="auc_filter_ul">
          {{-- @if(site_navigation() == 'auction-lot') --}}
          <li><a href="javascript:void(0)" onclick="sortby('lots')">Sort by:</a></li>
          <li><a href="javascript:void(0)"  onclick="sortby('LotDesc')">Lot<i class="fa fa-arrow-down"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="javascript:void(0)"  onclick="sortby('LotAsc')">Lot<i class="fa fa-arrow-up"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="javascript:void(0)" onclick="sortby('EstimateDesc')">Estimate<i class="fa fa-arrow-down"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="javascript:void(0)" onclick="sortby('EstimateAsc')">Estimate<i class="fa fa-arrow-up"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="javascript:void(0)" onclick="sortby('BidDesc')">Bids<i class="fa fa-arrow-down"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="javascript:void(0)" onclick="sortby('BidAsc')">Bids<i class="fa fa-arrow-up"></i></a></li>
          {{-- @elseif(site_navigation() == 'category-auctions')
          <li><a href="{{url('category-auctions/'.$category->id.'/lots')}}">Sort by:</a></li>
          <li><a href="{{url('category-auctions/'.$category->id.'/LotDesc')}}">Lot<i class="fa fa-arrow-down"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="{{url('category-auctions/'.$category->id.'/LotAsc')}}">Lot<i class="fa fa-arrow-up"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="{{url('category-auctions/'.$category->id.'/EstimateDesc')}}">Estimate<i class="fa fa-arrow-down"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="{{url('category-auctions/'.$category->id.'/EstimateAsc')}}">Estimate<i class="fa fa-arrow-up"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="{{url('category-auctions/'.$category->id.'/BidDesc')}}">Bids<i class="fa fa-arrow-down"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="{{url('category-auctions/'.$category->id.'/BidAsc')}}">Bids<i class="fa fa-arrow-up"></i></a></li>
          @elseif(site_navigation() == 'latest-category-auctions')
          <li><a href="{{url('latest-category-auctions/'.$category->id.'/'.$auction->id.'/lots')}}">Sort by:</a></li>
          <li><a href="{{url('latest-category-auctions/'.$category->id.'/'.$auction->id.'/LotDesc')}}">Lot<i class="fa fa-arrow-down"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="{{url('latest-category-auctions/'.$category->id.'/'.$auction->id.'/LotAsc')}}">Lot<i class="fa fa-arrow-up"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="{{url('latest-category-auctions/'.$category->id.'/'.$auction->id.'/EstimateDesc')}}">Estimate<i class="fa fa-arrow-down"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="{{url('latest-category-auctions/'.$category->id.'/'.$auction->id.'/EstimateAsc')}}">Estimate<i class="fa fa-arrow-up"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="{{url('latest-category-auctions/'.$category->id.'/'.$auction->id.'/BidDesc')}}">Bids<i class="fa fa-arrow-down"></i></a></li>
          <li><a href="javascript:void(0)" class="divider">|</a></li>
          <li><a href="{{url('latest-category-auctions/'.$category->id.'/'.$auction->id.'/BidAsc')}}">Bids<i class="fa fa-arrow-up"></i></a></li>
          @endif --}}
        </ul>
      </div>
    </div>

    <div class="row adv_paginate">
          {{-- end of sorting --}}
      <div class="col-md-8">
        @php
        $todayDate=now()->toDateString();
        $currentTime=date('H:i:s');
        $today = \Carbon::createFromTimestamp(strtotime($todayDate.$currentTime));
  
        // $pages = App\Models\category::paginate(1);
        @endphp
        {{-- @if(isset($lots) && $lots != null)
          <div class="search_pagination">{{ $lots->links('frontend.pagination.custom_pagination') }}</div>
         @endif --}}
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

                <div class="row">
                  <div class="col-md-8 pt-3">
                   
                    @if($today < \Carbon::createFromTimestamp(strtotime($lot->auctions->start_date.$lot->auctions->start_time)))
                    <span class="float-right auc_red msg_{{$lot->id}}">This Lot Is Coming Soon</span>
                    @elseif($lot->sold == '1')
                    <span class="float-right auc_red msg_{{$lot->id}}">This Lot Has Been Sold</span>
                    @elseif($today >= \Carbon::createFromTimestamp(strtotime($lot->auctions->end_date.$lot->auctions->end_time)) && $lot->auctions->auction_type=='1')
                    <span class="float-right auc_red msg_{{$lot->id}}">This Lot Has Been Closed</span>
                    @elseif($today >= \Carbon::createFromTimestamp(strtotime($lot->auctions->end_date.$lot->auctions->end_time)) && $lot->auctions->auction_type=='2' && $lot->auctions->status=='1')
                      @if(Auth()->user())
                        @php
                       $userdata=App\Models\Bid::where('user_id',Auth()->user()->id)->where('auction_id',$lot->auction_id)->where('lot_id',$lot->id)->latest()->first();
                       @endphp
                        @if($userdata)
                        <p class="text-right">
                          <span class="float-right auc_blue msg_{{$lot->id}}">Your Bid amount is Rs {{number_format($userdata->bid_amount,2)}} <br>
                            @if(Session::has('err_'.$lot->id))
                            <small class="form-text text-danger"><b><i>{{ Session::get('err_'.$lot->id) }}</i></b></small>
                            @elseif(Session::has('success_'.$lot->id))
                            <small class="form-text text-success"><b><i>{{ Session::get('success_'.$lot->id) }}</i></b></small>
                            @endif
                          </span>
                        </p>
                            @if($userdata->bid_amount < $lot->current_bid)
                            <p class="text-right"><span class="float-right auc_blue msg_{{$lot->id}}">Enter Amount Greater or Equal To Asking Bid</span></p>
                            @endif
                          
                          @else
                          <p class="text-right"><span class="float-right auc_blue msg_{{$lot->id}}">Enter Amount Greater or Equal To Asking Bid <br>
                            @if(Session::has('err_'.$lot->id))
                            <small class="form-text text-danger"><b><i>{{ Session::get('err_'.$lot->id) }}</i></b></small>
                            @elseif(Session::has('success_'.$lot->id))
                            <small class="form-text text-success"><b><i>{{ Session::get('success_'.$lot->id) }}</i></b></small>
                            @endif
                          </span></p>
                        @endif
                      @else
                          <p class="text-right"><span class="float-right auc_blue msg_{{$lot->id}}">Enter Amount Greater or Equal To Asking Bid</span></p>
                      @endif
                    @else
                      @if(Auth()->user())
                      @php
                     $userdata=App\Models\Bid::where('user_id',Auth()->user()->id)->where('auction_id',$lot->auction_id)->where('lot_id',$lot->id)->latest()->first();
                     @endphp
                      @if($userdata)
                      <p class="text-right">
                        <span class="float-right auc_blue msg_{{$lot->id}}">Your Bid amount is Rs {{number_format($userdata->bid_amount,2)}} <br>
                          @if(Session::has('err_'.$lot->id))
                          <small class="form-text text-danger"><b><i>{{ Session::get('err_'.$lot->id) }}</i></b></small>
                          @elseif(Session::has('success_'.$lot->id))
                          <small class="form-text text-success"><b><i>{{ Session::get('success_'.$lot->id) }}</i></b></small>
                          @endif
                        </span>
                      </p>
                          @if($userdata->bid_amount < $lot->current_bid)
                          <p class="text-right"><span class="float-right auc_blue msg_{{$lot->id}}">Enter Amount Greater or Equal To Asking Bid</span></p>
                          @endif
                        
                        @else
                        <p class="text-right"><span class="float-right auc_blue msg_{{$lot->id}}">Enter Amount Greater or Equal To Asking Bid <br>
                          @if(Session::has('err_'.$lot->id))
                          <small class="form-text text-danger"><b><i>{{ Session::get('err_'.$lot->id) }}</i></b></small>
                          @elseif(Session::has('success_'.$lot->id))
                          <small class="form-text text-success"><b><i>{{ Session::get('success_'.$lot->id) }}</i></b></small>
                          @endif
                        </span></p>
                      @endif
                    @else
                        <p class="text-right"><span class="float-right auc_blue msg_{{$lot->id}}">Enter Amount Greater or Equal To Asking Bid</span></p>
                    @endif
                      {{-- <button id="single_auc_bid_btn"><i class="fa fa-gavel pr-2"></i>Bid Now</button> --}}
                    
                  @endif         
                  </div>
                  <div class="col-md-4 pt-3">
                    @if($today < \Carbon::createFromTimestamp(strtotime($lot->auctions->start_date.$lot->auctions->start_time)))
                   
                    @elseif($lot->sold == '1')
                    
                    @elseif($today >= \Carbon::createFromTimestamp(strtotime($lot->auctions->end_date.$lot->auctions->end_time)) && $lot->auctions->auction_type=='1')
                    @elseif($lot->auctions->auction_type=='2' && $lot->auctions->status=='1')
                    <form action="{{route('makebid.store')}}" method="POST" id="form_{{$lot->id}}" name="bid_request_form"  class="float-right">
                      @csrf
                      @method('POST')
                      <input type="hidden" name="lotid" class="col-md-8"  value="{{$lot->id}}" min="{{$lot->asking_bid}}" required>
                      <input type="hidden" name="auctionid" class="col-md-8"  value="{{$lot->auction_id}}" >
                      <input type="number" min="{{$lot->asking_bid}}" class="form-control" name="bidamount" required>
                      <input type="submit" class="form-control single_auc_bid_btn mt-2" name="submit" value="bid">
                    </form>
                    @else
                    <form action="{{route('makebid.store')}}" method="POST" id="form_{{$lot->id}}" name="bid_request_form"  class="float-right">
                      @csrf
                      @method('POST')
                      <input type="hidden" name="lotid" class="col-md-8"  value="{{$lot->id}}" min="{{$lot->asking_bid}}" required>
                      <input type="hidden" name="auctionid" class="col-md-8"  value="{{$lot->auction_id}}" >
                      <input type="number" min="{{$lot->asking_bid}}" class="form-control" name="bidamount" required>
                      <input type="submit" class="form-control single_auc_bid_btn mt-2" name="submit" value="bid">
                    </form>
                    @endif
                  </div>
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
{{-- <div class="modal fade" id="bidform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bidformLabel">{{Auth()->user()?'Bid Your Amount':'Please Login to Your Account'}}</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mdlbdy">
        @if(Auth()->user())
        @if(Auth()->user()->bid_plan_amount ==='unlimited' || Auth()->user()->bid_plan_amount >= $lot->asking_bid)
          
          @else
            <div class="row">
              <div class="form-group text-center">
                <div class="amnt">Sorry! InSufficient Bid Amount In Your Wallet</div>
                <div for="">Asking Bid Amount Is Rs: <span class="amnt">{{$lot->asking_bid}}</span></div>
                <div for="">Your Available Bid Amount Is Rs: <span class="amnt">{{Auth()->user()->bid_plan_amount}}</span></div>
                <div for="">Your Consumed Bid Amount Is Rs: <span class="amnt">{{Auth()->user()->bid_used}}</span></div>
              </div>
            </div>
          @endif
        @else          
          <div class="row">
            <div class="form-group text-center">
              <a href="{{route('login')}}" class="request-btn" name="request_bid">Login</a>
            </div>
          </div>        
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-bs-close" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> --}}
@endsection
<script>
  window.addEventListener('load', () => {
    
  });
   window.addEventListener('load', () => {
    $(window).scroll(function(e){
      var $el = $('.auc_filter_ul'); 
      var isPositionFixed = ($el.css('position') == 'fixed');
      if ($(this).scrollTop() > 400 && !isPositionFixed){ 
         $el.addClass('stickyfilter');
        // $el.css({'position': 'fixed', 'top': '140px','z-index': '9999','background': '#fff'}); 
      }
      if ($(this).scrollTop() < 400 && isPositionFixed){
        // $el.css({'position': 'static', 'top': '0px'});
        $el.removeClass('stickyfilter');
      } 
       var window_top = $(window).scrollTop();
        var footer_top = $("#footer").offset().top;
        
        var div_height = $(".auc_filter_ul").height();

        if (window_top + div_height > footer_top)
            // $el.css({'position': 'static', 'top': '0px'}); 
            $el.removeClass('stickyfilter');   
        
    });
  });
   function sortby(sortby){
    $('#sort_by').val(sortby);
    $('#adv_form').submit();
   }
</script>