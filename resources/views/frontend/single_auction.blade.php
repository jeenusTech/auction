@extends('frontend.layout.header')
@section('content')
   <!-- ======= Hero Section ======= -->
<!--   <section id="hero" style='background-image: url("assets/img/hero/registration.png");'>
    <div class="hero-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
     
      <div class="hero">
        <div class="hero-body">
          <h1>Register</h1>
          <p>British coins have always been popular amongst numismatists, not least because of their historical context, but also as a result of some of the finest coins ever being minted within this broad period.</p>
        </div>
      </div>
    </div>
  </section> -->

  <section class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/registration.png')}}");' alt="bhargava-current-auction" title="bhargava current auction">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            <h1>Bid Now</h1>
            <p>British coins have always been popular amongst numismatists, not least because of their historical context, but also as a result of some of the finest coins ever being minted within this broad period.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- End Hero -->
  @php
  $todayDate=now()->toDateString();
  $currentTime=date('H:i:s');
  $today = \Carbon::createFromTimestamp(strtotime($todayDate.$currentTime));
  @endphp
  <!-- ======= Hero Section ======= -->
  <section id="auction-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="container auction-container">
            <div class="row">
              <h6 class="auctitle">Auction Detail</h6>
              <div class="col-sm-12 col-md-5 singleauction-left">
                <div class="singleauctionswipper">
                  <div class="swiper-container singleauctionswiper" >
                    <div class="swiper-wrapper">
                      @foreach(glob(ltrim($lot->image.'/*.jpg','/')) as $img)
                      <div class="swiper-slide">
                        {{-- <img data-toggle="magnify" src="{{asset('frontend/megamenu.png')}}" /> --}}
                        <a href="{{URL::asset($img)}}" class="MagicZoom"><img src="{{URL::asset($img)}}" alt="current-auction" title="current lot {{$lot->lot_number}}" /></a>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div thumbsSlider="" class="swiper-container singleswiperthumb">
                    <div class="swiper-wrapper">
                      @foreach(glob(ltrim($lot->thumbnail.'/*.jpg','/')) as $thumbnail)
                      <div class="swiper-slide">
                        <img src="{{URL::asset($thumbnail)}}" alt="current-auction" title="current lot {{$lot->lot_number}}" />
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                {{-- <div class="auction-detail">
                  <ul>
                    <li><a href=""><i class="fa fa-chart-line"></i>Increment Slab</a></li>
                    <li><a href=""><i class="fa fa-heart"></i>Wishlist</a></li>
                    <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="">2</i>Bids</a></li>
                  </ul>
                </div> --}}
              </div>
              {{-- bid description section starts here --}}
              <div class="col-sm-12 col-md-7 singleauction-right">
                <div class="row">
                    <div class="col-sm-3"><label>Auc:</label>&nbsp;<span>{{$lot->auctions->auction_number}}</span></div>
                    <div class="col-sm-3"><label>Lot:</label>&nbsp;<span>{{$lot->lot_number}}</span></div>
                    <div class="col-sm-6"><label>Cat:</label>&nbsp;<span class="">{{$lot->singlecategory->cat_name}}</span></div>
                </div>
                <div class="row">
                  <p class="auction_description">{{$lot->description}}</p>
                </div>
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
                            <p class="auc_blue" id="current_bid">Rs {{number_format($lot->current_bid,2)}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="auc_red">Asking Bid :</label>
                        </div>
                        <div class="col">
                            <p class="auc_red" id="asking_bid">Rs {{number_format($lot->asking_bid,2)}}</p>
                        </div>
                    </div>
                   @if(Auth()->user())
                    @php
                   $userdata=App\Models\Bid::where('user_id',Auth()->user()->id)->where('auction_id',$lot->auction_id)->where('lot_id',$lot->id)->latest()->first();
                   @endphp
                   @if($userdata)
                    <div class="row">
                        <div class="col">
                            <label class="auc_red">Your Bid :</label>
                        </div>
                        <div class="col">
                            <p class="auc_red" id="asking_bid">Rs {{number_format($userdata->bid_amount,2)}}</p>
                        </div>
                    </div>
                    @endif 
                    @endif
                  </div>
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
                    @if(Auth()->user())
                    <form action="{{route('makebid.store')}}" method="POST" id="form" name="bid_request_form">
                      @csrf
                      @method('POST')
                      <input type="hidden" name="lotid" class="col-md-8"  value="{{$lot->id}}" min="{{$lot->asking_bid}}" required>
                      <input type="hidden" name="auctionid" class="col-md-8"  value="{{$lot->auction_id}}" >
                      <input type="hidden" name="bidamount" class="col-md-8" id="bid_request" value="{{$lot->asking_bid}}" min="{{$lot->asking_bid}}" required>
                        
                          {{-- <input type="submit" class="request-btn" name="request_bid" value="Place Bid"> --}}
                          <button type="submit" id="single_auc_bid_btn"><i class="fa fa-gavel pr-2"></i>Bid Now</button>
                    </form>
                    @else
                    <button type="button" id="single_auc_bid_btn"  data-bs-toggle="modal" data-bs-target="#bidform"><i class="fa fa-gavel pr-2"></i>Bid Now</button>
                    @endif
                    @endif
                  </div>
                </div>
              </div>
              {{-- bid description section ends here --}}
            </div>
          </div>
        </div>
        <div class="col-lg-4 auc-right">
          <div class="row">
            <h6 class="auctitle">Adjacent Lots</h6>
          </div>
            @foreach(adjacent_lots($lot->auction_id,$lot->id) as $adjacent)
              <a href="{{route('auction-bid',$adjacent->id)}}"  class="row single_au_adjacent">
                <div class="col-md-4 img">
                  <img src="{{getimg(glob(ltrim($adjacent->image,'/').'/*.jpg')[0])}}"  alt="adjacent-auction" title="adjacent lot {{$adjacent->lot_number}}" width="100%">
                </div>
                <div class="col-md-8">
                  @if($today < \Carbon::createFromTimestamp(strtotime($adjacent->auctions->start_date.$adjacent->auctions->start_time)))
                  <div class="ribbon-wrapper">
                    <div class="ribbon bg-success">
                      New
                    </div>
                  </div>
                  @elseif($adjacent->sold == 1)
                  <div class="ribbon-wrapper">
                    <div class="ribbon bg-success">
                      Sold
                    </div>
                  </div>
                  @elseif($today >= \Carbon::createFromTimestamp(strtotime($adjacent->auctions->end_date.$adjacent->auctions->end_time)))
                  <div class="ribbon-wrapper">
                    <div class="ribbon bg-danger">
                      Closed
                    </div>
                  </div>
                  @endif
                  <div class="row">
                      <div class="col">
                          <label class="auc_red">Auc:</label>&nbsp;<span>{{$adjacent->auctions->auction_number}}</span>
                      </div>
                      <div class="col">
                          <label class="auc_red">Lot:</label>&nbsp;<span>{{$adjacent->lot_number}}</span>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                          <label class="auc_red">Estimate :</label>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                          <p class="auc_blue">Rs {{number_format($adjacent->min_price,2)}} to Rs {{number_format($adjacent->max_price,2)}}</p>
                      </div>
                  </div>
                </div>                    
              </a>
            @endforeach
            @php
            $paginator=adjacent_lots($lot->auction_id,$lot->id);
            @endphp
           
            <div class="row au_select_drop">
              <div class="col">
                <form action="">
                  <label for="lot" class="auc_blue">Lot:</label>
                  <select name="page" id="">
                    @foreach(range(1, $paginator->lastPage()) as $i)
                    @if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1)
                      <option value="{{$i}}" 
                      {{$i == $paginator->currentPage()?'selected':''}}
                      >{{$i}}</option>
                    @endif
                    @endforeach
                  </select>
                  <button id="single_auc_lot_btn" type="submit">Go</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bid History</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="Grid">
          <tbody>
            <tr>
              <th>Bidder</th>
              <th>Bid Amount</th>
              <th>Bid Date</th>
            </tr>
            <tr>
              <td>*************</td>
              <td style="text-align:center">1100</td>
              <td style="text-align:center">13/03/2021 02:08:50</td>
            </tr>
            <tr>
              <td>*************</td>
              <td style="text-align:center">1200</td>
              <td style="text-align:center">
              13/03/2021 02:37:48
              </td>
            </tr>
            <tr>
              <td>*************</td>
              <td style="text-align:center">1500</td>
              <td style="text-align:center">13/03/2021 02:59:42</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-bs-close" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> --}}

