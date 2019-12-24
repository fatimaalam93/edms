(function($) {

    "use strict";




    /* ==========================================================================
     When document is loading, do
     ========================================================================== */

    $(window).on('load', function() {

        // preloader
        var preLoader = $('.preloader');
        function preloader() {
            if(preLoader.length) {
                preLoader.delay(100).fadeOut(500);
            }
        }
        preloader();

        // subscription modal
        var modal = $('.modal');

        if(modal.length){
            modal.each(function(){
                var currentModal=$(this);

                if((currentModal.attr("data-open-onload"))=="true"){    // Checks Each Modal
                    setTimeout(function(){
                        currentModal.modal();
                    }, currentModal.attr("data-open-delay"));
                }
            });
        }
    });

      // Scroll To Top
      $(window).scroll(function () {
          if ($(this).scrollTop() > 150) {
              $('.scrollup').fadeIn();
          } else {
              $('.scrollup').fadeOut();
          }
      });
      $('.scrollup').on('click', function () {
          $("html, body").animate({
              scrollTop: 0
          }, 1500);
          return false;
      });



      // Default Class Js // Use To Background Images // Not Delete JS //
      if ($('[data-background]').length > 0) {
            $('[data-background]').each(function() {
              var $background, $backgroundmobile, $this;
              $this = $(this);
              $background = $(this).attr('data-background');
              $backgroundmobile = $(this).attr('data-background-mobile');
              if ($this.attr('data-background').substr(0, 1) === '#') {
                return $this.css('background-color', $background);
              } else if ($this.attr('data-background-mobile') && device.mobile()) {
                return $this.css('background-image', 'url(' + $backgroundmobile + ')');
              } else {
                return $this.css('background-image', 'url(' + $background + ')');
              }
            });
      }

     // Gallery filter

    if($('.gallery-filter li').length){
        $('.gallery-filter li').on("click",function (event) {
            $(this).siblings('.active').removeClass('active');
            $(this).addClass('active');
            event.preventDefault();
        });
    }

    if($('.gallery-filter').length){
        $('.gallery-filter').on('click', 'a', function () {
            $('#filters button').removeClass('current');
            $(this).addClass('current');
            var filterValue = $(this).attr('data-filter');
            $(this).parents(".gallery-filter-item").next().isotope({filter: filterValue});
        });
    }


    // isotope | init Isotope
    if ($.fn.imagesLoaded && $(".gallery:not(.gallery-masonry)").length > 0) {
        var $container = $(".gallery:not(.gallery-masonry)");
        imagesLoaded($container, function () {
            setTimeout(function(){
                $container.isotope({
                    itemSelector: '.gallery-item',
                    layoutMode: 'fitRows',
                    filter: '*'
                });

                $(window).trigger("resize");
                // filter items on button click
            },500);

        });
    }


      // Default Class Js // Use To Background Images // Not Delete JS //
      $('#sidebar-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots: true,
        nav:false,
        autoplayHoverPause:false,
        autoplay: true,
        smartSpeed: 1500,
        navText: [
          '<i class="fa fa-angle-left" aria-hidden="true"></i>',
          '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480:{
                items:1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
      });


      // Shop Discription // Not Delete JS //
      $('#shop-3col-carousel').owlCarousel({
                loop:true,
                margin:10,
                dots: true,
                nav:false,
                autoplayHoverPause:false,
                autoplay: true,
                smartSpeed: 1500,
                navText: [
                  '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                  '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: {
                        items: 1,
                        center: false
                    },
                    480:{
                        items:1,
                        center: false
                    },
                    600: {
                        items: 1,
                        center: false
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    },
                    1200: {
                        items: 4
                    }
                }
      });


      // Shop Baner Slider  Discription // Not Delete JS //
      $('#baner-slider').owlCarousel({
          loop:true,
          margin:0,
          dots: false,
          nav:false,
          autoplayHoverPause:false,
          autoplay: true,
          smartSpeed: 1500,
          navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
          ],
          responsive: {
              0: {
                  items: 1,
                  center: false
              },
              480:{
                  items:1,
                  center: false
              },
              600: {
                  items: 1,
                  center: false
              },
              768: {
                  items: 1
              },
              992: {
                  items: 1
              },
              1200: {
                  items: 1
              }
          }
      });

      // owl-carousel for client
      $('#client-carousel').owlCarousel({
          loop:true,
          margin:15,
          dots: false,
          nav:true,
          rtl:true,
          autoplayHoverPause:false,
          autoplay: true,
          smartSpeed: 1500,
          navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
          ],
          responsive: {
              0: {
                  margin: 10,
                  items: 2
              },
              480: {
                  margin: 10,
                  items: 3
              },
              600:{
                  margin: 20,
                  items: 3
              },
              1000: {
                  items: 5
              }
          }
      });


      // testimonial for owlCarousel
      $('#testimonial-carousel').owlCarousel({
        loop:true,
        margin:15,
        dots: false,
        nav:true,
        rtl:true,
        autoplayHoverPause:false,
        autoplay: true,
        smartSpeed: 1500,
        navText: [
          '<i class="fa fa-angle-right" aria-hidden="true"></i>',
          '<i class="fa fa-angle-left" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480:{
                items:1,
                center: false
            },
            600: {
                items: 1,
                center: false
            },
            768: {
                items: 1
            },
            992: {
                items: 1
            },
            1200: {
                items: 2
            }
        }
      });

      // Gallery for owlCarousel
      $('#gallery-carousel').owlCarousel({
        loop:true,
        margin:15,
        dots: false,
        nav:true,
        rtl:true,
        autoplayHoverPause:false,
        autoplay: true,
        smartSpeed: 1500,
        navText: [
          '<i class="fa fa-angle-left" aria-hidden="true"></i>',
          '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                center: false
            },
            480:{
                items:1,
                center: false
            },
            600: {
                items: 2,
                center: false
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 4
            }
        }
      });
      // Gallery for owlCarousel

      // project for owlCarousel
      $('.services-slider').owlCarousel({
          loop:true,
          autoplay: 5000,
          autoplayHoverPause:false,
          smartSpeed: 700,
          items: 3,
          margin:30,
          dots: false,
          nav:false,
          responsive:{
            0:{
              items:1
            },
            480:{
              items:1
            },
            600:{
              items:2
            },
            800:{
              items:3
            },
            1024:{
              items:3
            },
            1200:{
              items:3
            }
          }
      });

      // project for owlCarousel
      $('.services-slider-rtl').owlCarousel({
          loop:true,
          autoplay: 5000,
          autoplayHoverPause:false,
          smartSpeed: 700,
          rtl: true,
          items: 3,
          margin:30,
          dots: false,
          nav:false,
          responsive:{
            0:{
              items:1
            },
            480:{
              items:1
            },
            600:{
              items:2
            },
            800:{
              items:3
            },
            1024:{
              items:3
            },
            1200:{
              items:3
            }
          }
      });


      // Counter / Funfact
      var startCount = $('.start-count');
      if (startCount.length) {
          startCount.each(function () {
              var $this = $(this);
              $this.data('target', parseInt($this.html(), 10));
              $this.data('counted', false);
              $this.html('0');
          });

          $(window).on('scroll', function () {
              var speed = 4000;
              $('.start-count').each(function () {
                  var $this = $(this);
                  if (!$this.data('counted') && $(window).scrollTop() + $(window).height() >= $this.offset().top) {
                      $this.data('counted', true);
                      $this.animate({
                          dummy: 1
                      }, {
                          duration: speed,
                          step: function (now) {
                              var $this = $(this);
                              var val = Math.round($this.data('target') * now);
                              $this.html(val);
                              if (0 < $this.parent('.value').length) {
                                  $this.parent('.value').css('width', val + '%');
                              }
                          }
                      });
                  }
              });
          })
          .triggerHandler('scroll');
      }





      //bootstrap Slider JS Start
      $('#slider-style-one').bsTouchSlider();
      //bootstrap Slider JS End


      //flexslider JS Start
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: false
      });
      //flexslider JS End

      //slick JS Start
      $(document).ready(function(){



          /* Rev Slider */
          var revSliderOne = $('#rev_slider_one');
          if(revSliderOne.length) {
              revSliderOne.show().revolution({

                  responsiveLevels: [1240, 1024, 778, 480],
                  /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                  gridwidth:[1240, 1024, 778, 480],
                  /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                  gridheight:[400, 768, 960, 720],
                  /* [DESKTOP, LAPTOP, TABLET, SMARTPHONE] */
                  visibilityLevels:[1240, 1024, 1024, 480],

                  /* options are 'auto', 'fullwidth' or 'fullscreen' */
                  sliderLayout: 'fullscreen',

                  autoHeight: 'on',
                  dottedOverlay: 'twoxtwo',

                  /* basic navigation arrows and bullets */
                  navigation: {

                      onHoverStop: 'off',

                      arrows: {
                          enable: true,
                          style: 'erinyen',
                          tmp: '<div class="tp-title-wrap"><div class="tp-arr-imgholder"></div><div class="tp-arr-img-over"></div><span class="tp-arr-titleholder">{{title}}</span></div>',
                      },

                      bullets: {
                          enable: false,
                      }
                  }
              });
          }


      // Slick Slider
        var slickSlider = $('.slick-slider-one');

        slickSlider.on('init', function(event, slick){
          $('.animated').addClass('activate fadeInUp');
        });

        slickSlider.slick({
          autoplay: false,
          autoplaySpeed: 0,
          pauseOnHover: false,
          dots: false,
        });

        slickSlider.on('afterChange', function(event, slick, currentSlide) {
          $('.animated').removeClass('off');
          $('.animated').addClass('activate fadeInUp');
        });

        slickSlider.on('beforeChange', function(event, slick, currentSlide) {
          $('.animated').removeClass('activate fadeInUp');
          $('.animated').addClass('off');
        });
      });
      //slick JS Start

      //Video Player JS Strat
      $('.player').mb_YTPlayer();
      //Video Player JS End


      //LightBox / MagnificPopup start
      $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: true,
          fixedContentPos: false
      });

      $('.lightbox-image').magnificPopup({
        type: 'image',
        removalDelay: 500,
        mainClass: 'mfp-fade',
        // other optionsgallery:
              gallery: {
                  enabled: true,
                  navigateByImgClick: true,
                  preload: [0,1]
              },

               retina: {
                  ratio: 1, // Increase this number to enable retina image support.
                  // Image in popup will be scaled down by this number.
                  // Option can also be a function which should return a number (in case you support multiple ratios). For example:
                  // ratio: function() { return window.devicePixelRatio === 1.5 ? 1.5 : 2  }


                  replaceSrc: function(item, ratio) {
                    return item.src.replace(/\.\w+$/, function(m) { return '@2x' + m; });
                  } // function that changes image source
              }
      });
      //LightBox / MagnificPopup End


      // makes the parallax elements JQUARY Start
      function parallaxIt() {
        // create variables
        var $fwindow = $(window);
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        var $contents = [];
        var $backgrounds = [];

        // for each of content parallax element
        $('[data-type="content"]').each(function(index, e) {
          var $contentObj = $(this);

          $contentObj.__speed = ($contentObj.data('speed') || 1);
          $contentObj.__fgOffset = $contentObj.offset().top;
          $contents.push($contentObj);
        });

        // for each of background parallax element
        $('[data-type="parallax"]').each(function() {
          var $backgroundObj = $(this);

          $backgroundObj.__speed = ($backgroundObj.data('speed') || 1);
          $backgroundObj.__fgOffset = $backgroundObj.offset().top;
          $backgrounds.push($backgroundObj);
        });

        // update positions
        $fwindow.on('scroll resize', function() {
          scrollTop = window.pageYOffset || document.documentElement.scrollTop;

          $contents.forEach(function($contentObj) {
            var yPos = $contentObj.__fgOffset - scrollTop / $contentObj.__speed;

            $contentObj.css('top', yPos);
          });

          $backgrounds.forEach(function($backgroundObj) {
            var yPos = -((scrollTop - $backgroundObj.__fgOffset) / $backgroundObj.__speed);

            $backgroundObj.css({
              backgroundPosition: '50% ' + yPos + 'px'
            });
          });
        });

        // triggers winodw scroll for refresh
        $fwindow.trigger('scroll');
      }
      parallaxIt();
      // Parallax elements JQUARY End


      // Type Slider JQUARY Start
      function typeSlider() {
        var TxtRotate = function(el, toRotate, period) {
          this.toRotate = toRotate;
          this.el = el;
          this.loopNum = 0;
          this.period = parseInt(period, 10) || 2000;
          this.txt = '';
          this.tick();
          this.isDeleting = false;
        };
        TxtRotate.prototype.tick = function() {
          var i = this.loopNum % this.toRotate.length;
          var fullTxt = this.toRotate[i];

          if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
          } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
          }

          this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

          var that = this;
          var delta = 300 - Math.random() * 100;

          if (this.isDeleting) { delta /= 2; }

          if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
          } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
          }

          setTimeout(function() {
            that.tick();
          }, delta);
        };
        window.onload = function() {
          var elements = document.getElementsByClassName('txt-rotate');
          for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-rotate');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtRotate(elements[i], JSON.parse(toRotate), period);
            }
          }
          // INJECT CSS
          var css = document.createElement("style");
          css.type = "text/css";
          css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666 }";
          document.body.appendChild(css);
        };
      }
      typeSlider();
      // Type Slider JQUARY End



        $(document).on('click','.widget-categories-list a',function(){
          var paerent = $(this).closest('li');
          var t = $(this);
          if(paerent.children('ul').length > 0){
            $(this).closest('li').children('ul').slideToggle();
            return false;
          }
        });


      // Progress Ber
      startAnimation();

      function startAnimation(){
          jQuery('.skills').each(function(){

              jQuery(this).find('.skillbar-1').animate({
                width:jQuery(this).attr('data-percent')
              },3000);

              jQuery(this).find('.skillbar-2').animate({
                width:jQuery(this).attr('data-percent')
              },3000);

              jQuery(this).find('.skillbar-3').animate({
                width:jQuery(this).attr('data-percent')
              },3000);

              jQuery(this).find('.skillbar-4').animate({
                width:jQuery(this).attr('data-percent')
              },3000);

          });
      }

      // countdown Timer
      var now = new Date();
      var countTo = '2019/01/01';

      if($('.timer').length){
        $('.timer').countdown(countTo, function(event) {
            $(this).find('.days').text(event.offset.totalDays);
            $(this).find('.hours').text(event.offset.hours);
            $(this).find('.minutes').text(event.offset.minutes);
            $(this).find('.seconds').text(event.offset.seconds);
        });
      }

      //Progress Bar / Levels
      function progressbar () {
        if($('.progress-levels .progress-box .bar-fill').length){
          $(".progress-box .bar-fill").each(function() {
            var progressWidth = $(this).attr('data-percent');
            $(this).css('width',progressWidth+'%');
            //$(this).parents('.progress-box').children('.percent').html(progressWidth+'%');
          });
        }
      }

      $(window).scroll(function() {
        progressbar();
      });

      function main() {
        $("a.page-scroll").on('click', function () {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({scrollTop: target.offset().top - 95}, 900);
                    return false;
                }
            }
        });
      }

    main();

    // close navbar-collapse when a  clicked
    var onePageNav = $('.sp-header .nav li a');
    onePageNav.on('click', function () {
      onePageNav.parent().removeClass("active");
        $(this).parent().addClass("active");
    });

    // --- Ajax Contact script --//
    $(function() {

     // Get the form.
     var form = $('#ajax-contact');

     // Get the messages div.
     var formMessages = $('#form-messages');

     // Set up an event listener for the contact form.
     $(form).submit(function(e) {
      // Stop the browser from submitting the form.
      e.preventDefault();

      // Serialize the form data.
      var formData = $(form).serialize();

      // Submit the form using AJAX.
      $.ajax({
       type: 'POST',
       url: $(form).attr('action'),
       data: formData
      })
      .done(function(response) {
       // Make sure that the formMessages div has the 'success' class.
       $(formMessages).removeClass('error');
       $(formMessages).addClass('success');

       // Set the message text.
       $(formMessages).text(response);

            // Clear the form.
            $('#name').val('');
            $('#phone').val('');
            $('#subject').val('');
            $('#email').val('');
            $('#message').val('');
      })
      .fail(function(data) {
       // Make sure that the formMessages div has the 'error' class.
       $(formMessages).removeClass('success');
       $(formMessages).addClass('error');

       // Set the message text.
       if (data.responseText !== '') {
        $(formMessages).text(data.responseText);
       } else {
        $(formMessages).text('Oops! An error occured and your message could not be sent.');
       }
      });

     });

    });

})(window.jQuery);


