@extends('frontend.layout.header')
@section('content')
{{-- <section id='user_dashboard' class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/registration.png')}}");'> --}}
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
<section id="" class="user_dashboard">
  <div class="container">
    <div class="row">
        <!-- ======= Filter category Section ======= -->
      <div class="col-lg-6 ml-auto mr-auto mb-5">
            
				<div class="bg-white shadow-sm rounded">
	        <div class="p-3 border-bottom bold">
	          Email Verification
	        </div>
	        <div class="p-3">
	        	<p>Please verify your email address by clicking the button below. Thanks!</p>

						<form action="{{ route('verification.request') }}" method="post">
							@csrf
							<div class="form-group row">
		            <div class="ml-auto mr-auto col-md-6">
		              <button type="submit" class="btn btn-danger request-btn">Verify Your Email</button>
		            </div>
		          </div>
						    
						</form>
	        </div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection