 <section class="home-all-cat">
    <div class="container">
      <div class="row aos-init aos-animate"  data-aos="fade-up" data-aos-delay="100">
          <div class="col-md-7">
            <h4>MEET THE EXPERTS</h4>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            <a href="{{url('our-service')}}" class="btn btn-danger home-all-cat-btn" title="{{site_info() !=null?site_info()->title:config('app.name')}} services">Discover</a>
          </div>
          <div class="col-md-5">
              <img src="{{asset('/frontend/megamenu.png')}}" alt="auction-experts" title="auction experts" width="60%" class="float-end">
          </div>
      </div>
    </div>
  </section>