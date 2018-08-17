/*
Theme Name: Beautyspa
Description: Used for custom js.
*/

// photobos js
	jQuery('.port_gallery').photobox('.photobox_a');
	jQuery
	('.port_gallery').photobox('.photobox_a:first', { thumbs:false, time:0 }, imageLoaded);
	function imageLoaded(){
		console.log('image has been loaded...');
	}
	
/* Menu Js */
jQuery(document).ready(function() {
	if( jQuery(window).width() > 767) {
	   jQuery('.nav li.dropdown').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	   jQuery('.nav li.dropdown-submenu').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	}
	
	jQuery('li.dropdown').find('.fa-angle-down').each(function(){
		jQuery(this).on('click', function(){
			if( jQuery(window).width() < 767) {
				jQuery(this).parent().next().slideToggle();
			}
			return false;
		});
	});
});
/* Menu Js */

/* PortFolio */
jQuery(document).ready( function(){
  jQuery('.blog_gallery').photobox('.photobox_a');
	jQuery('.blog_gallery').photobox('.photobox_a:first', { thumbs:false, time:0 }, imageLoaded);
	function imageLoaded(){
		console.log('image has been loaded...');
	}
});

jQuery(document).ready( function(){
	/* slider */
	 var swiper = new Swiper('.home-slider', {
        pagination: '.swiper-pagination1',
		nextButton: '.swiper-button-next1',
        prevButton: '.swiper-button-prev1',
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 30,
		autoplay: 2500,
		loop:true
    });
	
	/* Tesimonail */
var swiper = new Swiper('.home-testimonial', {
        pagination: '.swiper-pagination2',
		nextButton: '.swiper-button-next2',
        prevButton: '.swiper-button-prev2',
        slidesPerView: 1,
        slidesPerColumn: 2,
        paginationClickable: true,
		breakpoints: {
            1024: {
                slidesPerColumn: 2,
                spaceBetween: 40
            },
            768: {
                slidesPerColumn: 2,
                spaceBetween: 30
            },
            640: {
                slidesPerColumn: 1,
                spaceBetween: 20
            },
            320: {
                slidesPerColumn: 1,
                spaceBetween: 10
            }
        }
		/* autoplay: 2500 */
    });
	
});
//parallax js
	jQuery(document).ready(function() {
	jQuery('.portfolio-background').parallax("50%", 0.4);
	jQuery('.testimonail-background').parallax("50%", 0.4);
	});
	
//sticky header
jQuery(document).ready(function () {	
		jQuery(window).scroll(function () {
			if( jQuery(window).width() < 481) {
				if (jQuery(this).scrollTop() > 400) {
					jQuery('#site-header').addClass('sticky-header');
				}else {
					jQuery('#site-header').removeClass('sticky-header');
				}
			}else{
				if (jQuery(this).scrollTop() > 150) {
					jQuery('#site-header').addClass('sticky-header');
				}else {
					jQuery('#site-header').removeClass('sticky-header');
				}
			}
		});
	});
	
	