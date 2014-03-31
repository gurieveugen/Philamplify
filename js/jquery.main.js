(function($){
	$(function() {
		
		$( '#nav li:has(ul), .nav-tablet li:has(ul)' ).doubleTapToGo();
		
		$('#ico-menu').click(function() {
			$('.nav-box').toggle();
			$(this).toggleClass('open');
		});
		
		$('.form-poll input[type="radio"]').styler();
		
	});
	
})(jQuery);