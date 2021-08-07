@extends('admin.layouts.header')
<style>
   .body-main {
     background: #ffffff;
     border-bottom: 15px solid #1E1F23;
     border-top: 15px solid #1E1F23;
     margin-top: 30px;
     margin-bottom: 30px;
     padding: 40px 30px !important;
     position: relative;
     box-shadow: 0 1px 21px #808080;
     /*font-size: 10px*/
 }

 .body-main  .main thead {
     background: #1E1F23;
     color: #fff
 }

 .body-main .img {
     height: 100px
 }

 .body-main  h1 {
     text-align: center
 }
</style>
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Invoice Management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            {{-- <li class="breadcrumb-item active"><a href="{{route('admin-auction.index')}}">All Auctions</a></li> --}}
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <!-- /.col -->
          <div class="col-md-12 admin_user_detail">
            <div class="card card-navy border-dark">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#docs" data-toggle="tab">Invoice Detail</a></li>
                </ul>
                <span class="float-right text-white" style="position: absolute; right: 2%;top: 10px"><b><i></i></b></span>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="docs">
                    <!-- Post -->
                    <div class="post">
                      <div class="container">
                        <div class="page-header">
                            <h1>Invoice</h1>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-3 body-main">
                                  <div class="col-md-12">
                                    <div class="row">
                                      <div class="col-md-4"> <img class="img" alt="Invoce Template" src="{{asset('/frontend/logo/logo.png')}}" height="100px" /> </div>
                                      <div class="col-md-8 text-right">
                                          <h4 style="color: #F81D2D;"><strong>Bhargava Auctions</strong></h4>
                                          <strong><p>4th Floor, 9 SIR HUKUMCHAND MARG,</p><p> Indore, Madhya Pradesh-452002</p>
                                          <p>1800-234-124</p>
                                          <p>example@gmail.com</p></strong>

                                      </div>
                                    </div>

                                    <div class="row border" style="margin: 0;padding-top: 12px;">
                                      <div class="col">
                                        <strong><h4><b>Consignee</b></h4>
                                        <h5 style="color: #F81D2D;"><strong>{{$invoice->user->name}}</strong></h5>
                                        <p>{{$invoice->user->address_1}},{{$invoice->user->address_2}},</p>
                                        <p>{{$invoice->user->landmark}},{{getCity($invoice->user->city)->name}},</p><p>{{getState($invoice->user->state)->name}},{{getCountry($invoice->user->country)->name}}-{{$invoice->user->pincode}}</p>
                                        <p>{{$invoice->user->mobile_1}}</p>
                                        <p>{{$invoice->user->email}}</p></strong>
                                      </div>
                                      <div class="col">
                                        <div class="row" style="margin: 0;padding-top: 12px;">
                                          <div class="col">
                                            <strong>
                                              <p>Inv. No </p>
                                              <p>Inv. Date</p>
                                              <p>Place of Delivery</p>
                                             <p> Despatched At</p>
                                            </strong>
                                          </div>
                                          <div class="col">
                                            <strong>
                                              <p>{{$invoice->invoice_number}}</p>
                                              <p>{{ \Carbon\Carbon::parse($invoice->created_at)->isoFormat('Do MMM YYYY')}}</p>
                                              <p>{{$invoice->delivery_place}}</p>
                                              <p>{{$invoice->dispatched_place}}</p>
                                            </strong>
                                          </div>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  <div>
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>
                                            Lot.no.
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            HSN
                                        </th>
                                        <th>
                                            GST %
                                        </th>
                                        <th>
                                            Amount
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td><strong>{{$invoice->lot->lot_number}}</strong></td>
                                          <td><strong>{{$invoice->description}}</strong></td>
                                          <td><strong>{{$invoice->hsn}}</strong></td>
                                          <td><strong>{{$invoice->gst}}</strong></td>
                                          <td><strong>{{$invoice->gross}}</strong></td>
                                      </tr>
                                      <tr style="color: #F81D2D;">
                                        <td></td>
                                        <td class="text-right">
                                          <strong>Gross Amount:</strong>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-left">
                                            <strong><i class="fas fa-rupee-sign" area-hidden="true"></i> {{$invoice->gross}}</strong>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <div class="row border" style="margin: 0;">
                                    <div class="col">
                                      <p> <strong>Bank Name:</strong> </p>
                                      <p> <strong>A/C NO: </strong> </p>
                                      <p> <strong>RTGS / NEFT code: </strong> </p>
                                      <p> <strong>GSTIN: </strong> </p>
                                    </div>
                                    <div class="col">
                                      <p> <strong>Yes bank pvt. Ltd. </strong> </p>
                                      <p> <strong>047851100003619</strong> </p>
                                      <p> <strong>YESB0000487 </strong> </p>
                                      <p> <strong>2457754vf343</strong> </p>
                                    </div>
                                    <div class="col text-right">
                                      <p> <strong>(+) commission {{$invoice->commission_percentage}}% </strong> </p>
                                      <p> <strong>(+) Shipping Charge</strong> </p>
                                      <p> <strong>(+) Total GST</strong> </p>
                                      <p> <strong>(+/-) Round off </strong> </p>
                                    </div>
                                    <div class="col text-right">
                                      <p> <strong>{{$invoice->commission_amount}}</strong> </p>
                                      <p> <strong>{{$invoice->shipping}}</strong> </p>
                                      <p> <strong>{{$invoice->total_gst}}</strong> </p>
                                      <p> <strong>{{$invoice->roundoff}}</strong> </p>
                                    </div>
                                  </div>
                                  <div class="row border" style="margin: 0;">
                                    <div class="col">
                                      <strong>Amount(in words)<br>
                                      <span class="text-uppercase">{{$invoice->total_in_words}}</span></strong>
                                    </div>
                                    <div class="col text-right" style="color: #F81D2D;">
                                      <div class="row text-right" style="margin: 0;">
                                        <div class="col"><strong><h4>Total</h4></strong></div>
                                        <div class="col"><strong><h4><i class="fas fa-rupee-sign" area-hidden="true"></i> {{number_format($invoice->total_amount,2)}}</h4></strong></div>
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
                          
                                <div class="row border" style="margin: 0;">
                                    <div class="col-md-12 text-center">
                                        <button class="mt-2 btn bg-navy" onclick="printrealization()"><i class="fas fa-print"></i>  Print Invoice</button>
                                    </div>
                                </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <!-- /.post -->
                  </div>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
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
        frameDoc.document.write('<link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css" />');
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