@extends('frontend.user_dashboard.layout.dashboard_nav')
@section('user_content')
<div class="container">
	<div class="row" id="bid-request-section">
		<div class="col-md-12 mb-3 p-0">
			<div class="bg-white shadow-sm rounded">
		        <div class="p-3 border-bottom bold">
		          Bid Limit
		        </div>
		        <div class="row p-3">
              <div class="col-md-8 ml-auto mr-auto">
                @if(auth()->user()->bid_plan_amount ==='unlimited')
                <div class="row">
                  <div class="form-group">
                    <p class="text-danger bold">
                      Unable to place Request to Increase Bid as your Account already has <span class="text-success bold text-uppercase">{{auth()->user()->bid_plan_amount}}</span> Bid Limit !!
                    </p>
                  </div>
                </div>
                @elseif(auth()->user()->bid_limit_request == '1')
                <div class="row">
                  <div class="form-group">
                    <p class="text-danger bold">
                      Wait until your bid request of <span class="text-success bold text-uppercase">{{auth()->user()->bid_limit_request_amount}}</span> Bids get approved!!
                    </p>
                  </div>
                </div>
                @else
              <form action="{{route('bid_request',auth()->user()->id)}}" method="POST" name="bid_request_form">
                @csrf
                @method('POST')
                <div class="row">
                  <div class="form-group">
                    <label for="bid_request">Bid Limit * :</label>
                      <input type="text" name="request_limit" class="col-md-8" id="bid_request" value="{{old('request_limit')}}" required>
                      <span class="form-text text-danger">{!!$errors->first('request_limit')!!}</span>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <input type="submit" class="request-btn" name="request_bid" value="Request bid Limit">
                  </div>
                </div>
              </form>
                @endif
              </div>
		        </div>
			</div>
		</div>
	</div>
</div>
@endsection