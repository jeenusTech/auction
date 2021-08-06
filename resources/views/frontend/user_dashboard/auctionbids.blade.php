@extends('frontend.user_dashboard.layout.dashboard_nav')
@section('user_content')
	<div class="row">
		<div class="col-md-6 mb-3">
			<div class="bg-white shadow-sm rounded ab_section">
		        <div class="p-2 ab_border">
		        	<label for="address"><b>Bids On Lots:</b></label>
		        	<a class="text-reset fs-14 ab_count" href="javascript:void(0)" id="bidsOnLot">0</a>
		        </div>
		        <div class="p-2 ab_border">
		        	<label for="address"><b>Winning Bids:</b></label>
		        	<a class="text-reset fs-14 ab_count" href="javascript:void(0)" id="WinBids">0</a>
		        </div>
		        <div class="p-2 ab_border">
		        	<label for="address"><b>Out Bids:</b></label>
		        	<a class="text-reset fs-14 ab_count" href="javascript:void(0)" id="outBids">0</a>
		        </div>
		        <div class="p-2 ab_border">
		        	<select name="ab_bids" id="ab_bids_dropdown">
		                <option value="">Select Auction</option>
	                  	@foreach($bids as $bid)
	                    <option value="{{$bid->auction->id}}">Auction no-{{$bid->auction->auction_number}}</option>
	                    @endforeach
		        	</select>
		        	{{-- <a class="text-reset fs-14 ab_count_lot text-success" href="javascript:void(0)">Lots:254</a> --}}
		        </div>
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<div class="bg-white shadow-sm rounded ab_section">
		        {{-- <div class="p-2 ab_border">
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
		        </div> --}}
		        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                        <div style="position:absolute;width:100%;height:100%;left:0; top:0"></div>
                    </div>
                </div> <canvas id="chart-line" width="199" height="100" class="chartjs-render-monitor" style="display: block; width: 199px; height: 100px;"></canvas>
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
		              <a class="nav-link" data-toggle="tab" href="#messages2" role="tab">Out Bids</a>
		            </li>
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
		            <div class="tab-pane" id="profile1" role="tabpanel">
		              <p>Winning Bids</p>
		              <table class="table table-hover text-nowrap">
		              	<thead style="background: rgba(223,52,56,1);color: #ffffff;">
		              		<tr>
		              			<th>lot.no</th>
		              			<th>Bid Amount</th>
		              			<th>Bid Date</th>
		              		</tr>
		              	</thead>
		              	<tbody id="windt">
		              	</tbody>
		              </table>
		            </div>
		            <div class="tab-pane" id="messages2" role="tabpanel">
		              <p>Out Bids</p>
		              <table class="table table-hover text-nowrap">
		              	<thead style="background: rgba(223,52,56,1);color: #ffffff;">
		              		<tr>
		              			<th>lot.no</th>
		              			<th>Bid Amount</th>
		              			<th>Bid Date</th>
		              		</tr>
		              	</thead>
		              	<tbody id="outdt">
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
@endsection
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
  window.addEventListener('load', () => {
  	var ctx = $("#chart-line");
        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Bids", "Win", "Out"],
                datasets: [{
                    data: [0, 0, 0],
                    backgroundColor: ["rgba(223,52,56,1)", "rgba(40, 167, 69, 1)", "rgba(255, 193, 7, 1)"]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Bid Insigt'
                }
            }
        });
    $.ajaxSetup({
	    beforeSend: function(xhr, type) {
	      if (!type.crossDomain) {
	         xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
	      }
	    },
		});
		 $('#ab_bids_dropdown').on('change', function () {
		    var id = this.value;
		    if (id == '') {
		    	return false;
		    }
		    $("#databody").html('');
		    $("#windt").html('');
		    $("#outdt").html('');
		    $("#bidsOnLot").html('');
		    $("#WinBids").html('');
		    $("#outBids").html('');
		    $.ajaxSetup({
		      beforeSend: function(xhr, type) {
		          if (!type.crossDomain) {
		              xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
		          }
		      },
		  });
		    $.ajax({
		        url: "api/user-auctionbids",
		        type: "POST",
		        data: {
		            id: id,
		            _token: '{!! csrf_token() !!}'
		        },
		        dataType: 'json',
		        success: function (result) {
		        	// console.log(result);
		        	$("#databody").html('<tr id="data1"></tr');
		        	$("#windt").html('<tr id="data2"></tr');
		        	$("#outdt").html('<tr id="data3"></tr');
		        	$("#bidsOnLot").html(result.bidsOnLot);
		        	$("#WinBids").html(result.WinBids);
		        	$("#outBids").html(result.outBids);
		        	$.each(result.lots, function (key, value) {
		        		
		                $("#databody").append('<tr><td>' + value['lot_number'] + '</td><td>'+value['bid_amount']+'</td><td>'+value['bid_date']+'</td></tr>');
		            });
		            $.each(result.winlot, function (key, value) {
		        		
		                $("#windt").append('<tr class="bg-success text-white"><td>' + value['lot_number'] + '</td><td>'+value['bid_amount']+'</td><td>'+value['bid_date']+'</td></tr>');
		            });
		            $.each(result.outlot, function (key, value) {
		        		
		                $("#outdt").append('<tr class="bg-warning text-white"><td>' + value['lot_number'] + '</td><td>'+value['bid_amount']+'</td><td>'+value['bid_date']+'</td></tr>');
		            });
		            var myLineChart = new Chart(ctx, {
			            type: 'pie',
			            data: {
			                labels: ["Bids", "Win", "Out"],
			                datasets: [{
			                    data: [result.bidsOnLot, result.WinBids, result.outBids],
			                    backgroundColor: ["rgba(223,52,56,1)", "rgba(40, 167, 69, 1)", "rgba(255, 193, 7, 1)"]
			                }]
			            },
			            options: {
			                title: {
			                    display: true,
			                    text: 'Bid Insigt'
			                }
			            }
			        });
		        }
		    });
		});    
  });
   

</script>