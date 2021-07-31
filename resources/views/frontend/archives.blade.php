@extends('frontend.layout.header')
@section('content')
<section class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/Mask_Group_1@2x.png')}}");' alt="auction archive" title="auction archive">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            <h1>Archives</h1>
            <p>The previous auctions are displayed here for your conveniance.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- End Hero -->
  <!-- ======= Hero Section ======= -->
  <section id="form-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4>Auction Archives</h4>
          <div class="container reg-container">
            <div class="row">
            @foreach($auctions as $auction)
              <div class="col-md-4">
                <div class="container latest-auction-container">
                  <div class="row">
                    <div class="container latest_auc_title">
                      <div class="row">
                        <div class="col-md-12">
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
                      </div>
                    </div>

                    <div class="col-sm-12 col-md-5 singleauction-left">
                      <div class="singleauctionswipper" id="latest_auction">
                        <img src="{{getimg($auction->image)}}" alt="{{$auction->title}}" title="{{$auction->title}}" />
                      </div>
                    </div>
                    {{-- bid description section starts here --}}
                    <div class="col-sm-12 col-md-7 singleauction-right">
                      <div class="row">
                        @php
                        $description=Str::substr($auction->description,0,1000);
                        @endphp
                        {{$auction->title}}
                      </div>
                      <div class="row">
                        <div class="col-md-12 p-2 auction-detail">
                          <ul>
                            <li><a href="{{url('auction-lot/'.$auction->id.'/lots')}}"><i class="fas fa-th-large"></i>View Lots</a></li>
                            <li><a href="{{url($auction->catelogue)}}" target="blank" download><i class="fas fa-file-pdf"></i>Catelogue</a></li>
                            <li><a href="{{route('realization',$auction->id)}}"><i class="fas fa-eye"></i>View Realization</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    {{-- bid description section ends here --}}
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->
@endsection
