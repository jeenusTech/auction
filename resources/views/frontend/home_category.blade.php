<section class="home-coin-cat">
    <div class="container">
      <div class="row aos-init aos-animate"  data-aos="fade-up" data-aos-delay="100">

        @if(homepage_latest_auctions('desc') != null && homepage_latest_auctions('desc')->count()>0)
          <div class="col-md-12 cat_1">
            <h6>Latest Auction <small>(Recommended)</small></h6>
            <div class="swiper-container recomended-cat border-right" style="border-right: unset !important;">
              <div class="swiper-wrapper" style="height: auto;">
                @foreach(homepage_latest_auctions('asc') as $latest_lots)
                  <a href="{{route('auction-bid',$latest_lots->id)}}" class="swiper-slide" title="{{site_info() !=null?site_info()->title:config('app.name')}} latest lot {{$latest_lots->lot_number}}">
                    <figure class="figure">
                      <img src="{{getimg(glob(ltrim($latest_lots->image,'/').'/*.jpg')[0])}}" alt="latest-lot-{{$latest_lots->lot_number}}" title="latest-lot-{{$latest_lots->lot_number}}"  class="figure-img img-fluid rounded" width="175px">
                      <figcaption class="figure-caption">
                        <p">
                          {{Str::substr($latest_lots->description, 0,51);}}...
                        </p>
                      </figcaption>
                      <span class="price">Rs.{{number_format($latest_lots->asking_bid)}}</span>
                    </figure>
                  </a>
                @endforeach
              </div>
              <div class="cat-foot">
                <div class="swiper-button-prev-unique"><i class="bi bi-arrow-left-circle"></i></div>
                <div class="swiper-button-next-unique"><i class="bi bi-arrow-right-circle"></i></div>
                <a href="{{route('latest-auction')}}">View all</a>
              </div>
            </div>
          </div>
          {{-- <div class="col-md-6 cat_2">
            <h6>&nbsp;<small></small></h6>
            <div class="swiper-container recomended-cat">
              <div class="swiper-wrapper">
                @foreach(homepage_latest_auctions('desc') as $latest_lots)
                  <a href="{{route('auction-bid',$latest_lots->id)}}" class="swiper-slide">
                    <figure class="figure">
                      <img src="{{getimg(glob(ltrim($latest_lots->image,'/').'/*.jpg')[0])}}" class="figure-img img-fluid rounded" alt="latest auction" width="175px">
                      <figcaption class="figure-caption">
                        <p">
                          {{Str::substr($latest_lots->description, 0,51);}}...
                        </p>
                      </figcaption>
                      <span class="price">Rs.{{number_format($latest_lots->asking_bid)}}</span>
                    </figure>
                  </a>
                @endforeach
              </div>
              <div class="cat-foot">
                <div class="swiper-button-prev-unique"><i class="bi bi-arrow-left-circle"></i></div>
                <div class="swiper-button-next-unique"><i class="bi bi-arrow-right-circle"></i></div>
                <a href="{{route('latest-auction')}}">View all</a>
              </div>
            </div>
          </div> --}}
          @endif
          @if(home_upcoming_auction() != null && home_upcoming_auction()->count() > 0)
          <div class="col-md-12 cat_1">
            <h6>Upcoming Auctions <small>(Recommended)</small></h6>
            <div class="swiper-container recomended-cat border-right" style="border-right: unset !important;">
              <div class="swiper-wrapper" style="height: auto;">
                @foreach(home_upcoming_auction() as $auction)
                  <a href="{{url('auction-lot/'.$auction->id.'/lots')}}" class="swiper-slide" title="{{site_info() !=null?site_info()->title:config('app.name')}} upcoming auction {{$auction->title}}">
                    <figure class="figure" style="padding: 20px;">
                      <img src="{{getimg($auction->image)}}" class="figure-img img-fluid rounded" alt="{{$auction->title}}" title="{{$auction->title}}" width="175px">
                      <figcaption class="figure-caption">
                        <p"><b>Auction no.</b> {{$auction->auction_number}}<br><b>Title:</b> {{$auction->title}}<br><b>Date:</b> {{$auction->start_date}} To {{$auction->end_date}}
                        </p>
                      </figcaption>
                      <span class="price">No. of lots {{$auction->lot->count()}}</span>
                    </figure>
                  </a>
                @endforeach
              </div>
              <div class="cat-foot">
                <div class="swiper-button-prev-unique"><i class="bi bi-arrow-left-circle"></i></div>
                <div class="swiper-button-next-unique"><i class="bi bi-arrow-right-circle"></i></div>
                <a href="{{route('upcoming-auction')}}">View all</a>
              </div>
            </div>
          </div>
          @endif
      </div>
    </div>
  </section>