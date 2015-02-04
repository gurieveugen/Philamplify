function Filter()
{
	var $this = this;
	$this.container = jQuery('.main-content');
	$this.items     = $this.container.children('article');

	/**
	 * Sort articles ASC mode
	 */
	$this.sort = function(type){
		if(type == 'Sort A to Z')
		{
			$this.items.sort(
				function(a, b){
					var an = a.getAttribute('data-title'),
						bn = b.getAttribute('data-title');
					
					if(an > bn) {
						return 1;
					}
					if(an < bn) {
						return -1;
					}
					return 0;
				}
			);	
		}
		else
		{
			$this.items.sort(
				function(a, b){
					var an = a.getAttribute('data-title'),
						bn = b.getAttribute('data-title');
					
					if(an > bn) {
						return -1;
					}
					if(an < bn) {
						return 1;
					}
					return 0;
				}
			);	
		}
		
		$this.items.detach().appendTo($this.container);
	};

	$this.filterState = function(state){
		$this.items.show();
		if(state == 'ALL') return true;
		$this.items.each(function(){
			if(jQuery(this).data('state') != state) jQuery(this).hide();
		});
	};

	$this.filterType = function(type){
		$this.items.show();
		if(type == 'All Foundation Types') return true;
		$this.items.each(function(){
			if(jQuery(this).data('type') != type) jQuery(this).hide();
		});
	};
}


jQuery(document).ready(
	function(){
		var filter = new Filter();

		jQuery('#sort').on('change', function(){ filter.sort( jQuery(this).val() ); });
		jQuery('#state').on('change', function(){ filter.filterState( jQuery(this).val() ); });
		jQuery('#type').on('change', function(){ filter.filterType( jQuery(this).val() ); });
	}
);