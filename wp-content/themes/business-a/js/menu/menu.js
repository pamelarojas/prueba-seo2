jQuery(document).ready(function($) {
		
		var window_width = $(window).width();

		if ( window_width >= 768 ) {
		    $('.nav li.dropdown').hover(function() {
			   $(this).addClass('open');
		   }, function() {
			   $(this).removeClass('open');
		   });
		}
		
		// Fix for Bootstrap Navwalker
		$('.navbar .dropdown > a').click(function(){
			event.preventDefault();
			event.stopPropagation();
			$(this).find('.fa').toggleClass('fa-caret-up');
			$(this).parent('li').toggleClass('open');
		});
});
	
	  