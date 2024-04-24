$(document).ready(function() {
  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 440) {
      $('#nav_barfixed').addClass('navbar-fixed');
    }
    if ($(window).scrollTop() < 420) {
      $('#nav_barfixed').removeClass('navbar-fixed');
    }
  });
});

$(document).ready(function() {
  
  $(window).scroll(function () {
      //if you hard code, then use console
      //.log to determine when you want the 
      //nav bar to stick.  
      console.log($(window).scrollTop())
    if ($(window).scrollTop() > 356) {
      $('#nav_barfixedBlue').addClass('navbar-fixedBlue');
    }
    if ($(window).scrollTop() < 357) {
      $('#nav_barfixedBlue').removeClass('navbar-fixedBlue');
    }
  });
});


