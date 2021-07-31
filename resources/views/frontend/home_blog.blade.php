 <section id="blog-boxes" class="blog-boxes">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <h6>Blogs <small class="small-head"><a href="blog.php">View all ></a></small></h6>
        <div class="swiper-container blog-post">
          <div class="swiper-wrapper">
          <?php for($i=0; $i<9; $i++){ ?>
            <div class="col-lg-3 col-md-3 d-flex align-items-stretch swiper-slide" data-aos="fade-up" data-aos-delay="100">
              <div class="card">
                <a href="blog.php">
                  <img src="{{asset('/frontend/blog/blog.png')}}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Best coin collection in</h5>
                    <p class="card-text"><?=substr('Baldwin’s currently boasts the most comprehensive stock of numismatic materi',0,100).'...'; ?></p>
                  </div>
                  <div class="card-footer">
                    <i class="ri-eye-line  eye-size"><small>343</small></i>
                  </div>
                </a>
              </div>            
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>