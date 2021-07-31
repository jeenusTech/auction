@extends('frontend.layout.header')
@section('content')
<section class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/Mask_Group_1@2x.png')}}");' alt="latest auctions" title="latest auction">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            <h1>Auctions</h1>
            <p>Auctioneer of Coins, Bank Notes and Medals Antiques License No. 15</p>
            <a href="" class="btn btn-danger slider-btn auc-banner-btn">Get In Touch</a>
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
        @php
        $todayDate=now()->toDateString();
        $currentTime=date('H:i:s');
        $today = \Carbon::createFromTimestamp(strtotime($todayDate.$currentTime));
        @endphp
        @if($auction && $today < \Carbon::createFromTimestamp(strtotime($auction->end_date.$auction->end_time)))
        <div class="col-lg-8">
            <h6 class="auctitle">Latest Auctions</h6>
            <a href="{{route('realization',$auction->id)}}" class="realization-btn float-right">View Realization</a>
          <div class="container latest-auction-container">
            <div class="row">
              <div class="container latest_auc_title">
                <div class="row">
                  <div class="col-md-6">
                    <h6>Auction No.{{$auction->auction_number}}</h6>
                    {{-- <label class="auc_title_label">Sunday 9th May 2021 10:30 Am Onwards</label> --}}
                    @php
                    // for start date and time
                      $stimestamp = strtotime($auction->start_date);
                      $sday = date('D', $stimestamp);
                      $sdate = date('d', $stimestamp);
                      $smonth = date('M', $stimestamp);
                      $syear = date('Y', $stimestamp);
                      
                      $timefrom=$smonth.' '.$sdate.','.$syear.' '.$auction->start_time;
                      // for end date and time
                      $etimestamp = strtotime($auction->end_date);
                      $eday = date('D', $etimestamp);
                      $edate = date('d', $etimestamp);
                      $emonth = date('M', $etimestamp);
                      $eyear = date('Y', $etimestamp);
                        
                      $timeto=$emonth.' '.$edate.','.$eyear.' '.$auction->end_time;
                    @endphp
                    <label class="auc_title_label">{{$sday.' '.$sdate.'th '. $smonth.' '. $syear .'  '.$auction->start_time}} Onwards</label>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                        <label class="auc_title_label" for="time">Time :</label>
                        <div id="clockdiv" class="">
                          <div>
                            <span class="days">1</span>
                            <div class="smalltext">DAYS</div>
                          </div>
                          <div>
                            <span class="hours">2</span>
                            <div class="smalltext">HRS</div>
                          </div>
                          <div>
                            <span class="minutes">30</span>
                            <div class="smalltext">MINS</div>
                          </div>
                          <div>
                            <span class="seconds">33</span>
                            <div class="smalltext">SECS</div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-5 singleauction-left">
                <div class="singleauctionswipper" id="latest_auction">
                  <img src="{{getimg($auction->image)}}" alt="{{$auction->title}}" title="{{$auction->title}}" />
                </div>
              </div>
              {{-- bid description section starts here --}}
              <div class="col-sm-12 col-md-7 singleauction-right">
                {{-- <div class="row">
                  <h6>Antiques’ Auctions</h6>
                  <p class="auction_description">Auctioneer of Coins, Bank Notes and Medals Antiques License No. 15.</p>
                </div>
                <div class="row">
                  <h6>Venue</h6>
                  <p class="auction_description">Oswal Antiques 307, Narayan Udyog Owners Premises. Co. Op. Society Ltd., 7, Industrial Estate, Chiwda Galli, Lalbaug, Mumbai-400 012.</p>
                </div>
                <div class="row">
                  <h6>Public View</h6>
                  <p class="auction_description">At Lalbuag office from 03.05.2021 to 08.05.2021 between 12:30 PM to 5:00 PM <label>( By Prior Appointment Only )</label></p>
                </div>
                <div class="row">
                  <h6>OA Forthcoming Auctions</h6>
                  <p class="auction_description">Auction No. 90 - Saturday 24th July 2021, 5PM Onwards at Kolkata.</p>
                </div> --}}
                <div class="row">
                  {!!$auction->description!!}
                </div>
                <div class="row">
                  <div class="col-md-12 p-2 auction-detail">
                    <ul>
                      <li><a href="{{url('auction-lot/'.$auction->id.'/lots')}}"><i class="fas fa-th-large"></i>View Lots</a></li>
                      <li><a href="{{url($auction->catelogue)}}" target="blank" download><i class="fas fa-file-pdf"></i>Catelogue</a></li>
                    </ul>
                  </div>
                </div>
               {{--  <div class="row">
                  <div class="col-md-12 pt-3">
                    <button id="single_auc_bid_btn"><i class="fa fa-gavel pr-2"></i>Bid Now</button>                    
                  </div>
                </div> --}}
              </div>
              {{-- bid description section ends here --}}
            </div>
          </div>
        </div>
        @else
        <div class="col-lg-8">
          <div class="container latest-auction-container">
            <div class="row">
              <div class="container latest_auc_title">
                <div class="row">
                  <div class="col-md-12">
                    <h6>There Is No Auction Avialable At The Moment</h6>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-5 singleauction-left">
                <div class="singleauctionswipper" id="latest_auction">
                  <img src="{{getimg('noimage.jpg')}}"  alt="no image" title="no image" />
                </div>
              </div>
              {{-- bid description section starts here --}}
              <div class="col-sm-12 col-md-7 singleauction-right">
                <div class="row">
                  <h6>Previous Auctions</h6>
                  <p class="auction_description">Please check our old auctions here</p>
                    <a id="single_auc_bid_btn" class="btn" href="{{route('auction-archives')}}"><i class="fa fa-gavel pr-2"></i>Archives</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </section>
