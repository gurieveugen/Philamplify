<?php
/**
 * @package WordPress
 * @subpackage Base_Theme
 */
?>
<?php 
	$options             = $GLOBALS['gcoptions']->getAll(); 
	$socials['facebook'] = (isset($options['facebook_url']) && strlen($options['facebook_url'])) ? $options['facebook_url'] : '';
	$socials['twitter']  = (isset($options['twitter_url']) && strlen($options['twitter_url'])) ? $options['twitter_url'] : '';
	$socials['youtube']  = (isset($options['youtube_url']) && strlen($options['youtube_url'])) ? $options['youtube_url'] : '';
	$socials['rss']      = (isset($options['rss_url']) && strlen($options['rss_url'])) ? $options['rss_url'] : '';
	$donate_url          = (isset($options['donate_url']) && strlen($options['donate_url'])) ? htmlspecialchars($options['donate_url'], ENT_QUOTES) : '';
	$ncrp_url            = (isset($options['ncrp_url']) && strlen($options['ncrp_url'])) ? htmlspecialchars($options['ncrp_url'], ENT_QUOTES) : '';
?>
		<footer id="footer">
			<div class="holder">
				<div class="center-wrap cf">
					<div class="column column-3">
						<ul class="socials socials-1 cf">
							<?php array_walk($socials, 'printSocials');	?>							
						</ul>
						<a href="<?php echo $donate_url; ?>" class="btn-green btn-donate">Donate Now</a>
					</div>
					<div class="column column-2">
						<?php wp_nav_menu( array(
							'container'       => '',
							'theme_location'  => 'bottom_nav',
							'menu_class'      => 'menu'
						)); ?>						
					</div>
					<div class="column column-1">
						<p>&copy;2014 National Committee for Responsive Philanthropy. <br>All rights reserved.</p>
						<?php wp_nav_menu( array(
							'container'       => '',
							'theme_location'  => 'bottom_left_nav',
							'menu_class'      => 'menu-row cf'
						)); ?>						
						<div class="form-logo-row cf">
							<a href="<?php echo $ncrp_url; ?>" class="logo"><img src="<?php echo TDU; ?>/images/logo-ncrp.png" alt=""></a>
							<form action="#" class="form-subscribe form-subscribe-ajax">
								<label>Subscribe to NCRP Newsletter</label>
								<div class="cf">
									<input type="email" placeholder="EMAIL ADDRESS" name="email">
									<input type="hidden" value="<?php echo getIP(); ?>" name="ip">
									<?php wp_nonce_field('subscribe-nonce', 'security'); ?>
									<input type="submit" value="SUBMIT">									
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<div id="lightbox-first-visit" style="display:none;">
		<div class="content">
			<h2>Thank you for visiting Philamplify!</h2>
			<p>We need your help to break the isolation bubble around grantmakers. Join the movement!</p>
			<span class="line"></span>
			<h4 class="title-green">Sign up to receive the National Committee for Responsive Philanthropy’s monthly e-newsletter now!</h4>
			<form action="#" class="form-subscr-lightbox cf">
				<input type="email" placeholder="Email Address">
				<input type="submit" value="Subscribe">
			</form>
			<span class="line"></span>
			<h4 class="title-green">Share Philamplify with your colleagues!</h4>
			<ul class="social-links">
				<li><a href="#" class="twitter">twitter</a></li>
				<li><a href="#" class="facebook">facebook</a></li>
				<li><a href="#" class="google">google</a></li>
				<li><a href="#" class="in">in</a></li>
			</ul>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>