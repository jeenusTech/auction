@extends('frontend.user_dashboard.layout.dashboard_nav')
@section('user_content')
<div class="container">
	{{-- <div class="row">
		<div class="col-md-12 mb-3 p-0">
			<div class="bg-white shadow-sm rounded">
		        <div class="p-3 border-bottom bold">
		          Invoices
		        </div>
		        <div class="p-3">

		        </div>
			</div>
		</div>
	</div> --}}
	<div class="row">
		<div class="col-md-12 mb-3 ab_tabs p-0">
			<div class="bg-white shadow-sm rounded ab_section">
		      <!-- Tabs with Background on Card -->
		      <div class="p-3 border-bottom bold">
		          Invoices
		        </div>
		      <div class="card">
		        <div class="card-header">
		          <ul class="nav nav-tabs nav-tabs-neutral" role="tablist">
		            <li class="nav-item">
		              <a class="nav-link active" data-toggle="tab" href="#pending" role="tab">Pending Invoice</a>
		            </li>
		            <li class="nav-item">
		              <a class="nav-link" data-toggle="tab" href="#paid" role="tab">Completed Invoice</a>
		            </li>
		          </ul>
		        </div>
		        <div class="card-body invoice">
		          <!-- Tab panes -->
		          <div class="tab-content text-center">
		            <div class="tab-pane active" id="pending" role="tabpanel">
		              <p>Pending Invoices.</p>
		              <table class="table  table-responsive table-hover text-nowrap">
		              	<thead style="background: rgba(223,52,56,1);color: #ffffff;">
		              		<tr>
		              			<th>Invoice.no</th>
		              			<th>Auction.no</th>
		              			<th>Lot.no</th>
		              			<th>Created On</th>
		              			<th>Amount</th>
		              			<th>View</th>
		              		</tr>
		              	</thead>
		              	<tbody id="databody">
		              		@if($pending_invoice !=null)
		              			@foreach($pending_invoice as $pv)
		              			<tr>
		              				<td>{{$pv->invoice_number}}</td>
		              				<td>{{$pv->auction->auction_number}}</td>
		              				<td>{{$pv->lot->lot_number}}</td>
		              				<td>{{ \Carbon\Carbon::parse($pv->created_at)->isoFormat('Do MMM YYYY')}}</td>
		              				<td><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$pv->total_amount}}</td>
		              				<td><a href="{{route('invoice_show',$pv->invoice_number)}}"><i class="fas fa-eye" area-hidden="true"></i></a></td>
		              			</tr>
		              			@endforeach
		              		@endif
		              	</tbody>
		              </table>
		            </div>
		            {{-- paid invoice --}}
		            <div class="tab-pane" id="paid" role="tabpanel">
		              <p>Paid Invoices.</p>
		              <table class="table table-responsive table-hover text-nowrap">
		              	<thead style="background: rgba(223,52,56,1);color: #ffffff;">
		              		<tr>
		              			<th>Invoice.no</th>
		              			<th>Auction.no</th>
		              			<th>Lot.no</th>
		              			<th>Paid On</th>
		              			<th>Amount</th>
		              			<th>View</th>
		              		</tr>
		              	</thead>
		              	<tbody id="databody">
		              		@if($paid_invoice !=null)
		              			@foreach($paid_invoice as $pv)
		              			<tr>
		              				<td>{{$pv->invoice_number}}</td>
		              				<td>{{$pv->auction->auction_number}}</td>
		              				<td>{{$pv->lot->lot_number}}</td>
		              				<td>{{ \Carbon\Carbon::parse($pv->updated_at)->isoFormat('Do MMM YYYY')}}</td>
		              				<td><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$pv->total_amount}}</td>
		              				<td><a href="{{route('invoice_show',$pv->invoice_number)}}"><i class="fas fa-eye" area-hidden="true"></i></a></td>
		              			</tr>
		              			@endforeach
		              		@endif
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