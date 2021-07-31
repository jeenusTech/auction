@extends('frontend.layout.header')
@section('content')
<section class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/registration.png')}}");' alt="about bhargavaauction" title="about bhargavaauction">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            <h1>About us</h1>
            <p>British coins have always been popular amongst numismatists, not least because of their historical context, but also as a result of some of the finest coins ever being minted within this broad period.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section_1">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            <h1>Our Lifetime Guarantee of Authenticity</h1>
            <p>British coins have always been popular amongst numismatists, not least because of their historical context,
			but also as a result of some of the finestcoins ever being minted within this broad period.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- represents at auction --}}
<section class="section_2">
    <div class="row">
      <div class="col left">
      	<div class="content">
      		<h1>Represents at Auction</h1>
    		<p>Our experience has shown us that the very best collections in the world are achieved through a trusted relationship between collector and advisor. Whatever aspect of the numismatic world interests you, we have skilled numismatists who are always pleased to help.</p>
    		<a href="javscript:void(0)" class="enquire">Enquire</a>
      	</div>
      </div>
      <div class="col img" alt="auction-representation" title="auction representation" style='background-image: url("{{asset('/frontend/section/hammer.png')}}");'>
       {{--  <img src="{{asset('/frontend/hero/registration.png')}}" alt="" width="100%" height="100%"> --}}
      </div>
    </div>
</section>
  <!-- End Hero -->
  @include('frontend.footer_top')
  <section class="section_3">
  	<div class="container" data-aos="fade-up">
  		<div class="row">
	      <div class="col left">
	      	<div class="content" data-aos="fade-up" data-aos-delay="100">
	      		<h1>Represents at Auction</h1>
	    		<p>Our experience has shown us that the very best collections in the world are achieved through a trusted relationship between collector and advisor. Whatever aspect of the numismatic world interests you, we have skilled numismatists who are always pleased to help.</p>
	      	</div>
	      </div>
	      <div class="col img">
	        <img src="{{asset('/frontend/coins/coin.png')}}" alt="auction-representation" title="auction representation" width="150px" height="150px"  data-aos="fade-up" data-aos-delay="100">
	      </div>
	    </div>
	    <div class="row row_2">
	      <div class="col img">
	       	 <img src="{{asset('/frontend/medal/medal.png')}}" alt="auction-weaponary" title="auction weaponary" width="150px" height="150px"  data-aos="fade-up" data-aos-delay="100">
	      </div>
	      <div class="col left">
	      	<div class="content"  data-aos="fade-up" data-aos-delay="100">
	      		<h1>Weaponary</h1>
	    		<p>Our experience has shown us that the very best collections in the world are achieved through a trusted relationship between collector and advisor. Whatever aspect of the numismatic world interests you, we have skilled numismatists who are always pleased to help.</p>
	      	</div>
	      </div>
	    </div>
  		<div class="row row_3">
	      <div class="col left">
	      	<div class="content"  data-aos="fade-up" data-aos-delay="100">
	      		<h1>Represents at Auction</h1>
	    		<p>Our experience has shown us that the very best collections in the world are achieved through a trusted relationship between collector and advisor. Whatever aspect of the numismatic world interests you, we have skilled numismatists who are always pleased to help.</p>
	      	</div>
	      </div>
	      <div class="col img">
	       	<img src="{{asset('/frontend/coins/coin3.png')}}" alt="auction-representation" title="auction representation" width="150px" height="150px"  data-aos="fade-up" data-aos-delay="100">
	      </div>
	    </div>
  	</div>
    
</section>
  @endsection