@php
  use Carbon\Carbon;
  $todayDate=now()->toDateString();
  $currentTime=date('H:i:s');
  $previousauction = App\Models\Auction::where('status',0)->where('end_date','<=',$todayDate)->get();
@endphp
  {{-- previous auction starts here --}}
  <section id="prev-auction">
    <div class="container">
      <div class="row">
        <h6>Previous Auction</h6>
        <div class="swiper-container medal-slide">
          <div class="swiper-wrapper">
            @foreach($previousauction as $old_auction)
            <div class="col-md-4 medal-box swiper-slide">
              <a href="{{url('auction-lot/'.$old_auction->id.'/lots')}}" class="row">
                <div class="prev-auc-left">
                  <img src="{{getimg($old_auction->image)}}"  alt="{{$old_auction->title}}" title="{{$old_auction->title}}" class="" height="auto" width="100%">
                </div>
                <div class=" prev-auc-right">
                <p>Auction No: {{$old_auction->id}}</p>
                <span class="price">{{$old_auction->title}}</span>              
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
<script>
  window.addEventListener('load', () => {
  @if($auction && $today < \Carbon::createFromTimestamp(strtotime($auction->end_date.$auction->end_time)))
  function getTimeRemaining(endtime) {
    // const total = Date.parse(endtime) - Date.parse(new Date());
    // for ending the clock
    //const total = new Date(endtime).getTime()- new Date().getTime();
    // to start the auction
    const total = new Date(endtime).getTime()- new Date().getTime();
    const seconds = Math.floor((total / 1000) % 60);
    const minutes = Math.floor((total / 1000 / 60) % 60);
    const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
    const days = Math.floor(total / (1000 * 60 * 60 * 24));

    return {
      total,
      days,
      hours,
      minutes,
      seconds
    };
  }

  function initializeClock(id, endtime) {
    const clock = document.getElementById(id);
    const daysSpan = clock.querySelector('.days');
    const hoursSpan = clock.querySelector('.hours');
    const minutesSpan = clock.querySelector('.minutes');
    const secondsSpan = clock.querySelector('.seconds');

    function updateClock() {
      const t = getTimeRemaining(endtime);

      daysSpan.innerHTML = t.days;
      hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
      minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
      secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

      if (t.total <= 0) {
        // const timeinterval = setInterval(0, 1000);
        clearInterval(timeinterval);
        daysSpan.innerHTML = ('00');
        hoursSpan.innerHTML = ('00');
        minutesSpan.innerHTML = ('00');
        secondsSpan.innerHTML = ('00');
      }
    }

    
    const timeinterval = setInterval(updateClock, 1000);
    updateClock();
  }
    // const deadline = new Date(Date.parse(new Date()) + 14 * 24 * 60 * 60 * 1000);
     const deadline = '{{$timeto}}';
  // const deadline = '{{$timefrom}}';
    
   initializeClock('clockdiv', deadline);

@endif
  });
</script>


