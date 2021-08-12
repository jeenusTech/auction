@extends('frontend.layout.header')
@section('content')
   <!-- ======= Hero Section ======= -->
<!--   <section id="hero" style='background-image: url("assets/img/hero/registration.png");'>
    <div class="hero-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
     
      <div class="hero">
        <div class="hero-body">
          <h1>Register</h1>
          <p>British coins have always been popular amongst numismatists, not least because of their historical context, but also as a result of some of the finest coins ever being minted within this broad period.</p>
        </div>
      </div>
    </div>
  </section> -->

  <section class="banner bg-banner-one overlay" style='background-image: url("{{asset('/frontend/hero/registration.png')}}");'>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Content Block -->
        <div class="block">
          <div class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
            <h1>Register</h1>
            <p>British coins have always been popular amongst numismatists, not least because of their historical context, but also as a result of some of the finest coins ever being minted within this broad period.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- End Hero -->
  <!-- ======= Hero Section ======= -->
  <section id="form-section" class="realization_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Auction No. {{$auction_id}} Realization</h3>
          <div class="realisation_print">
            {{-- <a href="javscript:void(0)"><i class="bx bxs-file-pdf"></i>Realization PDF</a> --}}
            <a href="javscript:void(0)" onclick="printrealization()"><i class="bx bxs-printer"></i>Print Realization</a>
          </div>
          <div class="container reg-container">
            <div class="row realization_view">
              <div class="col-xs-6 col-sm-6 col-md-3 navigation">
                <ul class="nav">
                  <li class="nav-item"><a>Lot</a></li>
                  <li class="nav-item"><a>price</a></li>
                </ul>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-3 navigation mobile">
                <ul class="nav">
                  <li class="nav-item"><a>Lot</a></li>
                  <li class="nav-item"><a>price</a></li>
                </ul>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-3 navigation windows">
                <ul class="nav">
                  <li class="nav-item"><a>Lot</a></li>
                  <li class="nav-item"><a>price</a></li>
                </ul>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-3 navigation windows">
                <ul class="nav">
                  <li class="nav-item"><a>Lot</a></li>
                  <li class="nav-item"><a>price</a></li>
                </ul>
              </div>
            </div>
            <div class="row realization_view_data">
              @foreach($lots as $lot)
                
              <div class="col-xs-6 col-sm-6 col-md-3 navigation">
                <ul class="nav">
                  <li class="nav-item"><a>{{$lot->lot_number}}</a></li>
                  <li class="nav-item"><a>{{number_format($lot->sold_price)}}</a></li>
                </ul>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero -->
@endsection

<script>
  window.addEventListener('load', () => {

  });
 // function printrealization(){
 //        $('.reg-container').print();
 //  }
  // $(function () {
    function printrealization(){
        var contents = $(".realization_view_data").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>{{site_info() !=null?site_info()->title:config('app.name')}}</title>');
        frameDoc.document.write('</head><body>');
        //Append the external CSS file.
        frameDoc.document.write('<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />');
        //Append the DIV contents.
        frameDoc.document.write('<h4>Auction No. {{$auction_id}} Realization</h4><div class="row realization_view"><div class="col-xs-6 col-sm-6 col-md-3 navigation"><ul class="nav"><li class="nav-item"><a>Lot</a></li><li class="nav-item"><a>price</a></li></ul></div>');
        frameDoc.document.write(contents);
        frameDoc.document.write('</div>');
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    }
// });
</script>