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

/**
 * Add twitter account
 */
function addTwitterAccount(obj)
{	
	var count = parseInt(jQuery(obj).parent().find('.twitter-accounts-table').data('count')) + 1;
	var name  = jQuery('.twitter-accounts-table').data('name');
	var numb  = jQuery(obj).parent().parent().find('.widget_number').val();
	name      = name.replace('__i__', numb);
	
	jQuery('.twitter-accounts-table tbody').append(
		'<tr>' +	
		'<td><input class="w100" type="text" name="' + name + '[' + count + '][account]" value=""></td>' +
		'<td><input class="w100" type="text" name="' + name + '[' + count + '][first_name]" value=""></td>' +
		'<td><input class="w100" type="text" name="' + name + '[' + count + '][last_name]" value=""></td>' +
		'<td><input class="w100" type="text" name="' + name + '[' + count + '][picture_name]" value=""></td>' +							
		'</tr>');

	jQuery('.twitter-accounts-table').data('count', count);
	return false;
}

/**
 * Add email account
 */
function addEmailAccount(obj)
{
	var count = parseInt(jQuery(obj).parent().find('.email-accounts-table').data('count')) + 1;
	var name  = jQuery('.email-accounts-table').data('name');
	var numb  = jQuery(obj).parent().parent().find('.widget_number').val();
	name      = name.replace('__i__', numb);
	
	jQuery('.email-accounts-table tbody').append(
		'<tr>' +	
		'<td><input class="w100" type="text" name="' + name + '[' + count + '][account]" value=""></td>' +
		'<td><input class="w100" type="text" name="' + name + '[' + count + '][first_name]" value=""></td>' +
		'<td><input class="w100" type="text" name="' + name + '[' + count + '][last_name]" value=""></td>' +
		'<td><input class="w100" type="text" name="' + name + '[' + count + '][picture_name]" value=""></td>' +							
		'</tr>');

	jQuery('.email-accounts-table').data('count', count);
	return false;	
}