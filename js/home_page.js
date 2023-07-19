var swiper = new Swiper(".home-slider", {
    pagination: {
       el: ".swiper-pagination",
       type: 'bullets',
       clickable: true,
    },
    navigation: {
       nextEl: '.swiper-button-next',
       prevEl: '.swiper-button-prev',
    },
    autoplay: {
       delay: 3000,
       disableOnInteraction: false,
    },
    loop: true,
 });
 
 var swiper = new Swiper(".categories-slider", {
    loop: true,
    spaceBetween: 20,
    autoplay: {
       delay: 5000,
       disableOnInteraction: false,
    },
    centeredSlides: true,
    breakpoints: {
       0: {
          slidesPerView: 1,
       },
       768: {
          slidesPerView: 2,
       },
       1020: {
          slidesPerView: 3,
       },
    },
 });