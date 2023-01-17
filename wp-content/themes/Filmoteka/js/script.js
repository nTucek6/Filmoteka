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


var user_id = 0;
var movie_id = 0;
var link = "";


function SetValues(user,movie,l)
{
  user_id = user;
  movie_id = movie;
  link = l;
}


function GetButton()
{
  jQuery.ajax({
  type:"POST",
  url: link, 
  data: {
        action: "CheckMovie",
        id :movie_id},
  
  success:function(results){
    var btnBorrow = jQuery("#addBtnBorrow");
    console.log(results);
    btnBorrow.empty();
    if(results == "true")
    {
      btnBorrow.append("<button class='btn btn-primary d-flex justify-content-left' onClick='RentMovie();'>Posudi film</button>");
    }
    else
    {
      btnBorrow.append("<button class='btn btn-danger d-flex justify-content-left' disabled>Film je posuđen!</button>");
    }
  } 
  });   
}


function RentMovie()
{
  jQuery.ajax({
  type:"POST",
  url: link, 
  data: {
        action: "BorrowMovie",
        user_id :user_id,
        movie_id:movie_id
      },
  
  success:function(results){
    location.reload(); 
  }
  });

  
  
}






