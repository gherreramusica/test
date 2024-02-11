


  
  // Swiper Slider
  
  var swiper = new Swiper(".hero-slider", {
      loop: true,
      direction: "vertical",
      effect: 'fade',
      
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  
   // Siper Carousel videos
  
  
  var swiper = new Swiper(".swiper-videos", {
      slidesPerView: 5,
      spaceBetween: 50,
      loop: true,
      
      breakpoints: {
          332: {
              slidesPerView: 2,
              spaceBetween: 20,
            },
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 40,
          },
          1224: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
        },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
    
      
        
        // Swiper-GUARDIANES
  
       
          var swiper = new Swiper(".guardianes-carousel", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
              rotate: 50,
              stretch: 0,
              depth: 100,
              modifier: 1,
              slideShadows: true,
            },
            pagination: {
              el: ".swiper-pagination",
            },
          });

          // Swiper-Cards

          var swiper = new Swiper(".swiper-guardianes", {
            effect: "cards",
            grabCursor: true,
          });