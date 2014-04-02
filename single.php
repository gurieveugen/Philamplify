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
		
		<p class="entry-meta">
			Posted on <?php the_date() ?> in <a href="#">Category Name</a>
		</p>
		<?php the_content(); ?>
		<div class="comments-section">
			<img src="<?php echo TDU; ?>/images/temp-comments.png" alt="">
		</div>
	
	<?php endif; ?>
	
	</article>

	<?php get_sidebar('blog'); ?>
</div>
<?php get_footer(); ?>