@extends('frontend.layout.header')
@section('content')
{{-- <section class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/Mask_Group_1@2x.png')}}");' alt="upcoming auctions" title="upcoming auction">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            <h1>Upcoming Auctions</h1>

            <p>The upcoming auctions are displayed here for your conveniance.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
<section id='user_dashboard' class="banner bg-banner-one overlay">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- End Hero -->
  <!-- ======= Hero Section ======= -->
  <section id="">
    {{-- <div class="container">
      <div class="row">
        <div class="col-md-12 "> --}}
          
                <div class="container latest-auction-container">
                  <div class="row">
                    <div class="container latest_auc_title">
                      <div class="row">
                        <div class="col-md-12 text-center">
                          <h4 class="text-white">Upcoming Auctions</h4>
                          {{-- <label class="auc_title_label">Sunday 9th May 2021 10:30 Am Onwards</label> --}}
                          
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-12 col-md-12 text-center">
                      <div class="singleauctionswipper" id="latest_auction">
                        
                        @foreach(home_upcoming_auction() as $auction)
                        @php
                          // for start date and time
                            $stimestamp = strtotime($auction->start_date);
                            $sday = date('D', $stimestamp);
                            $sdate = date('d', $stimestamp);
                            $smonth = date('F', $stimestamp);
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
                          {{-- <h2 class="auc_title_label text-center text-danger"><b>{{$auction->auction_type=='1'?'E-Auction':'Floor Auction '.$sday.' '.$sdate.'th '. $smonth.' '. $syear .'  '.$auction->start_time}} Onwards</b></h2> --}}
                          <h2 class="auc_title_label text-center text-danger"><b>{{($auction->auction_type=='1'?'E-Auction ':'Floor Auction ').$auction->auction_number.' - '.$sday.' '.$sdate.'th '. $smonth.' '. $syear}}</b></h2>
                        @endforeach
                      </div>
                    </div>
                    {{-- bid description section ends here --}}
                  </div>
                </div>
              
        {{-- </div>
      </div>
    </div> --}}
  </section>
  <!-- End Hero -->
@endsection
