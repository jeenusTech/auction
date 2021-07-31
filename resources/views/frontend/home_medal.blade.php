<section id="home-medal">
    <div class="container">
      <div class="row">
        <h6>Military Medals <small class="small-head"><a href="medals.php">Explore all ></a></small></h6>
        <div class="swiper-container medal-slide">
          <div class="swiper-wrapper">
            <?php for($i=0; $i<6; $i++){ ?>
            <div class="col-md-4 medal-box swiper-slide">
              <a href="medal.php" class="row">
                <img src="{{asset('/frontend/medal/medal.png')}}" alt="medal" class="col-md-4">
                <div class="col-md-8">
                <p>A GREAT WAR, MILITARY CROSS GROUP TO THE 9TH LANCERS FOR RECONNAISSANCE PATROLS WHO ALSO SAW SERVICE IN WW2 TO CAPTAIN (LATER HONORARY MAJOR) WILLIAM THOMAS POTT</p>
                <span class="price">£1,695.00</span>              
                </div>
              </a>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>