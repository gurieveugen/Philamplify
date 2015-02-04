<?php

class Foundations{

	public function __construct()
	{
		add_shortcode('foundations', array(&$this, 'getHTML'));
	}

	public function getHTML()
	{
		$args = array(
			'posts_per_page'   => -1,
			'offset'           => 0,
			'category'         => '',
			'category_name'    => '',
			'orderby'          => 'post_date',
			'order'            => 'DESC',
			'include'          => '',
			'exclude'          => '',
			'meta_key'         => '',
			'meta_value'       => '',
			'post_type'        => 'foundation',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true
		);
		
		$result = array();
		$posts  = get_posts($args);

		if(count($posts))
		{
			foreach ($posts as $p) 
			{
				array_push($result, $this->wrapAssessments($p));
			}
		}
		return implode('', $result);
	}

	public function wrapAssessments($p)
	{
		$link     = get_permalink($p->ID);
		$type     = get_post_meta($p->ID, 'type', true);
		$state    = get_post_meta($p->ID, 'state', true);
		$states   = getStates();
		$location = isset($states[$state]) ? $states[$state] : '';
		$votes    = (int) get_post_meta($p->ID, 'votes', true );

		ob_start();
		?>
		<article class="small-post-whoshould cf" data-url="<?php echo get_permalink($p->ID); ?>" data-title="<?php echo $p->post_title; ?>" data-type="<?php echo $type; ?>" data-state="<?php echo $state; ?>">
			<figure><?php echo $this->getImage($p); ?></figure>
			<div class="txt">
				<header>
					<h2><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->post_title; ?></a></h2>
					<h3><?php echo $type; ?></h3>
					<h4><?php echo $location; ?></h4>
				</header>
				<a href="#" data-id="<?php echo $p->ID; ?>" class="btn-vote">vote</a>
				<footer>
					<ul class="meta-box">
						<li class="votes"><span id="votes-count-<?php echo $p->ID; ?>"><?php echo $votes; ?></span>votes</li>
						<li class="comments"><span id="comments-count-<?php echo $p->ID; ?>">0</span>comments</li>
					</ul>

					<div class="mob"><a href="#" data-id="<?php echo $p->ID; ?>" class="btn-vote">vote</a></div>

					<ul class="share-post">
						<li class="tweet"><a href="https://twitter.com/home?status=<?php echo $link; ?>">tweet</a></li>
						<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link; ?>">facebook</a></li>
						<li class="google"><a href="https://plus.google.com/share?url=<?php echo $link; ?>">google</a></li>
						<li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link; ?>&title=&summary=&source=">linkedin</a></li>
					</ul>
				</footer>
			</div>				
		</article>
		<?php
		
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}

	public function getImage($p)
	{
		if(has_post_thumbnail($p->ID)) return get_the_post_thumbnail($p->ID, 'news-image');
		return '<img src="http://placehold.it/92x92" alt="Placeholder">';
	}
}