function Votes(){
	var $me = this;

	/**
	 * Vote for this post
	 * @param  Integer post_id --- post id
	 * @return Boolean --- false if not Voted | true if try Voted
	 */
	$me.vote = function(post_id){
		var url = default_settings.ajaxurl + '?action=vote';

		if($me.isVote(post_id))
		{
			alert('Thank You! You have already voted for this post.');
			return false;
		}

		jQuery.ajax({
			type: 'POST',
			url: url,
			data: { post_id: post_id },
			dataType: 'json',
			success: function (result) {
				console.log(result);
				if(result.status == 'OK')
				{
					jQuery.cookie('vote-' + post_id, true);
					$me.incrementCount(post_id);
					$me.showSuccessDialog();	
				}
			}
		});
		return true;
	};

	/**
	 * Show success dialog
	 */
	$me.showSuccessDialog = function(){
		jQuery.fancybox.helpers.overlay.open({parent: jQuery('body')});
		jQuery.fancybox.open(
			[jQuery('#lightbox-success-vote')], 
			{
				padding:  0, 
				wrapCSS:  'lightbox-custom', 
				maxWidth: 600 
			}
		);
	};

	/**
	 * Check is vote
	 * @param  integer post_id --- post id
	 * @return Boolean --- true if yes | false if not
	 */
	$me.isVote = function(post_id){
		if(typeof(jQuery.cookie('vote-' + post_id)) == 'undefined') return false;
		return true;
	};

	/**
	 * Increment dom element count
	 * @param  Integer post_id --- post id
	 */
	$me.incrementCount = function(post_id){
		var $el   = jQuery('#votes-count-' + post_id);
		var count = parseInt($el.text())+1;
		
		$el.text(count);
	};
}

jQuery(document).ready(
	function(){
		var votes = new Votes();

		jQuery('.btn-vote').on(
			'click', 
			function(e){
				e.preventDefault();
				votes.vote(jQuery(this).data('id'));
			}
		);
	}
);