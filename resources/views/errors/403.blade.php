@extends('frontend.layout.header')
@section('title', __('Forbidden'))
@section('content')
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
<section id="form-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
           <div class="" id="notfound">
              <div class="notfound">
                <div class="notfound-404">
                  <h1 style="background: url({{asset('error/bg.jpg')}}) no-repeat;background-position: center;
    background-size: cover; -webkit-background-clip: text;">Oops!</h1>
                </div>
                <h2>403- {{$exception->getMessage() ?: 'Forbidden'}}</h2>
                <p>Sorry Only For Admin</p>
                <a href="index">Go To Homepage</a>
              </div>
            </div>
      </div>
    </div>
  </div>
</section>
@endsection
