@extends('frontend.layout.header')
@section('content')
<section class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/service/banner.png')}}");'>
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            <h1>Meet the Experts</h1>
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
            <p>British coins have always been popular amongst numismatists, not least because of their historical context, but also as a result of some of the finestcoins ever being minted within this broad period.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- represents at auction --}}
<section class="section_2">
    <div class="row" data-aos="fade-up">
      <div class="col left">
      	<div class="content" data-aos="fade-up" data-aos-delay="100">
      		<h1>Represents at Auction</h1>
    			<p>Our experience has shown us that the very best collections in the world are achieved through a trusted relationship between collector and advisor. Whatever aspect of the numismatic world interests you, we have skilled numismatists who are always pleased to help.</p>
    			<a href="javscript:void(0)" class="enquire">Enquire</a>
      	</div>
      </div>
      <div class="col img" style='background-image: url("{{asset('/frontend/service/1.png')}}");'>
      </div>
    </div>
    <div class="row service_2" data-aos="fade-up">
      <div class="col img" style='background-image: url("{{asset('/frontend/service/2.png')}}");'>
      </div>
      <div class="col left">
      	<div class="content" data-aos="fade-up" data-aos-delay="100">
      		<h1>Bespoke Expert Advice</h1>
    			<p>Our experience has shown us that the very best collections in the world are achieved through a trusted relationship between collector and advisor. Whatever aspect of the numismatic world interests you, we have skilled numismatists who are always pleased to help.</p>
    			<a href="javscript:void(0)" class="enquire">Enquire</a>
      	</div>
      </div>
    </div>
    <div class="row service_3" data-aos="fade-up">
      <div class="col left">
      	<div class="content" data-aos="fade-up" data-aos-delay="100">
      		<h1>Valuation and Resale</h1>
    			<p>Our experience has shown us that the very best collections in the world are achieved through a trusted relationship between collector and advisor. Whatever aspect of the numismatic world interests you, we have skilled numismatists who are always pleased to help.</p>
    			<a href="javscript:void(0)" class="enquire">Enquire</a>
      	</div>
      </div>
      <div class="col img" style='background-image: url("{{asset('/frontend/service/3.png')}}");'>
      </div>
    </div>
</section>
<section class="wrap-banner service_section" style='background-image: url("{{asset('/frontend/service/4.png')}}");'>
 <div class="container">
   <div class="row" data-aos="fade-up">
    <div class="col-lg-12">
      <!-- Content Block -->
      <div class="block" data-aos="fade-up" data-aos-delay="100">
         <h2>A Guide How to Submit Your Valuation</h2>
         <p>Our specialists will guide you through the process, and you can meet us for valuations at our store at 399 Strand in London, or at any of the numerous fairs and exhibitions we attend around the world every year.</p>
         <a href="javascript:void(0)">Read Guide >></a>
      </div>
    </div>
   </div>
  </div>
</section>

<section class="section_2">
    <div class="row service_4">
      <div class="col img" style='background-image: url("{{asset('/frontend/service/5.png')}}");'>
       {{--  <img src="{{asset('/frontend/hero/registration.png')}}" alt="" width="100%" height="100%"> --}}
      </div>
      <div class="col left">
      	<div class="content" data-aos="fade-up" data-aos-delay="100">
      		<h1>Storage</h1>
    		<p>Our experience has shown us that the very best collections in the world are achieved through a trusted relationship between collector and advisor. Whatever aspect of the numismatic world interests you, we have skilled numismatists who are always pleased to help.</p>
    		<a href="javscript:void(0)" class="enquire">Enquire</a>
      	</div>
      </div>
    </div>
</section>
<section class="storage">
	<div class="container">
		<div class="row">
			<div class="col-md-6 storage_left">
				<h1>Storage Details</h1>
				<ul>
					<li>Baldwin’s also offers a range of delivery and collection services for its storage customers:</li>
					<li>Baldwin’s also offers a range of delivery and collection services for its storage customers:</li>
					<li>Baldwin’s also offers a range of delivery and collection services for its storage customers:</li>
					<li>Baldwin’s also offers a range of delivery and collection services for its storage customers:</li>
				</ul>
			</div>
			<div class="col-md-6 storage_right">
				<h1>Secure Storage</h1>
				<ul>
					<li>Baldwin’s also offers a range of delivery and collection services for its storage customers:</li>
					<li>Baldwin’s also offers a range of delivery and collection services for its storage customers:</li>
					<li>Baldwin’s also offers a range of delivery and collection services for its storage customers:</li>
					<li>Baldwin’s also offers a range of delivery and collection services for its storage customers:</li>
					<li>Baldwin’s also offers a range of delivery and collection services for its storage customers:</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="section_2">
  <div class="row service_3">
    <div class="col left">
    	<div class="content" data-aos="fade-up" data-aos-delay="100">
    		<h1>Delivery and Collection</h1>
  			<p>Our experience has shown us that the very best collections in the world are achieved through a trusted relationship between collector and advisor. Whatever aspect of the numismatic world interests you, we have skilled numismatists who are always pleased to help.</p>
  			<a href="javscript:void(0)" class="enquire">Enquire</a>
    	</div>
    </div>
    <div class="col img" style='background-image: url("{{asset('/frontend/service/6.png')}}");'>
    </div>
  </div>
</section>
  @include('frontend.footer_top')
  @endsection