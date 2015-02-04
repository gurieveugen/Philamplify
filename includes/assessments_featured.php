<?php

class AssessmentsFeatured{
	public function __construct()
	{
		add_shortcode('assessments-featured', array(&$this, 'getHTML'));
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
			'post_type'        => 'assessment',
			'post_mime_type'   => '',
			'post_parent'      => '',
			'post_status'      => 'publish',
			'suppress_filters' => true,
			'meta_query' => array(
				array(
					'key'     => 'featured',
					'value'   => '"yes"', 
					'compare' => 'LIKE'
				)
			)
		);
		
		$result = array();
		$posts  = get_posts($args);

		if(count($posts))
		{
			array_push($result, $this->wrapAssessments($posts[0]));
		}
		return implode('', $result);
	}

	public function wrapAssessments($p)
	{
		$link = get_permalink($p->ID);
		ob_start();
		?>
		<article class="big-post-assessments cf">
			<div class="txt">
				<header>
					<h3><a href="<?php echo get_permalink($p->ID); ?>">Featured</a></h3>
					<h2><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->post_title; ?></a></h2>
				</header>
				<p><?php echo $p->post_excerpt; ?></p>
				<footer>
					<ul class="share-post">
						<li class="tweet"><a href="https://twitter.com/home?status=<?php echo $link; ?>">tweet</a></li>
						<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link; ?>">facebook</a></li>
						<li class="google"><a href="https://plus.google.com/share?url=<?php echo $link; ?>">google</a></li>
						<li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link; ?>&title=&summary=&source=">linkedin</a></li>
					</ul>
					
					<span class="comment-link"><a href="#">3 Comments</a></span>
				</footer>
			</div>
			
			<?php echo $this->getVideoBox($p); ?>
			<footer class="table">
				<ul class="share-post">
					<li class="tweet"><a href="https://twitter.com/home?status=<?php echo $link; ?>">tweet</a></li>
						<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link; ?>">facebook</a></li>
						<li class="google"><a href="https://plus.google.com/share?url=<?php echo $link; ?>">google</a></li>
						<li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link; ?>&title=&summary=&source=">linkedin</a></li>
				</ul>
				
				<span class="comment-link"><a href="#">3 Comments</a></span>
			</footer>
		</article>
		<?php
		
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}

	public function getVideoBox($p)
	{
		$result = '';
		$meta   = get_post_meta($p->ID, 'meta', true);	
		if(has_post_thumbnail($p->ID))
		{
			ob_start();
			?>
			<figure>
				<div class="video-box">
					<?php echo get_the_post_thumbnail($p->ID, 'assessment-image'); ?>
					<a href="<?php echo $meta['video_url']; ?>" class="ico-video fancybox-media"></a>
				</div>
			</figure>
			<?php
			
			$result = ob_get_contents();
			ob_end_clean();
		}
		return $result;
	}
}