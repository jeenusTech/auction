@extends('frontend.user_dashboard.layout.dashboard_nav')
@section('user_content')
	<div class="row">
		<div class="col-md-6 mb-3">
			<div class="bg-white shadow-sm rounded ab_section">
		        <div class="p-2 ab_border">
		        	<label for="address"><b>Bids On Lots:</b></label>
		        	<a class="text-reset fs-14 ab_count" href="javascript:void(0)">0</a>
		        </div>
		        <div class="p-2 ab_border">
		        	<label for="address"><b>Winning Bids:</b></label>
		        	<a class="text-reset fs-14 ab_count" href="javascript:void(0)">0</a>
		        </div>
		        <div class="p-2 ab_border">
		        	<label for="address"><b>Out Bids:</b></label>
		        	<a class="text-reset fs-14 ab_count" href="javascript:void(0)">0</a>
		        </div>
		        <div class="p-2 ab_border">
		        	<select name="ab_bids" id="ab_bids_dropdown">
		                <option value="">Auction no-89-Mumbai</option>
		                <option value="">Auction no-89-Mumbai</option>
		                <option value="">Auction no-89-Mumbai</option>
		                <option value="">Auction no-89-Mumbai</option>
		        	</select>
		        	<a class="text-reset fs-14 ab_count_lot text-success" href="javascript:void(0)">Lots:254</a>
		        </div>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<div class="bg-white shadow-sm rounded ab_section">
		        <div class="p-2 ab_border">
		        	<label for="address"><b>Secret Bid Value:</b></label>
		        	<a class="text-reset fs-14 ab_count" href="javascript:void(0)">₹ 0</a>
		        </div>
		        <div class="p-2 ab_border">
		        	<label for="address"><b>Winning Value:</b></label>
		        	<a class="text-reset fs-14 ab_count" href="javascript:void(0)">₹ 0</a>
		        </div>
		        <div class="p-2 ab_border">
		        	<label for="address"><b>Out Bid Value:</b></label>
		        	<a class="text-reset fs-14 ab_count" href="javascript:void(0)">₹ 0</a>
		        </div>
		        <div class="p-2 ab_border">
		        	<label for="address"><b>Diff. of Out Bid Value :</b></label>
		        	<a class="text-reset fs-14 ab_count" href="javascript:void(0)">₹ 0</a>
		        </div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 mb-3 ab_tabs">
			<div class="bg-white shadow-sm rounded ab_section">
		      <!-- Tabs with Background on Card -->
		      <div class="card">
		        <div class="card-header">
		          <ul class="nav nav-tabs nav-tabs-neutral" role="tablist">
		            <li class="nav-item">
		              <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">All Bids</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">Winning Bids</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" data-toggle="tab" href="#messages1" role="tab">Out Bids</a>
		            </li>
		          </ul>
		        </div>
		        <div class="card-body">
		          <!-- Tab panes -->
		          <div class="tab-content text-center">
		            <div class="tab-pane active" id="home1" role="tabpanel">
		              <p>All Bids.</p>
		            </div>
		            <div class="tab-pane" id="profile1" role="tabpanel">
		              <p>Winning Bids</p>
		            </div>
		            <div class="tab-pane" id="messages1" role="tabpanel">
		              <p>Out Bids</p>
		            </div>
		          </div>
		        </div>
		      </div>
		      <!-- End Tabs on plain Card -->
    
			</div>
		</div>
	</div>
@endsection