window.$ = window.jQuery = require('jquery');
// for frontend
window.AOS=require('aos/dist/aos');

// require('jquery/dist/jquery.min.js');
require('popper.js/dist/popper.min.js');
require('../vendor/jquery/jquery-3.6.0.min.js');
// require('../vendor/bootstrap/js/bootstrap.min.js');

require('../vendor/bootstrap/js/bootstrap.bundle.min.js');
require('bootstrap/js/dist/tab.js');
// require('../vendor/swiper/swiper-bundle.min.js');
// require('https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.0/swiper-bundle.min.js');
// var Swiper = require('swiper');
// window.Swiper=require('swiper/swiper-bundle');
window.Swiper=require('swiper/swiper-bundle.min.js');
require('./frontend/header.js');
// for light box
require('lightbox2')
require('../vendor/magiczoomplus/magiczoomplus.js');

// for sweet alert

require('./admin/sweetalert.js');
// for the single auction slider
 var swiper = new Swiper(".singleswiperthumb", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".singleauctionswiper", {
    spaceBetween: 10,
    thumbs: {
      swiper: swiper,
    },
  });
  var allcat = new Swiper(".home-banner", {
        loop : true,
        autoplay: {
          delay: 5000,
        },
        pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
        },
      });
      var reccat = new Swiper(".recomended-cat", {
        loop : false,
        pagination: {
          el: '.swiper-pagination',
          type: 'bullets',
        },
        navigation: {
          nextEl: '.swiper-button-next-unique',
          prevEl: '.swiper-button-prev-unique'
        },
        slidesPerView: '4',
        spaceBetween: 10, breakpoints: {
        310: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        420: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        560: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        1400: {
          slidesPerView: 4,
          spaceBetween: 10,
        },

      }
      });
      // for medals
      var medal = new Swiper(".medal-slide", {
        loop : false,
        slidesPerView: '3',
        spaceBetween: 10,
        breakpoints: {
        310: {
          slidesPerView: 1,
          spaceBetween: 10,
        },
        420: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        560: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        1400: {
          slidesPerView: 3,
          spaceBetween: 10,
        },

      }
      });
// for blog post
    var medal = new Swiper(".blog-post", {
        loop : false,
        slidesPerView: '4',
        spaceBetween: 5,
        breakpoints: {
        310: {
          slidesPerView: 1,
        },
        420: {
          slidesPerView: 2,
        },
        560: {
          slidesPerView: 3,
        },
        640: {
          slidesPerView: 3,
        },
        768: {
          slidesPerView: 2,
        },
        991: {
          slidesPerView: 3,
        },
        1400: {
          slidesPerView: 4,
        },

      }
      });
 
  // window.Swal = Swal;

