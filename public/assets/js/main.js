/** ==========================================================================================

  Project :   Boldman - Responsive Multi-purpose HTML5 Template
  Version :   Bootstrap 4.1.1
  Author :    Themetechmount

========================================================================================== */

$('.about_home_carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    items: 1,
    smartSpeed : 3000,
    autoplay: true,
})

$('.tesimonials_slider').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    items: 1,
    smartSpeed : 3000,
    autoplay: true,
})

$('.our_team_grid').owlCarousel({
  loop:true,
  margin:10,
  responsiveClass:true,
  items: 4,
  smartSpeed : 3000,
  autoplay: true,
  nav : true,
  responsive:{
    0:{
        items:2,
        nav:true,
        dots : true,
    },
    600:{
        items:2,
        nav:true
    },
    1000:{
        items:4,
        nav:true,
        loop:true
    }
  }
})


new WOW().init();