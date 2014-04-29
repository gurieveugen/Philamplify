<?php 
	get_header(); 
	the_post();

	$meta            = get_post_meta(get_the_id(), 'meta', true);	
	$recommendations = get_post_meta(get_the_id(), 'recommendations', true);	
	$size            = getFileSize($meta['pdf_url']);
	$options 		 = $GLOBALS['gcoptions']->getAll();
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
						<a href="<?php echo $meta['video_url']; ?>" class="ico-video fancybox-media"></a>
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
			<?php 
			$identifier = intval((get_the_id()*1000000));
			$data_url   = get_permalink().'#!/'.$identifier;
			?>
			<a href="#" class="btn-box" data-identifier="<?php echo $identifier; ?>" data-url="<?php echo $data_url; ?>" >View Full Summary and Key Findings <i class="arrow"></i></a>
			<div class="content">
				<div class="holder cf">
					<?php 						     
						the_content();
					?>					
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
				<?php echo $options['comments_instructions']; ?>
			</div>
			<?php	
		}
		?>
		
	</div>
	<?php get_sidebar(); ?>
</div>

<div class="lightbox">
	<div class="holder">
		<h2>Email Foundation Leadership</h2>
		<form action="#" class="form-efl">
			<div class="row cf">
				<label class="label-left">From:</label>
				<div class="right-column">
					<input type="text" placeholder="First Name" class="width-140 t-col">
					<input type="text" placeholder="Last Name" class="width-140 t-col">
				</div>
			</div>
			<div class="row cf">
				<label class="label-left">Email:</label>
				<div class="right-column">
					<input type="email" placeholder="Email Address" class="width-217">
				</div>
			</div>
			<div class="row cf">
				<label>Tell us what best describes you:</label>
				<div class="row-radio">
					<input type="radio" id="r1" name="n1"><label for="r1">I work at a nonprofit company</label>
				</div>
				<div class="row-radio">
					<input type="radio" id="r2" name="n1"><label for="r2">I work at a foundation</label>
				</div>
				<div class="row-radio">
					<input type="radio" id="r3" name="n1"><label for="r3">I work at a for profit company</label>
				</div>
				<div class="row-radio">
					<input type="radio" id="r4" name="n1"><label for="r4">I work for a news outlet</label>
				</div>
				<div class="row-radio">
					<input type="radio" id="r5" name="n1"><label for="r5">I am a student</label>
				</div>
			</div>
			<div class="row cf">
				<label class="label-left width-70">Subject:</label>
				<div class="right-column width-282">
					<input type="text">
				</div>
			</div>
			<div class="row cf">
				<label class="label-left width-70">Messsage:</label>
				<div class="right-column width-282">
					<textarea cols="30" rows="10"></textarea>
				</div>
			</div>
			<div class="button-holder">
				<input type="submit" value="Submit" class="btn-green">
			</div>
		</form>
	</div>
</div>
<div class="lightbox lb1">
	<div class="holder">
		<h2>Thank you</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed adipiscing dolor eu tincidunt tristique. Nam aliquet turpis <strong>faucibus elit</strong> <em>molestie egestas</em>. Nulla nec dui quis mi molestie euismod at non ipsum. Quisque dolor augue, feugiat dignissim elit sed, malesuada hendrerit lacus.</p>
		<form action="#" class="form-efl efl-1">
			<div class="row cf">
				<label>Tell us what best describes you:</label>
				<div class="row-radio">
					<input type="radio" id="r1" name="n1"><label for="r1">I work at a nonprofit company</label>
				</div>
				<div class="row-radio">
					<input type="radio" id="r2" name="n1"><label for="r2">I work at a foundation</label>
				</div>
				<div class="row-radio">
					<input type="radio" id="r3" name="n1"><label for="r3">I work at a for profit company</label>
				</div>
				<div class="row-radio">
					<input type="radio" id="r4" name="n1"><label for="r4">I work for a news outlet</label>
				</div>
				<div class="row-radio">
					<input type="radio" id="r5" name="n1"><label for="r5">I am a student</label>
				</div>
			</div>
			<div class="button-holder">
				<input type="submit" value="Submit" class="btn-green">
			</div>
		</form>
	</div>
</div>
<div class="lightbox-mask"></div>

<?php get_footer(); ?>