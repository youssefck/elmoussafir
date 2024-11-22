/*
Author       : Creativeguys
Template Name: Consult - Consultation Firm HTML Template
Version      : 1.0
*/
(function($) {
	'use strict';
	
	jQuery(document).on('ready', function(){
	
		/*PRELOADER JS*/
		$(window).on('load', function() {  
			$('.spinner').fadeOut();
			$('.preloader').delay(350).fadeOut('slow'); 
		}); 
		/*END PRELOADER JS*/		
		
		/*START MENU JS*/		
			 if ($(window).scrollTop() > 200) {
              $('.fixed-top').addClass('menu-bg');
          } else {
              $('.fixed-top').removeClass('menu-bg');
          }
			$(window).on('scroll', function(){
				if ( $(window).scrollTop() > 100 ) {
					$('.site-navigation, .header-white, .header').addClass('navbar-fixed');
				} else {
					$('.site-navigation, .header-white, .header').removeClass('navbar-fixed');
				}
			});		  	
		/*END MENU JS*/	

		/*START HOME SLIDER JS*/	
		jQuery("#home-slider").flexslider({
			directionNav: false,
			controlnav: true,
		});
		/*END HOME SLIDER JS*/		

		/*START VIDEO JS*/
		$('.video-play').magnificPopup({
            type: 'iframe'
        });
		/*END VIDEO JS*/

		/* START COUNTDOWN JS*/
		$('.counter_feature').on('inview', function(event, visible, visiblePartX, visiblePartY) {
			if (visible) {
				$(this).find('.counter-num').each(function () {
					var $this = $(this);
					$({ Counter: 0 }).animate({ Counter: $this.text() }, {
						duration: 2000,
						easing: 'swing',
						step: function () {
							$this.text(Math.ceil(this.Counter));
						}
					});
				});
				$(this).unbind('inview');
			}
		});
		/* END COUNTDOWN JS */			
		
		/* START SERVICE JS */
			$("#service-slider").owlCarousel({
			    items:2,
				itemsDesktop:[1000,2],
				itemsDesktopSmall:[980,1],
				itemsTablet:[768,1],
				itemsMobile:[650,1],
				itemsMobile:[480,1],
				pagination:true,
				navigation:false,
				slideSpeed:1000,
				autoPlay:false
			});
		/* END SERVICE JS */
		
		/* START TEAM JS */
			$("#team-slider").owlCarousel({
			    items:2,
				itemsDesktop:[1000,2],
				itemsDesktopSmall:[980,1],
				itemsTablet:[768,1],
				itemsMobile:[650,1],
				itemsMobile:[480,1],
				pagination:true,
				navigation:false,
				slideSpeed:1000,
				autoPlay:false
			});
		/* END TEAM JS */
		
		/* START TESTIMONIAL JS */
			$("#testimonial-slider").owlCarousel({
			    items:2,
				itemsDesktop:[1000,2],
				itemsDesktopSmall:[980,1],
				itemsTablet:[768,1],
				itemsMobile:[650,1],
				pagination:true,
				navigation:false,
				slideSpeed:1000,
				autoPlay:false
			});
		/* END TESTIMONIAL JS */				
				
		
	}); 			
	
	/* START PARALLAX JS */
	(function () {

		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		 
		} else {
			$(window).stellar({
				horizontalScrolling: false,
				responsive: true
			});
		}

	}());
	/* END PARALLAX JS  */			
	
})(jQuery);


  

