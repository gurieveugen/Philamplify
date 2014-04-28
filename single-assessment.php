<?php 
	get_header(); 
	the_post();
	$meta            = get_post_meta(get_the_id(), 'meta', true);
	$recommendations = get_post_meta(get_the_id(), 'recommendations', true);	
	$size            = getFileSize($meta['pdf_url']);
?>
<div class="data-section">
	<div class="holder">
		<div class="center-wrap">
			<h1><?php the_title(); ?></h1>
			<div class="block cf">
				<?php
				if(has_post_thumbnail())
				{
					?>
					<div class="video-box">
						<?php the_post_thumbnail('assessment-image'); ?>
						<a href="<?php echo $meta['video_url']; ?>" class="ico-video"></a>
					</div>
					<?php
				}
				?>
				<div class="quotes-holder">
					<blockquote class="box-quote">
						<q>“<?php echo $meta['quote_first']; ?>”</q>
						<cite>-- <a href="<?php echo $meta['qf_source_url']; ?>"><?php echo $meta['qf_source']; ?></a></cite>
					</blockquote>
					<blockquote class="box-quote q1">
						<q>“<?php echo $meta['quote_second']; ?>”</q>
						<cite>-- <a href="<?php echo $meta['qs_source_url']; ?>"><?php echo $meta['qs_source']; ?></a></cite>
					</blockquote>
				</div>
			</div>
			<div class="btn-download-row">
				<a href="<?php echo $meta['pdf_url']; ?>" class="btn-green-big">Download the Full Assessment</a>
				<span class="file-info"><?php echo $size; ?>kb PDF Document</span>
			</div>
		</div>
	</div>
</div>
<div id="main" class="center-wrap cf">
	<div id="content" class="main-content content-1 cf">
		<h2 class="title-blue">Overview</h2>
		<?php      
			the_excerpt();
		?>
		<div class="data-box">
			<a href="#" class="btn-box">View Full Summary and Key Findings <i class="arrow"></i></a>
			<div class="content">
				<div class="holder cf">
					<?php 						     
						the_content();
					?>
					<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra vehicula auctor. Suspendisse eu leo odio. Donec dui neque, luctus nec congue non, tempor sit amet urna. Sed ligula est, faucibus a nibh eget, viverra. commodo lacus. Donec non ipsum a quam rhoncus iaculis eu vitae est.</p>
					<h3>Key Findings</h3>
					<ol>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra vehicula auctor. Suspendisse eu leo.      Donec dui neque, luctus nec congue non, tempor sit amet urna. Sed ligula est, faucibus a nibh eget, viverra.       commodo lacus. Donec non ipsum a quam rhoncus iaculis eu vitae est.</li>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra vehicula auctor. Suspendisse eu leo.      Donec dui neque, luctus nec congue non, tempor sit amet urna. Sed ligula est, faucibus a nibh eget, viverra.       commodo lacus. Donec non ipsum a quam rhoncus iaculis eu vitae est.</li>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra vehicula auctor. Suspendisse eu leo.      Donec dui neque, luctus nec congue non, tempor sit amet urna. Sed ligula est, faucibus a nibh eget, viverra.       commodo lacus. Donec non ipsum a quam rhoncus iaculis eu vitae est.</li>
					</ol> -->
				</div>
			</div>
		</div>
		<h2 class="title-blue">Recommendations</h2>
		<?php 		
		foreach ($recommendations as $id => $recommendation) 
		{
			$star       = (intval($recommendation['featured'])) ? 'star' : '';
			$agree      = intval($recommendation['agree']);
			$disagree   = intval($recommendation['disagree']);
			$sum        = $agree + $disagree;
			$percent    = ($agree > 0 && $sum > 0) ? intval($agree/($sum/100)) : 0;
			$identifier = intval((get_the_id()*1000000)  + $id);
			$data_url   = get_permalink().'#!/'.$identifier;
			?>
			<article class="r-box" id="r-box-<?php echo $id; ?>">
				<header class="cf">
					<h1 class="<?php echo $star; ?>"><?php echo $recommendation['title']; ?></h1>
					<a href="#" class="link-view">View Full Recommendation</a>
				</header>
				<div class="content">
					<div class="holder cf">
						<?php echo $recommendation['content']; ?>
					</div>
				</div>
				<footer class="cf">
					<div class="buttons cf" data-id="<?php echo $id; ?>" data-post-id="<?php echo get_the_id(); ?>">
						<a href="#" class="btn-agree">AGREE</a>
						<a href="#" class="btn-disagree">DISAGREE</a>
					</div>
					<a href="#" class="link-comments mobile-hide"  data-id="<?php echo $id; ?>" data-identifier="<?php echo $identifier; ?>" data-url="<?php echo $data_url; ?>">0 Comments</a>
					<p class="info"><strong><?php echo $percent; ?>%</strong> of <?php echo $sum; ?> people <strong class="blue">AGREE</strong></p>
					<a href="#" class="link-comments mobile-visible-dib" data-id="<?php echo $id; ?>" data-identifier="<?php echo $identifier; ?>" data-url="<?php echo $data_url; ?>">0 Comments</a>
				</footer>
			</article>
			<div id="r-comments-<?php echo $id; ?>" class="r-comments">				
			</div>
			<?php	
		}
		?>
		
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>