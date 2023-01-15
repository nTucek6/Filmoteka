var swiperFrontPage = new Swiper(".movies_slider_frontpage", {
  slidesPerView:4,
  spaceBetween:30,
  centeredSlides:false,
  pagination:{
    el: ".swiper-pagination",
    clickable:true,
  },
  autoplay: {
    delay: 5000,
  },
  });
  



var swiper = new Swiper(".movies_slider", {
slidesPerView:3,
spaceBetween:30,
centeredSlides:false,
pagination:{
  el: ".swiper-pagination",
  clickable:true,
},
autoplay: {
  delay: 5000,
},
});


jQuery(function($) {
  // Bootstrap menu magic
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $(".dropdown-toggle").attr('data-toggle', 'dropdown');
    } else {
      $(".dropdown-toggle").removeAttr('data-toggle dropdown');
    }
  });
});




