  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6  footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class=""></i> <a href="/index" title="{{site_info() !=null?site_info()->title:config('app.name')}} home">Home</a></li>
              <li><i class=""></i> <a href="{{route('latest-auction')}}" title="{{site_info() !=null?site_info()->title:config('app.name')}} latest auction">Auction</a></li>
              <li><i class=""></i> <a href="{{url('about-us')}}" title="{{site_info() !=null?site_info()->title:config('app.name')}} about us">About Us</a></li>
              <li><i class=""></i> <a href="{{url('contact')}}" title="{{site_info() !=null?site_info()->title:config('app.name')}} contact us">Contact Us</a></li>
              <li><i class=""></i> <a href="{{route('terms-and-conditions')}}" title="{{site_info() !=null?site_info()->title:config('app.name')}} terms and conditions">Terms and Conditions</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Information</h4>
            <ul>
              <li><i class=""></i> <a href="{{url('contact')}}" title="{{site_info() !=null?site_info()->title:config('app.name')}} know your coin">Know your coin</a></li>
              <li><i class=""></i> <a href="{{url('contact')}}" title="{{site_info() !=null?site_info()->title:config('app.name')}} faq">FAQs</a></li>
              <li><i class=""></i> <a href="{{route('bank-info')}}" title="{{site_info() !=null?site_info()->title:config('app.name')}} bank information">Bank Information</a></li>
              {{-- <li><i class=""></i> <a href="#">Order catalogues</a></li> --}}
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Subscribe us</h4>
            <p>Subscribe us for Latest updates</p>
            <form action="" method="post">
              <input type="email" name="email">
              <input type="submit" value="Submit">
            </form>
            <h4 class="follow_us">Follow us</h4>
            <div class="social-links mt-3">
                <a href="{{site_info() !=null?site_info()->fb:'javascript:void(0)'}}" class="facebook" title="{{site_info() !=null?site_info()->title:config('app.name')}} facebook"><i class="bx bxl-facebook"></i></a>
                <a href="{{site_info() !=null?site_info()->instagram:'javascript:void(0)'}}" class="instagram" title="{{site_info() !=null?site_info()->title:config('app.name')}} instagram"><i class="bx bxl-instagram"></i></a>
                <a href="{{site_info() !=null?site_info()->twitter:'javascript:void(0)'}}" class="twitter" title="{{site_info() !=null?site_info()->title:config('app.name')}} twitter"><i class="bx bxl-twitter"></i></a>
               <!--  <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
            </div>
          </div>
          <div class="col-lg-3 col-md-6 footer-newsletter">
            <div class="footer-info">
              <h4>Contact us</h4>
              <p>
                {{site_info() !=null?site_info()->door_number:'4th Floor'}}, {{site_info() !=null?site_info()->street:'9 SIR HUKUMCHAND MARG'}},<br>
                {{site_info() !=null?site_info()->district:'Indore'}}, {{site_info() !=null?site_info()->state:'Madhya Pradesh'}}</br>
                {{site_info() !=null?site_info()->country:'India'}} - {{site_info() !=null?site_info()->pin:'452002'}}.
              </p>
              <br>
              <iframe id="maps" width="80%" height="200px" padding="0px" margin="0px" frameborder="0" style="border:0" src="{{site_info() !=null?site_info()->map_link:'https://www.google.com/maps/embed/v1/place?key=AIzaSyB0d_sYwCWD5owhYY4UYb-i7VlOOnx2_o4&q=Indore,Madhya+Pradesh,India'}}" allowfullscreen>
				      </iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Dewi</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div> -->
  </footer><!-- End Footer -->

</body>
<!-- Template Main JS File -->
 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
      window.onload = function(){
      
      
}
  </script>
</html>