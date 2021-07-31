@extends('frontend.user_dashboard.layout.dashboard_nav')
@section('user_content')
<div class="container" id="bid-history">
	<div class="row">
		<div class="col-md-12 mb-3 p-0">
			<div class="bg-white shadow-sm rounded">
		        <div class="p-3 border-bottom bold">
              <div class="row">
                <div class="col-sm-4 col-md-4 p12">Auction Bid History</div>
                <div class="col-sm-4 col-md-4 p12">
                  <select name="slots ml-5" id="slot-history-dropdown">
                    <option value="">Select Auction</option>
                  	@foreach($bids as $bid)
                    <option value="{{$bid->auction->id}}">Auction no-{{$bid->auction->auction_number}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-4 col-md-4 p12"><span class="bid-used">Total ₹ {{auth()->user()->bid_used}}/{{auth()->user()->bid_plan_amount}}- Bid Limit Used !!</span></div>
              </div>
              

		        </div>
		        <div class="p-3">
		        	
		        </div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 mb-3 ab_tabs p-0">
			<div class="bg-white shadow-sm rounded ab_section">
		      <!-- Tabs with Background on Card -->
		      <div class="card">
		        <div class="card-header">
		          <ul class="nav nav-tabs nav-tabs-neutral" role="tablist">
		            {{-- <li class="nav-item">
		              <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">All Bids</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">Winning Bids</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" data-toggle="tab" href="#messages1" role="tab">Out Bids</a>
		            </li> --}}
		          </ul>
		        </div>
		        <div class="card-body">
		          <!-- Tab panes -->
		          <div class="tab-content text-center">
		            <div class="tab-pane active" id="home1" role="tabpanel">
		              <p>All Bids.</p>
		              <table class="table table-hover text-nowrap">
		              	<thead style="background: rgba(223,52,56,1);color: #ffffff;">
		              		<tr>
		              			<th>lot.no</th>
		              			<th>Bid Amount</th>
		              			<th>Bid Date</th>
		              		</tr>
		              	</thead>
		              	<tbody id="databody">
		              	</tbody>
		              </table>
		            </div>
		          </div>
		        </div>
		      </div>
		      <!-- End Tabs on plain Card -->
    
			</div>
		</div>
	</div>
</div>
@endsection
<script>
  window.addEventListener('load', () => {
    $.ajaxSetup({
	    beforeSend: function(xhr, type) {
	      if (!type.crossDomain) {
	         xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
	      }
	    },
		});
		 $('#slot-history-dropdown').on('change', function () {
		    var id = this.value;
		    if (id == '') {
		    	return false;
		    }
		    $("#databody").html('');
		    $.ajaxSetup({
		      beforeSend: function(xhr, type) {
		          if (!type.crossDomain) {
		              xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
		          }
		      },
		  });
		    $.ajax({
		        url: "api/user-auction-history",
		        type: "POST",
		        data: {
		            id: id,
		            _token: '{!! csrf_token() !!}'
		        },
		        dataType: 'json',
		        success: function (result) {
		        	console.log(result);
		        	$("#databody").html('<tr id="data"></tr');
		        	$.each(result, function (key, value) {
		        		
		                $("#databody").append('<tr><td>' + value['lot_number'] + '</td><td>'+value['amount']+'</td><td>'+value['date']+'</td></tr>');
		            });
		        }
		    });
		});    
  });
   

</script>