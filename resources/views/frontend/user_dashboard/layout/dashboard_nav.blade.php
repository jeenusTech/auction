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
        <div class="col-lg-3">
            <div class="text-left">
              <div class="bg-white shadow-sm rounded mb-3">
                <div class="p-3 border-bottom bold">
                  LOGIN<a class="ud_chang_pass_link" href="{{route('change-password')}}">change password</a>
                </div>
                <div class="p-3">
                  <ul class="list-unstyled">
                      <li class="mb-2 ml-2">
                        <i class="fa fa-user"></i>
                        {{auth()->user()->name}}
                      </li>
                      <li class="mb-2 ml-2">
                        <i class="fa fa-mobile"></i>
                        {{auth()->user()->mobile_1}}
                        @if(auth()->user()->mobile_verify == 0)
                        <a class="text-reset fs-14 verify_btn" href="javascript:void(0)">verify</a>
                        @else
                        <i class="fa fa-check-circle text-success"></i>
                        @endif
                      </li>
                      <li class="mb-2 ml-2">
                        <i class="fa fa-envelope"></i>
                        {{auth()->user()->email}}
                        @if(auth()->user()->email_verified_at == null)
                        <a class="text-reset fs-14 verify_btn" href="{{route('verification.notice')}}">verify</a>
                        @else
                        <i class="fa fa-check-circle text-success"></i>
                        @endif
                      </li>
                      <li class="mb-2 ml-2">
                        <i class="fa fa-gavel"></i>
                         Bid Limit: <b>{{auth()->user()->bid_plan_amount}}</b>
                      </li>
                  </ul>
                </div>
              </div>
              <div class="bg-white shadow-sm rounded mb-3">
                <div class="p-3 border-bottom bold">
                  USEFUL LINKS
                </div>
                <div class="p-3">
                  <ul class="list-unstyled">
                    <li class="mb-2 ml-2">
                      <a class="text-reset fs-14 nav-link {{ Request::is('profile*') ? 'active' : '' }}" href="{{route('profile.index')}}"><i class="fa fa-user pr-2"></i>  My Profile</a>
                    </li>
                    {{-- <li class="mb-2 ml-2">
                      <a class="text-reset fs-14 nav-link {{Request::is('wishlist*')?'active' :''}}" href="{{route('wishlist')}}"><i class="fa fa-heart pr-2"></i>  Wishlist</a>
                    </li> --}}
                    <li class="mb-2 ml-2">
                      <a class="text-reset fs-14 nav-link {{Request::is('auctionbids*')?'active' :''}}" href="{{route('auctionbids')}}"><i class="fa fa-gavel pr-2"></i>  Auction Bids</a>
                    </li>
                    <li class="mb-2 ml-2">
                      <a class="text-reset fs-14 nav-link {{Request::is('bid-history*')?'active' :''}}" href="{{route('bid-history')}}"><i class="fa fa-history pr-2"></i>  Bid History</a>
                    </li>
                    <li class="mb-2 ml-2">
                      <a class="text-reset fs-14 nav-link {{Request::is('bid-limit*')?'active' :''}}" href="{{route('bid-limit')}}"><i class="fa fa-ban pr-2"></i>  Bid Limit</a>
                    </li>
                    <li class="mb-2 ml-2">
                      <a class="text-reset fs-14 nav-link {{Request::is('invoice*')?'active' :''}}" href="{{route('invoice')}}"><i class="fas fa-file-invoice f pr-2"></i>Invoices</a>
                    </li>
                    <li class="mb-2 ml-2">
                      <a class="text-reset fs-14 nav-link {{Request::is('manage-address*')?'active' :''}}" href="{{route('manage-address')}}"><i class="fa fa-address-card f pr-2"></i>Manage Address</a>
                    </li>
                    <li class="mb-2 ml-2">
                      <a class="text-reset fs-14 nav-link {{Request::is('change-password*')?'active' :''}}" href="{{route('change-password')}}"><i class="fa fa-wrench pr-2"></i>Change Password</a>
                    </li>
                    <li class="mb-2 ml-2">
                      <a class="text-reset fs-14 nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt pr-2"></i>Log Out</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                    </li>
                  </ul>
                </div>
              </div>     
            </div>
        </div>
        <div class="col-lg-9">
           @yield('user_content')
        </div>
    </div>
  </div>
</section>


@endsection