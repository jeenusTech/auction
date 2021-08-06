@extends('frontend.layout.header')
@section('content')
   <!-- ======= Home slider Section ======= -->
   <div class="swiper-container home-banner">
      <div class="swiper-wrapper">
        @foreach(homebanner() as $banner)
        <section id="hero" class="swiper-slide" style='background-image: url("{{getimg($banner->image_big)}}");' alt="{{$banner->image_alt}}" title="{{$banner->image_title}}">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <!-- Content Block -->
                <div class="block">
                  <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                    <p>{{$banner->description}}</p>
                    <a href="{{$banner->button_link}}" class="btn btn-danger slider-btn">{{$banner->button_text}}</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      @endforeach
      </div>
      <div class="swiper-pagination"></div>
    </div>
  <!-- End Home Slider -->
  <!-- Home All Category Section -->
   @include('frontend.category_banner')
  <!-- Home All Category Section End -->
  <!-- Home Coin Categories -->
  @include('frontend.home_category')
  <!-- End Coin Categories -->
  <!-- home page medal section -->
 {{--  @include('frontend.home_medal') --}}
  <!-- End medal section -->
  <!-- Home Coinfinder Section -->
  {{-- @include('frontend.home_coin_finder') --}}
  <!-- Home Coinfinder Section End -->
  <!-- home blog section -->
  {{-- @include('frontend.home_blog') --}}
  <!-- End home blog section -->
  <!-- Home our heritage section -->
  @include('frontend.home_heritage')
  <!-- End our heritage section -->
  <!-- home meet the experts section -->
  @include('frontend.home_expert')
  <!-- meet the experts section end -->
  <!-- home footer top section -->
  @include('frontend.footer_top')
  <!-- End home blog section -->
@endsection


