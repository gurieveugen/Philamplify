<?php
/*
 * @package WordPress
 * Template Name: Stories Page
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
<div class="main-stories center-wrap cf">
	<a href="<?php bloginfo('url'); ?>/share-your-story" class="btn-submit-stories">
		<img src="<?php echo TDU; ?>/images/ico-story.png" alt="">
		Submit your own stories!
	</a>
	<div class="filters-area">
		<strong class="title">Filter</strong>
		<div class="item">
			<label class="mobile-hide-dib">Media Type:</label>
			<ul class="icons filter-icons">
				<li><a href="#" class="selected" data-id="filter-text" data-selected="<?php echo TDU; ?>/images/ico-text-selected.png" data-notselected="<?php echo TDU; ?>/images/ico-text.png"><img src="<?php echo TDU; ?>/images/ico-text-selected.png" alt=""></a></li>
				<li><a href="#" class="selected" data-id="filter-video" data-selected="<?php echo TDU; ?>/images/ico-vdeo-selected.png" data-notselected="<?php echo TDU; ?>/images/ico-vdeo.png"><img src="<?php echo TDU; ?>/images/ico-vdeo-selected.png" alt=""></a></li>
				<li><a href="#" class="selected" data-id="filter-photo" data-selected="<?php echo TDU; ?>/images/ico-photo-selected.png" data-notselected="<?php echo TDU; ?>/images/ico-photo.png"><img src="<?php echo TDU; ?>/images/ico-photo-selected.png" alt=""></a></li>
			</ul>
			<div class="filters hide">
				<input type="checkbox" id="filter-text" name="text" value="text" checked>
				<input type="checkbox" id="filter-video" name="video" value="video" checked>
				<input type="checkbox" id="filter-photo" name="photo" value="photo" checked>
			</div>
			<!-- PRELOAD IMAGES -->
			<div class="hide">
				<img src="<?php echo TDU; ?>/images/ico-text.png" alt="">
				<img src="<?php echo TDU; ?>/images/ico-vdeo.png" alt="">
				<img src="<?php echo TDU; ?>/images/ico-photo.png" alt="">				
			</div>
		</div>
		<div class="item">
			<label class="mobile-hide-dib">State:</label>
			<?php $states = array_merge(array('ALL' => 'ALL'), getStates()); ?>
			<select name="state" class="select-state">
				<?php
				foreach ($states as $key => $value) 
				{
					?>
					<option value="<?php echo $key; ?>"><?php echo $key; ?></option>
					<?php
				}
				?>
			</select>
		</div>
		<div class="item">
			<label class="mobile-hide-dib">Issue:</label>
			<select name="industry" class="select-industry">
				<option value="-1">Your Issue</option>
				<?php 
				$assessments_options = $GLOBALS['assessments_options']->getAll();
				$industry            = $assessments_options['industry'];
				if($industry)
				{
					foreach ($industry as $key => &$value) 
					{
						?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php
					}
				}
				?>
			</select>
		</div>
	</div>
	<div class="stories-list cf">
		<?php 
		$options = $GLOBALS['gcoptions']->getAll();
		$items   = $GLOBALS['sotries']->getItems(array('posts_per_page' => intval($options['stories_count']))); 		
		echo $GLOBALS['sotries']->wrapItems($items);
		?>
		<!-- <article class="box-story">
			<img src="<?php echo TDU; ?>/images/img-3.jpg" alt="">
			<div class="text-media">
				<h1>Media Title</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id porttitor nunc. In vitae lobortis elit, vitae tincidunt risus. Fusce eu lorem vel turpis dictum tristique non et.</p>
				<em class="meta">Shared by First Last on 3/14/14</em>
			</div>
		</article>
		<article class="box-story">
			<img src="<?php echo TDU; ?>/images/img-4.jpg" alt="">
			<div class="text-media">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
				<em class="meta">Shared by First Last on 3/14/14</em>
			</div>
		</article>
		<article class="box-story">
			<iframe width="352" height="198" src="//www.youtube.com/embed/9ZDkItO-0a4" frameborder="0" allowfullscreen></iframe>
			<div class="text-media">
				<em class="meta">Shared by First Last on 3/14/14</em>
			</div>
		</article>
		<article class="box-story">
			<div class="text">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id porttitor nunc. In vitae lobortis elit, vitae tincidunt risus. Fusce eu lorem vel turpis dictum tristique non et erat. Nulla fringilla justo ac mauris dignissim rutrum vitae ac lacus. Aenean rhoncus ipsum porta enim volutpat, blandit bibendum tortor</p>
				<em class="meta">Shared by First Last on 3/14/14</em>
			</div>
		</article>
		<article class="box-story">
			<div class="text">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id porttitor nunc. In vitae lobortis elit, vitae tincidunt risus. Fusce eu lorem vel turpis dictum tristique non et erat. Nulla fringilla justo ac mauris dignissim rutrum vitae ac lacus. Aenean rhoncus ipsum porta enim volutpat, blandit bibendum tortor</p>
				<em class="meta">Shared by First Last on 3/14/14</em>
			</div>
		</article>
		<article class="box-story">
			<img src="<?php echo TDU; ?>/images/img-5.jpg" alt="">
			<div class="text-media">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id porttitor nunc. In vitae lobortis elit, vitae tincidunt risus. Fusce eu lorem vel turpis dictum tristique non et.</p>
				<em class="meta">Shared by First Last on 3/14/14</em>
			</div>
		</article>
		<article class="box-story">
			<iframe width="352" height="198" src="//www.youtube.com/embed/9ZDkItO-0a4" frameborder="0" allowfullscreen></iframe>
			<div class="text-media">
				<em class="meta">Shared by First Last on 3/14/14</em>
			</div>
		</article>
		<article class="box-story">
			<img src="<?php echo TDU; ?>/images/img-3.jpg" alt="">
			<div class="text-media">
				<h1>Media Title</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id porttitor nunc. In vitae lobortis elit, vitae tincidunt risus. Fusce eu lorem vel turpis dictum tristique non et.</p>
				<em class="meta">Shared by First Last on 3/14/14</em>
			</div>
		</article>
		<article class="box-story">
			<div class="text">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id porttitor nunc. In vitae lobortis elit, vitae tincidunt risus. Fusce eu lorem vel turpis dictum tristique non et erat. Nulla fringilla justo ac mauris dignissim rutrum vitae ac lacus. Aenean rhoncus ipsum porta enim volutpat, blandit bibendum tortor</p>
				<em class="meta">Shared by First Last on 3/14/14</em>
			</div>
		</article> -->
	</div>
	<div class="btn-more-holder">
		<a href="#" class="btn-green more-stories-ajax">More Stories</a>
	</div>
</div>
<?php get_footer(); ?>