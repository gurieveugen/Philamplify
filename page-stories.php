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
	<a href="#" class="btn-submit-stories">
		<img src="<?php echo TDU; ?>/images/ico-story.png" alt="">
		Submit your own stories!
	</a>
	<div class="filters-area">
		<strong class="title">Filter</strong>
		<div class="item">
			<label class="mobile-hide-dib">Media Type:</label>
			<ul class="icons">
				<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-text.png" alt=""></a></li>
				<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-vdeo.png" alt=""></a></li>
				<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-photo.png" alt=""></a></li>
			</ul>
		</div>
		<div class="item">
			<label class="mobile-hide-dib">State:</label>
			<select name="state" class="select-state">
				<option value="NY">NY</option>
				<option value="NY">NY</option>
				<option value="NY">NY</option>
				<option value="NY">NY</option>
				<option value="NY">NY</option>
			</select>
		</div>
		<div class="item">
			<label class="mobile-hide-dib">Industry:</label>
			<select name="industry" class="select-industry">
				<option value="Education">Education</option>
				<option value="Education">Education</option>
				<option value="Education">Education</option>
				<option value="Education">Education</option>
				<option value="Education">Education</option>
			</select>
		</div>
	</div>
	<div class="stories-list cf">
		<article class="box-story">
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
		</article>
	</div>
	<div class="btn-more-holder">
		<a href="#" class="btn-green">More Stories</a>
	</div>
</div>
<?php get_footer(); ?>