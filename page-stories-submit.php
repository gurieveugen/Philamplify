<?php
/*
 * @package WordPress
 * Template Name: Stories Submit Page
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
	<div class="content-box cf">
		<h2>Share Your Story and Upload Media</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra vehicula auctor. Suspendisse eu leo odio. Donec dui neque, luctus nec congue non, tempor sit amet urna. Sed ligula est, faucibus a nibh eget, viverra commodo lacus. Donec non ipsum a quam rhoncus iaculis eu vitae est.</p>
		<form action="#" class="form-story">
			<h4>
				<img src="<?php echo TDU; ?>/images/icon-person-mini.png" class="pc-visible-dib" alt="">
				<img src="<?php echo TDU; ?>/images/icon-person.png" class="pc-hide-dib" alt="">
				Tell us about yourself
			</h4>
			<div class="row cf">
				<div class="column width-140">
					<input type="text" placeholder="First Name">
				</div>
				<div class="column width-140">
					<input type="text" placeholder="Last Name">
				</div>
				<div class="column width-175 last">
					<input type="email" placeholder="Email Address">
				</div>
			</div>
			<div class="row-1 cf">
				<div class="column width-125">
					<input type="text" placeholder="ZIP Code (Optional)">
				</div>
				<div class="column width-238">
					<select name="Industry">
						<option value="">Your Industry (Optional)</option>
						<option value="">Option 1</option>
						<option value="">Option 2</option>
						<option value="">Option 3</option>
						<option value="">Option 4</option>
						<option value="">Option 5</option>
					</select>
				</div>
			</div>
			<h4>
				<img src="<?php echo TDU; ?>/images/icon-video-mini.png" class="pc-visible-dib" alt="">
				<img src="<?php echo TDU; ?>/images/icon-video.png" class="pc-hide-dib" alt="">
				Upload Video</h4>
			<div class="row-2 cf">
				<div class="column">
					<input type="text" placeholder="Video Title">
				</div>
				<div class="column">
					<input type="text" placeholder="Video Description">
				</div>
				<div class="column width-140 file last">
					<input type="file">
				</div>
			</div>
			<h4>
				<img src="<?php echo TDU; ?>/images/icon-photo-mini.png" class="pc-visible-dib" alt="">
				<img src="<?php echo TDU; ?>/images/icon-photo.png" class="pc-hide-dib" alt="">
				Upload Photo
			</h4>
			<div class="row-2 cf">
				<div class="column">
					<input type="text" placeholder="Photo Title">
				</div>
				<div class="column">
					<input type="text" placeholder="Photo Description">
				</div>
				<div class="column width-140 file last">
					<input type="file">
				</div>
			</div>
			<h4>
				<img src="<?php echo TDU; ?>/images/icon-link-mini.png" class="pc-visible-dib" alt="">
				<img src="<?php echo TDU; ?>/images/icon-link.png" class="pc-hide-dib" alt="">
				Link to Media
			</h4>
			<div class="row-2 cf">
				<div class="column">
					<input type="text" placeholder="Media Title">
				</div>
				<div class="column">
					<input type="text" placeholder="Media Description">
				</div>
				<div class="column last width-140">
					<input type="text" placeholder="Media Link" class="width-100">
				</div>
			</div>
			<h4>
				<img src="<?php echo TDU; ?>/images/icon-write-mini.png" class="pc-visible-dib" alt="">
				<img src="<?php echo TDU; ?>/images/icon-write.png" class="pc-hide-dib" alt="">
				Write Your Story
			</h4>
			<div class="row-2 cf">
				<textarea name="story" id="" cols="30" rows="10"></textarea>
			</div>
			<div class="submit-row cf">
				<div class="right">
					<span class="agree">
						<input type="checkbox">
						<label>I agree to <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></label>
					</span>
					<input type="submit" value="Submit" class="btn-green">
				</div>
			</div>
		</form>
	</div>
	<?php get_sidebar('blog'); ?>
</div>
<?php get_footer(); ?>