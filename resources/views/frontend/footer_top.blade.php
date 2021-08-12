  <section id="footer-top" class="top-footer">
    <div class="container" data-aos="fade-up">
      
      <div class="row">
        <h1 class="letconnect">Lets get connected</h1>
        <div class="col-md-4 d-flex align-items-stretch " data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <a href="{{route('register')}}" title="{{site_info() !=null?site_info()->title:config('app.name')}} register">
              <i class="ri-draft-line card-icon"></i>
              <div class="card-body">
                <h5 class="card-title">Create Account</h5>
                <p class="card-text">DiscoverDiscoverCreate an account to take advantage of wish-lists, guides, and more…</p>
              </div>
              <div class="card-footer">
                <span>Register or login</span>
              </div>
            </a>
          </div>            
        </div>
        <div class="col-md-4 d-flex align-items-stretch " data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <a href="javascript:void(0)" title="{{site_info() !=null?site_info()->title:config('app.name')}} news letter">
              <i class="ri-draft-line card-icon"></i>
              <div class="card-body">
                <h5 class="card-title">News letter</h5>
                <p class="card-text">Receive updates on latest coins & medals and be the first to hear about our special offers</p>
              </div>
              <div class="card-footer">
                <span>Sign-up</span>
              </div>
            </a>
          </div>            
        </div>
        <div class="col-md-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <a href="javascript:void(0)" title="{{site_info() !=null?site_info()->title:config('app.name')}} social media">
              <i class="ri-draft-line card-icon"></i>
              <div class="card-body">
                <h5 class="card-title">Follow Us</h5>
                <p class="card-text">Follow us on social media for unmissable posts and updates…</p>
              </div>
              <div class="card-footer">
                <span>
                  <a href="{{site_info() !=null?site_info()->fb:'javascript:void(0)'}}" class="facebook bold-black" title="{{site_info() !=null?site_info()->title:config('app.name')}} facebook"><i class="bx bxl-facebook"></i></a>
                  <a href="{{site_info() !=null?site_info()->instagram:'javascript:void(0)'}}" class="instagram bold-black" title="{{site_info() !=null?site_info()->title:config('app.name')}} instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="{{site_info() !=null?site_info()->twitter:'javascript:void(0)'}}" class="twitter bold-black" title="{{site_info() !=null?site_info()->title:config('app.name')}} twitter"><i class="bx bxl-twitter"></i></a>
                </span>
              </div>
            </a>
          </div>            
        </div>
      </div>
    </div>
  </section>