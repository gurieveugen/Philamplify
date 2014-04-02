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
?>
		<footer id="footer">
			<div class="holder">
				<div class="center-wrap cf">
					<div class="column column-3">
						<ul class="socials socials-1 cf">
							<?php array_walk($socials, 'printSocials');	?>
							<!-- <li><a href="#"><img src="<?php echo TDU; ?>/images/ico-facebook.png" alt="alt"></a></li>
							<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-twitter.png" alt=""></a></li>
							<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-youtube.png" alt=""></a></li>
							<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-rss.png" alt=""></a></li> -->
						</ul>
						<a href="#" class="btn-green btn-donate">Donate Now</a>
					</div>
					<div class="column column-2">
						<ul class="menu">
							<li><a href="#">About Philamplify</a></li>
							<li><a href="#">Foundation Assessments</a></li>
							<li><a href="#">News Room</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Your Story</a></li>
						</ul>
					</div>
					<div class="column column-1">
						<p>&copy;2014 National Committe for Responsive Philanthropy. <br>All rights reserved.</p>
						<ul class="menu-row cf">
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
						<div class="form-logo-row cf">
							<a href="#" class="logo"><img src="<?php echo TDU; ?>/images/logo-ncrp.png" alt=""></a>
							<form action="#" class="form-subscribe">
								<label>Subscribe to NCRP Newsletter</label>
								<div class="cf">
									<input type="email" placeholder="EMAIL ADDRESS">
									<input type="submit" value="SUBMIT">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<?php wp_footer(); ?>
</body>
</html>