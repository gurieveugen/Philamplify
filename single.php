<?php
/**
 *
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>
<header class="page-title">
	<div class="holder">
		<div class="center-wrap">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</header>
<div id="main" class="center-wrap cf">
	<article id="content" class="cf">
	
	<?php if ( have_posts() ) : the_post(); ?>
	<?php
		$post_categories = wp_get_post_categories(get_the_id(), array('fields' => 'all'));		
		if($post_categories)
		{
			foreach ($post_categories as $cat) 
			{
				$cats[] = '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';
			}	
		}
	?>
		<p class="entry-meta">
			Posted on <?php the_date() ?> in <?php echo implode(', ', $cats); ?> <!-- <a href="#">Category Name</a> -->
		</p>
		<?php the_content(); ?>
		<div class="comments-section">
			<?php comments_template(); ?>
			<!-- <img src="<?php echo TDU; ?>/images/temp-comments.png" alt=""> -->
		</div>
	
	<?php endif; ?>
	
	</article>

	<?php get_sidebar('blog'); ?>
</div>
<?php get_footer(); ?>