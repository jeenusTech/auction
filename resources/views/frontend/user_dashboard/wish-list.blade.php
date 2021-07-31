@extends('frontend.user_dashboard.layout.dashboard_nav')
@section('user_content')
<div class="container">
	<div class="row">
		<div class="col-md-12 mb-3 p-0">
			<div class="bg-white shadow-sm rounded">
		        <div class="p-3 border-bottom bold">
		          My Wishlist
              <select name="slots ml-5" id="slot-dropdown">
                <option value="">Auction no-89-Mumbai</option>
                <option value="">Auction no-89-Mumbai</option>
                <option value="">Auction no-89-Mumbai</option>
                <option value="">Auction no-89-Mumbai</option>
              </select>

		        </div>
		        <div class="p-3">
		        	@php
            $testString = 'Punch marked attributed to shakya janapada, silver coin for testing purpose';
            
            @endphp
          <div class="row">
            @for($i=0;$i<=3;$i++)
            <div class="div_width_30">
              <div class="shop_auc">
                
                  <img src="{{asset('/frontend/auction/auction.png')}}" alt="" width="100%">
                  <div class="row">
                    <div class="width_30"><span>Auc:</span>&nbsp;89</div>
                    <div class="width_30"><span>Lot:</span>&nbsp;89</div>
                    <div class="width_30"><span>Cat:</span>&nbsp;Silver</div>
                  </div>
                  <div class="row">
                    <div class="width_100"><span>Anicient:</span>&nbsp;Punch marked</div>
                  </div>
                  <div class="row">
                    <div class="width_100"><span>Estimate:</span>&nbsp;Rs 8000 to Rs 9000</div>
                  </div>
                  <div class="row">
                    <div class="width_100">{{Str::substr($testString, 0,51);}}...</div>
                  </div>
                  <div class="row shop_auc_ask">
                    <div class="width_100">Current Bid: Rs 8000</div>
                    <div class="width_100">Asking Bid: Rs 9000</div>
                  </div>

                  <div class="row shop_auc_btn">
                    <div class="col-md-12 pt-3">
                      <a id="single_auc_bid_btn" class="btn" href="auction/1"><i class="fa fa-gavel pr-2"></i>View and Bid</a>
                    </div>
                  </div>
                
              </div>
            </div>
            @endfor
          </div>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection