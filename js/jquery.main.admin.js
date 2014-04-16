(function($){
	$(function() {
		// =========================================================
		// DELETE ALL SUBSCRIBERS
		// =========================================================
		$('#reset-subscribers').click(function(e){	
			var result = confirm("Are you sure you want to delete all subscribers?");
			if (result == true) 
			{
				jQuery.ajax({
					type: "POST",
					url: default_settings.ajaxurl + '?action=resetSubscribers',
					dataType: 'json',
					success: function(data)
					{
						if(data.empty == true)
						{
							location.reload(true);
						}
					}
				});    
			}
			
			e.preventDefault();
		});
		
	});	
})(jQuery);