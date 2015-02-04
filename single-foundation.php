<?php
/*
 * @package WordPress
 * Template Name: Crowdsourcing Page Step 3
*/
?>
<?php get_header(); ?>
<?php the_post(); ?>
<?php
$type       = get_post_meta(get_the_id(), 'type', true);
$state      = get_post_meta(get_the_id(), 'state', true);
$states     = getStates();
$location   = isset($states[$state]) ? $states[$state] : '';
$subtitle   = get_field('subtitle', get_the_id(), true);
$quote      = get_field('quote', get_the_id(), true);
$quote_link = get_field('quote_link', get_the_id(), true);
?>
<header class="page-title">
	<div class="holder">
		<div class="center-wrap">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</header>
	<div class="votes-widget cf">	
		<ul class="meta-box cf">
			<li class="votes"><span>25</span>votes</li>
			<li class="comments"><span>3</span>comments</li>
		</ul>
		<a href="#" class="btn-vote">vote for <br>this foundation <span>to be philamplified</span></a>
	</div>
		
	<div id="main" class="center-wrap foundation-form-page cf">		
	  <div id="content" class="main-content cf">

		  <article class="foundation-post cf">
		  	<figure>
		  	<?php
		  	if(has_post_thumbnail())
		  	{
		  		the_post_thumbnail('foundation-image');
		  	}
		  	else
		  	{
		  		?>
		  		<img src="http://placehold.it/620x414" alt="Placeholder">
		  		<?php
		  	}
		  	?>
		  	</figure>
				<h2><?php echo $subtitle; ?></h2>
				<blockquote>
					<p><?php echo $quote; ?>  <cite>-- <a href="<?php echo $quote_link; ?>">Quote Source</a></cite></p>
				</blockquote>
				<h2>Foundation Type</h2>
				<p><?php echo $type; ?></p>
				<h2>Location</h2>
				<p><?php echo $location; ?></p>
				<h2>Overview/Mission Statement</h2>
				<?php the_content(); ?>
			</article>
			<div id="disqus_thread"></div>
			<script type="text/javascript">
		        (function() {
		            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
		            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
		            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		        })();
		    </script>
		</div>
		
		<?php get_sidebar('assessment'); ?>
	  </div>
	</div>	

<?php get_footer(); ?>