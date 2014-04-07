(function($){
	$(function() {
		
		$( '#nav li:has(ul), .nav-tablet li:has(ul)' ).doubleTapToGo();
		
		$('#ico-menu').click(function() {
			$('.nav-box').toggle();
			$(this).toggleClass('open');
		});
		
		$('.form-poll input[type="radio"], .filters-area select, .form-story select').styler();
		
		$('.data-box .btn-box').click(function(){
			$(this).toggleClass('open');
			$(this).parent().find('.content').slideToggle(200);
			return false;
		});
		
		$('.slider-area .slides').cycle({ 
			fx:     'scrollHorz',
			speed:  500,
			timeout: 0,
			prev: '.slider-area .link-prev',
			next: '.slider-area .link-next',
			pager:  '.slider-area .switcher',
			pagerAnchorBuilder: function(idx, slide) {
				return '.slider-area .switcher li:eq(' + idx + ') a';
			}
		});
		
	});
	
})(jQuery);