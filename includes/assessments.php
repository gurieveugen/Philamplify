<?php

class Assessments{
	public function __construct()
	{
		add_shortcode('assessments', array(&$this, 'getHTML'));
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
		ob_start();
		?>
		<article class="small-post-assessments cf" data-url="<?php echo get_permalink($p->ID); ?>">
			<header>
				<h2><a href="<?php echo get_permalink($p->ID); ?>"><?php echo $p->post_title; ?></a></h2>
			</header>
			<?php if(has_post_thumbnail($p->ID)) : ?>
			<figure><?php echo get_the_post_thumbnail($p->ID); ?></figure>
			<?php endif; ?>
			<div class="txt">
				<p><?php echo $p->post_excerpt; ?></p>
			</div>
			<footer>
				<ul class="share-post">
					<li class="tweet"><a href="#">tweet</a></li>
					<li class="facebook"><a href="#">facebook</a></li>
					<li class="google"><a href="#">google</a></li>
					<li class="linkedin"><a href="#">linkedin</a></li>
				</ul>

				<span class="comment-link"><a href="#">3 Comments</a></span>
			</footer>
		</article>
		<?php
		
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}
}