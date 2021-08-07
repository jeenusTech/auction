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
		      
		      <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3 body-main">
                            <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-4">
                                  	<p>
                                  		<img class="img" alt="Invoce Template" src="{{asset('/frontend/logo/logo.png')}}" width="100px" style="position: relative;float: left;" />
                                  	</p>
                                  </div>
                                  <div class="col-md-8 text-right">
                                      <h6 style="color: #F81D2D;text-align: unset !important;"><strong>Bhargava Auctions</strong></h6>
                                      <strong><p>4th Floor, 9 SIR HUKUMCHAND MARG,</p><p> Indore, Madhya Pradesh-452002</p>
                                      <p>1800-234-124</p>
                                      <p>example@gmail.com</p></strong>

                                  </div>
                                </div>

                                <div class="row border" style="margin: 0;padding-top: 12px;">
                                  <div class="col">
                                    <strong><h6><b>Consignee</b></h6>
                                    <h5 style="color: #F81D2D;"><strong>{{$invoice->user->name}}</strong></h5>
                                    <p>{{$invoice->user->address_1}},{{$invoice->user->address_2}},</p>
                                    <p>{{$invoice->user->landmark}},{{getCity($invoice->user->city)->name}},</p><p>{{getState($invoice->user->state)->name}},{{getCountry($invoice->user->country)->name}}-{{$invoice->user->pincode}}</p>
                                    <p>{{$invoice->user->mobile_1}}</p>
                                    <p>{{$invoice->user->email}}</p></strong>
                                  </div>
                                  <div class="col">
                                  	<div class="row" style="margin: 0;padding-top: 12px;">
                                      <div class="col"><strong><p>Inv. No </p></strong></div>
                                      <div class="col text-right"><strong><p>{{$invoice->invoice_number}}</p></strong></div>
                                  	</div>
                                  	<div class="row" style="margin: 0;padding-top: 12px;">
                                      <div class="col"><strong><p>Inv. Date </p></strong></div>
                                      <div class="col text-right"><strong><p>{{ \Carbon\Carbon::parse($invoice->created_at)->isoFormat('Do MMM YYYY')}}</p></strong></div>
                                  	</div>
                                  	<div class="row" style="margin: 0;padding-top: 12px;">
                                      <div class="col"><strong><p>Place of Delivery </p></strong></div>
                                      <div class="col text-right"><strong><p>{{$invoice->delivery_place}}</p></strong></div>
                                  	</div>
                                  	<div class="row" style="margin: 0;padding-top: 12px;">
                                      <div class="col"><strong><p>Despatched At</p></strong></div>
                                      <div class="col text-right"><strong><p>{{$invoice->dispatched_place}}</p></strong></div>
                                  	</div>
                                  </div>
                                </div>
                                <div>
                                  <table class="table table-responsive table-bordered" style="width: 100%;">
                                    <thead>
                                      <tr>
                                        <td>Lot.no.</td>
                                        <td style="width: 100%;">Description</td>
                                        <td style="width: 100%;">HSN</td>
                                        <td style="width: 100%;">GST %</td>
                                        <td style="width: 100%;">Amount</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>{{$invoice->lot->lot_number}}</td>
                                          <td style="width: 100%;">{{$invoice->description}}</td>
                                          <td style="width: 100%;">{{$invoice->hsn}}</td>
                                          <td style="width: 100%;">{{$invoice->gst}} %</td>
                                          <td style="width: 100%;">{{$invoice->gross}}</td>
                                      </tr>
                                      <tr style="color: #F81D2D;">
                                        <td></td>
                                        <td class="text-right">
                                          <strong>Gross Amount:</strong>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-left">
                                            <strong>{{$invoice->gross}}</strong>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <div class="row border" style="margin: 0;">
                                    <div class="col">
                                    	<div class="row" style="margin: 0;padding-top: 12px;">
	                                      <div class="col"><strong><p>Bank Name:</p></strong></div>
	                                      <div class="col text-right"><strong><p>Yes bank pvt. Ltd. </p></strong></div>
	                                  	</div>
                                    	<div class="row" style="margin: 0;padding-top: 12px;">
	                                      <div class="col"><strong><p>A/C NO:</p></strong></div>
	                                      <div class="col text-right"><strong><p>047851100003619</p></strong></div>
	                                  	</div>
                                    	<div class="row" style="margin: 0;padding-top: 12px;">
	                                      <div class="col"><strong><p>RTGS / NEFT code:</p></strong></div>
	                                      <div class="col text-right"><strong><p>YESB0000487</p></strong></div>
	                                  	</div>
                                    	<div class="row" style="margin: 0;padding-top: 12px;">
	                                      <div class="col"><strong><p>GSTIN:</p></strong></div>
	                                      <div class="col text-right"><strong><p>2457754vf343</p></strong></div>
	                                  	</div>
                                    </div>
                                    <div class="col text-right">

                                	  <div class="row" style="margin: 0;padding-top: 12px;">
                                        <div class="col"><strong>(+) commission {{$invoice->commission_percentage}}%</strong></div>
                                        <div class="col text-right"><strong>{{$invoice->commission_amount}}</strong></div>
                                  	  </div>
                                  	  <div class="row" style="margin: 0;padding-top: 12px;">
                                        <div class="col"><strong>(+) Shipping Charge</strong></div>
                                        <div class="col text-right"><strong>{{$invoice->shipping}}</strong></div>
                                  	  </div>
                                  	  <div class="row" style="margin: 0;padding-top: 12px;">
                                        <div class="col"><strong>(+) Total GST</strong></div>
                                        <div class="col text-right"><strong>{{$invoice->total_gst}}</strong></div>
                                  	  </div>
                                  	  <div class="row" style="margin: 0;padding-top: 12px;">
                                        <div class="col"><strong>(+/-) Round off</strong></div>
                                        <div class="col text-right"><strong>{{$invoice->roundoff}}</strong></div>
                                  	  </div>
                                    </div>
                                  </div>
                                  <div class="row border" style="margin: 0;">
                                    <div class="col">
                                      <strong>Amount(in words)<br>
                                      <span class="text-uppercase">{{$invoice->total_in_words}}</span></strong>
                                    </div>
                                    <div class="col text-right" style="color: #F81D2D;">
                                      <div class="row text-right" style="margin: 0;">
                                        <div class="col text-right"><h6 style="float: right;"><strong>Total</strong></h6></div>
                                        <div class="col text-right"><h6 style="float: right;"><strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{number_format($invoice->total_amount,2)}}</strong></h6></div>
                                      </div>
                                    </div>
                                  </div>
	                            </div>
                                <div class="row border" style="margin: 0;">
                                    <div class="col-md-12 text-right">
                                        <p><b>Date :</b> {{ \Carbon\Carbon::parse($invoice->created_at)->isoFormat('Do MMM YYYY')}}</p> <br />
                                        <p><b>Signature</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin: 0;">
                            <div class="col-md-12 text-center">
                                <button class="mt-2 btn btn-danger" onclick="printrealization()"><i class="fas fa-print"></i>  Print Invoice</button>
                            </div>
                        </div>
                    </div>
                <!-- /.tab-content -->
              	</div><!-- /.card-body -->
		      </div>
		      <!-- End Tabs on plain Card -->

			</div>
		</div>
	</div>
</div>
@endsection
<script>
      function printrealization(){
        var contents = $(".body-main").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>Auction</title>');
        frameDoc.document.write('</head><body>');
        //Append the external CSS file.
        frameDoc.document.write('<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />');
        //Append the DIV contents.
        frameDoc.document.write(contents);
        
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    }
</script>