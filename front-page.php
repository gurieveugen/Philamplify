<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>

<?php get_header(); ?>

<section class="section-media">
	<div class="holder">
		<div class="center-wrap cf">
			<div class="text pc-hide">
				<h1>Honest Feedback to Improve Philanthropy</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed adipiscing dolor eu tincidunt tristique. Nam aliquet turpis faucibus elit molestie egestas. Nulla nec dui quis mi molestie euismod at non ipsum.</p>
			</div>
			<div class="video-box">
				<img src="<?php echo TDU; ?>/images/img-7.jpg" alt="">
				<a href="#" class="ico-video">play</a>
			</div>
			<div class="text">
				<div class="pc-visible">
					<h1>Honest Feedback to Improve Philanthropy</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed adipiscing dolor eu tincidunt tristique. Nam aliquet turpis faucibus elit molestie egestas. Nulla nec dui quis mi molestie euismod at non ipsum.</p>
				</div>
				<div class="quotes-holder">
					<blockquote class="box-quote q1 cf">
						<q>“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed adipiscing dolor eu tincidunt tristique. Nam aliquet turpis faucibus elit molestie”</q>
						<cite>-- Quote Source</cite>
						<a href="#" class="link-arrow">Share Your Stories</a>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="slider-area">
	<div class="center-wrap">
		<div class="title-row cf">
			<h2 class="title-section">Latest Foundation Assessments</h2>
			<div class="slider-control">
				<a href="#" class="link-prev pc-hide-dib">Previous</a>
				<?php echo $GLOBALS['slider']->getSwitcher(); ?>				
				<a href="#" class="link-next pc-hide-dib">Next</a>
			</div>
		</div>
		<a href="#" class="link-prev pc-visible">Previous</a>
		<a href="#" class="link-next pc-visible">Next</a>
		<?php echo $GLOBALS['slider']->getSlides(); ?>		
	</div>
</section>
<section class="section-socials cf">
	<div class="holder">
		<div class="center-wrap cf">
			<?php $GLOBALS['social_feed']->displayFeed(); ?>
			<div id="sidebar">
				<div class="holder cf">
					<div class="aside-widget tablet-visible">
						<h3><a href="#">News Feed</a></h3>
						<ul class="list-news">
							<li>
								<a href="#">
									<span class="date">12/25</span>
									<strong class="title">RSS Feed News Item Title</strong>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="date">12/25</span>
									<strong class="title">RSS Feed News Item Title</strong>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="date">12/25</span>
									<strong class="title">RSS Feed News Item Title that’s longer and goes to two lines</strong>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="date">12/25</span>
									<strong class="title">RSS Feed News Item Title</strong>
								</a>
							</li>
							<li>
								<a href="#">
									<span class="date">12/25</span>
									<strong class="title">RSS Feed News Item Title</strong>
								</a>
							</li>
						</ul>
					</div>
					<aside class="aside-widget w-col">
						<h3>Sign up for the Philamplify newsletter!</h3>
						<form action="#" class="form-signup">
							<input type="email" placeholder="EMAIL ADDRESS">
							<input type="submit" class="btn-dark-green" value="Subscribe">
						</form>
					</aside>
					<aside class="aside-widget w-col right">
						<h3>Latest Philamplify Poll</h3>
						<form action="#" class="form-poll">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed adipiscing dolor eu tincidunt tristique?</p>
							<div class="check-row">
								<label>
									<input type="radio" name="name-1" checked="checked">
									<span class="label">Yes</span>
								</label>
								<label>
									<input type="radio" name="name-1">
									<span class="label">No</span>
								</label>
							</div>
							<p class="text-big">Lorem ipsum dolor sit amet, consectetur adipiscing?</p>
							<div class="check-row">
								<label>
									<input type="radio" name="name-2" checked="checked">
									<span class="label">Yes</span>
								</label>
								<label>
									<input type="radio" name="name-2">
									<span class="label">No</span>
								</label>
							</div>
							<div class="button-holder">
								<input type="submit" class="btn-dark-green" value="Submit and See Results">
							</div>
						</form>
					</aside>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section-columns">
	<div class="center-wrap cf">
		<h2 class="title-section lightgreen">How Philamplify Works</h2>
		<div class="columns cf">
			<div class="column">
				<div class="image">
					<a href="#"><img src="<?php echo TDU; ?>/images/img-9.jpg" alt=""></a>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin fringilla lacus id sapien mollis pellentesque. Ut adipiscing sit amet sem consequat suscipit.</p>
				<a href="#" class="link-arrow-big pc-visible">Learn More</a>
			</div>
			<div class="column">
				<div class="image">
					<a href="#"><img src="<?php echo TDU; ?>/images/img-10.jpg" alt=""></a>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin fringilla lacus id sapien mollis pellentesque. Ut adipiscing sit amet sem consequat suscipit.</p>
				<a href="#" class="link-arrow-big pc-visible">Learn More</a>
			</div>
			<div class="column">
				<div class="image">
					<a href="#"><img src="<?php echo TDU; ?>/images/img-11.jpg" alt=""></a>
				</div>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin fringilla lacus id sapien mollis pellentesque. Ut adipiscing sit amet sem consequat suscipit.</p>
				<a href="#" class="link-arrow-big pc-visible">Learn More</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>