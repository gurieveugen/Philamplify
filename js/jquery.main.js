(function($){
	$(function() {
		
		$( '#nav li:has(ul), .nav-tablet li:has(ul)' ).doubleTapToGo();
		
		$('#ico-menu').click(function() {
			$('.nav-box').toggle().toggleClass('open');
			$(this).toggleClass('open');
		});
		
		$('.form-poll input[type="radio"], .yop-poll-widget input[type="radio"], .filters-area select, .form-story select, .select-socials-filter').styler();
		
		$('.data-box .btn-box').click(function(){
			$(this).toggleClass('open');
			$(this).parent().find('.content').slideToggle(200);
			return false;
		});

		$('.r-box .cf .link-view').click(function(e){
			$(this).parent().parent().toggleClass('open');
			if($(this).parent().parent().hasClass('open'))
			{
				$(this).parent().parent().find('.content').slideDown(200);
			}
			else
			{
				$(this).parent().parent().find('.content').slideUp(200);
			}
			e.preventDefault();
		});
		
		$('.slider-area .slides').cycle({ 
			fx:     'scrollHorz',
			speed:  500,
			timeout: 0,
			prev: '.slider-area .link-prev',
			next: '.slider-area .link-next'			
		});

		$('.mainslides').cycle({ 
			fx:     'scrollHorz',
			speed:  500,
			timeout: 0,
			pager:  '.slider-area .switcher',
			pagerAnchorBuilder: function(idx, slide) {
				return '.slider-area .switcher li:eq(' + idx + ') a';
			}
		});

		// =========================================================
		// Subscribe AJAX
		// =========================================================
		$('.form-subscribe-ajax').submit(function(e){			
			jQuery.ajax({
    			type: "POST",
    			url: default_settings.ajaxurl + '?action=subscribe',
    			dataType: 'json',
    			data: $(this).serialize(),    			
    			success: function(data){    				
    				alert(data.msg);
    			}
    		});
			e.preventDefault();
		});
		// =========================================================
		// MORE STORIES AJAX
		// =========================================================
		$('.more-stories-ajax').click(function(e){			
			var offset = default_settings.stories_count * default_settings.more_count;
			jQuery.ajax({
    			type: "POST",
    			url: default_settings.ajaxurl + '?action=moreStories',
    			dataType: 'json',
    			data: { offset: offset},    			
    			success: function(data){   
    				if(data.result)
    				{
    					var append_html = $(data.html);
    					default_settings.more_count++;   

    					$(default_settings.stories_container).append(append_html);
    					setTimeout(function() { $(default_settings.stories_container).masonry('appended', append_html, true); }, 1000);
    				} 				    				
    			}
    		});
			e.preventDefault();
		});
		// =========================================================
		// AGREE AJAX
		// =========================================================
		$('.btn-agree').click(function(e){	
			var info = $(this).parent().parent().find('.info');						
			jQuery.ajax({
    			type: "POST",
    			url: default_settings.ajaxurl + '?action=agreeDisagree',
    			dataType: 'json',    	
    			data: {
    				type: 'agree',
    				post_id: $(this).parent().data('postId'),
    				recommendation_id: $(this).parent().data('id')
    			},		
    			success: function(data){       				
    				info.html('<p class="info"><strong>' + data.percent + '%</strong> of ' + data.sum + ' people <strong class="blue">AGREE</strong></p>');    				
    				alert(data.msg);
    			}
    		});
			e.preventDefault();
		});
		// =========================================================
		// DISAGREE AJAX
		// =========================================================
		$('.btn-disagree').click(function(e){
			var info = $(this).parent().parent().find('.info');						
			jQuery.ajax({
    			type: "POST",
    			url: default_settings.ajaxurl + '?action=agreeDisagree',
    			dataType: 'json',    
    			data: {
    				type: 'disagree',
    				post_id: $(this).parent().data('postId'),
    				recommendation_id: $(this).parent().data('id')
    			},					
    			success: function(data){  
    				info.html('<p class="info"><strong>' + data.percent + '%</strong> of ' + data.sum + ' people <strong class="blue">AGREE</strong></p>');    				
    				alert(data.msg); 				
    			}
    		});
			e.preventDefault();
		});

		// =========================================================
		// OPEN IN NEW WINDOW SOCIAL SHARE
		// =========================================================
		$('.social-share-buttons li a').click(function(e){
			window.open($(this).attr('href'),'displayWindow', 'width=700,height=400,left=200,top=100,location=no, directories=no,status=no,toolbar=no,menubar=no');
			e.preventDefault();
		});

		// =========================================================
		// MASONRY BRICS
		// =========================================================		
		$(window).load(function(){ 
			$('.stories-list').multipleFilterMasonry({
			  itemSelector: '.box-story',
			  filtersGroupSelector:'.filters'
			});
		});
		// =========================================================
		// FILTER CLICK
		// =========================================================
		$('.filter-icons li a').click(function(e){
			var id          = '#' + $(this).data('id');
			var selected    = $(this).data('selected');
			var notselected = $(this).data('notselected');
			
			$(id).trigger('click');
			$(this).toggleClass('selected');
			
			if($(this).hasClass('selected'))
			{
				$(this).html('<img src="' + selected + '" alt="" />');
			}
			else
			{
				$(this).html('<img src="' + notselected + '" alt="" />');
			}
			e.preventDefault();
		});
		// =========================================================
		// SUBMIT STORY
		// =========================================================
		$('.form-share-story-ajax').submit(function(e){
			if(!$(this).find('[name=i_agree]').prop("checked"))
			{
				e.preventDefault();
				alert('You did not agree with Terms of Use and Privacy Policy!');
			}
		});
	});
	
})(jQuery);