{{-- for bidding form --}}
<div class="modal fade" id="bidform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>
  <!-- End Hero -->

@endsection
  <script>
     window.addEventListener('load', () => {

      var interval = 3000;  // 1000 = 1 second, 3000 = 3 seconds
      function doAjax() {
        var lot='{{$lot->id}}';
        var userplan='';
        @if (Auth()->user())
          var userplan='{{Auth()->user()->bid_plan_amount}}';
        
        @endif
        $.ajaxSetup({
          beforeSend: function(xhr, type) {
              if (!type.crossDomain) {
                  xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
              }
          },
        });
        $.ajax({
              url: "{{url('api/fetch-bidmaount')}}",
              type: "POST",
              data: {
                  lot:lot,
                  _token: '{{csrf_token()}}'
              },
              dataType: 'json',
              success: function (res) {
                
                  $('#current_bid').html(res.current_bid);
                  $('#asking_bid').html(res.asking_bid);
                  $('#bid_request').val(res.btn);
                  $('#entramnt').html(res.btn);
                  if(res.form == '0' && res.form !=''){
                    $('#mdlbdy').html('<div class="row"><div class="form-group text-center"><div class="amnt">Sorry! InSufficient Bid Amount In Your Wallet</div><div for="">Asking Bid Amount Is <span class="amnt">'+res.asking_bid+'</span></div><div for="">Your Available Bid Amount Is <span class="amnt">'+res.available+'</span></div><div for="">Your Consumed Bid Amount Is <span class="amnt">'+res.used+'</span></div></div></div>');
                    // $('#bidform').modal('show');
                  }
                   
              },
                complete: function (data) {
                        // Schedule the next
                        setTimeout(doAjax, interval);
                }
        });
      }
      setTimeout(doAjax, interval);

      
    });

    </script>
