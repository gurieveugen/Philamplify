<?php
/*
 * @package WordPress
 * Template Name: Crowdsourcing Page Step 2
*/

?>
<?php get_header(); ?>
<?php the_post(); ?>
<header class="page-title">
	<div class="holder">
		<div class="center-wrap">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</header>
	<div id="main" class="center-wrap foundation-form-page cf">		
	  <div id="content" class="main-content cf">
		  	<div class="foundation-form cf">
		  	<form action="<?php echo get_permalink(); ?>" method="POST" class="form-share-foundation">
		  		<input type="hidden" name="share_foundation">
		  		<input type="hidden" name="page" value="<?php echo get_bloginfo('url'); ?>/thank">
			  	<div class="entry">
			    	<h2>Submit a Foundation</h2>
					<p><?php the_content(); ?></p>
				</div>
				<h3 class="tit-foundation">Tell us about the foundation</h3>
				<p class="two-columns cf">
				  	<label class="left"><input type="text" name="name" placeholder="Foundation Name" required></label>
					<label class="right"><input type="text" name="website" placeholder="Foundation Website (Optional)" required></label>
				</p>
				
				<p class="two-columns cf">
				  <label class="left">
					  	<select name="type">
							<option>All Foundation Types</option>
							<option>Community Foundation</option>
							<option>Corporate Foundation</option>
							<option>Family Foundation</option>
							<option>Independent Foundation</option>
							<option>Grantmaking Public Charity</option>
						</select>
					</label>
					<label class="right">
						<?php $states = getStates(); ?>
						<select name="state" id="state">
							<?php
							foreach ($states as $key => $value) 
							{
								?>
								<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
								<?php
							}
							?>
						</select>
					</label>
				</p>
				
				<p>
					<label>
						<textarea name="txt" placeholder="Why do you think this foundation should be Philamplified?"></textarea>
					</label>
				</p>
				
				<h3 class="tit-yourself">Tell us about yourself</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
				<p class="three-columns cf">
				  	<label class="left">
				  		<input type="text" name="first_name" placeholder="First Name (Optional)" required>
				  	</label>
					<label class="center">
						<input type="text" name="last_name" placeholder="Last Name (Optional)" required>
					</label>
					<label class="right">
						<input type="email" name="email" placeholder="Email Address" required>
					</label>
				</p>
				<p><input type="checkbox">I would like my submission to be anonymous. I'm posting as a guest.</p>
				<div class="submit">
					<label>
						<input type="checkbox" name="i_agree">I agree to <a href="<?php bloginfo('url'); ?>/terms/">Terms of Use</a> and <a href="<?php bloginfo('url'); ?>/privacy-policy/">Privace Policy</a>
					</label>
					<input type="submit" value="submit">					
				</div>
			</form>
			</div>
		</div>
		
		<?php get_sidebar('assessment'); ?>
	</div>
<?php get_footer(); ?>