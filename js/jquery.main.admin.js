(function($){
	$(function() {
		// =========================================================
		// DELETE ALL SUBSCRIBERS
		// =========================================================
		$('#reset-subscribers').click(function(e){	
			var result = confirm("Are you sure want to delete all subscribers?");
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

		// =========================================================
		// ADD RECOMMENDATION
		// =========================================================
		$('.add-recommendation').click(function(e){
			var count = $('.recommendation-table').data('count') + 1;
			$('.recommendation-table tbody').append(
				'<tr>' +
				'<td>' + count + '</td>' +
				'<td><input type="text" name="recommendations[' + count + '][title]" value="" class="w100">' + '</td>' +
				'<td><textarea name="recommendations[' + count + '][content]" class="w100"></textarea>' + '</td>' +
				'<td>0</td>' +
				'<td>0</td>' +
				'<td>0</td>' +
				'</tr>');

			$('.recommendation-table').data('count', count);
			e.preventDefault();
		});
		// =========================================================
		// Remove recommendation
		// =========================================================
		$('.remove-recommendation').click(function(e){
			var result = confirm("Are you sure want to delete this item?");
			if (result == true) 
			{
				$(this).parent().parent().remove();
			}
			e.preventDefault();
		});
		
	});	
})(jQuery);