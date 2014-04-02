<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>

<?php if ( have_posts() ) : ?>

<div class="posts-holder">
<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<div class="holder cf">
			<a href="<?php the_permalink(); ?>" class="image">
				<img src="<?php echo TDU; ?>/images/img-2.jpg" class="tablet-hide" alt="">
				<img src="<?php echo TDU; ?>/images/img-2-tablet.jpg" class="tablet-visible" alt="">
			</a>
			<div class="content">
				<?php the_excerpt(); ?>
			</div>
		</div>
		<div class="post-meta-holder">
			<ul class="post-meta cf">
				<li class="date"><?php the_date(); ?></li>
				<?php 
				if($categories = get_the_category()){
					foreach($categories as $category) {
						echo '<li><a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a></li>';
					}
				}
				?>
				<li><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></li>
			</ul>
		</div>
		
	</article><!-- #post -->

<?php endwhile; ?>
</div> <!-- .posts-holder -->
	
<?php theme_paging_nav(); ?>

<?php else: ?>
	
	<h1 class="page-title"><?php _e( 'Nothing Found', 'theme' ); ?></h1>
	
	<div class="page-content">

		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'theme' ); ?></p>
		<?php get_search_form(); ?>

	</div><!-- .page-content -->
	
<?php endif; ?>