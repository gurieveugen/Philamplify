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
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php echo (wp_title( ' ', false, 'right' ) == '') ? get_bloginfo('name') : (wp_title( ' ', false, 'right' ) == ''); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link media="all" rel="stylesheet" type="text/css" href="<?php echo TDU; ?>/css/style.css" />
	<link rel="stylesheet" media="(max-width: 970px)" href="<?php echo TDU; ?>/css/tablet.css" />
	<link rel="stylesheet" media="(max-width: 500px)" href="<?php echo TDU; ?>/css/mobile.css" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
		wp_head(); ?>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/doubletaptogo.js" ></script>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.formstyler.min.js" ></script>
	<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.cycle.all.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/html5.js"></script>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/pie.js"></script>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/init-pie.js"></script>
	<![endif]-->
	<!--[if lte IE 9]>
		<script type="text/javascript" src="<?php echo TDU; ?>/js/jquery.placeholder.min.js"></script>
		<script type="text/javascript">
			jQuery(function(){
				jQuery('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<header id="header">
			<div class="center-wrap">
				<div class="holder cf">
					<div id="ico-menu" class="pc-hide"><img src="<?php echo TDU; ?>/images/ico-menu-t.png" alt=""></div>
					<strong class="logo"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
						<img class="pc-visible" src="<?php echo TDU; ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
						<img class="tablet-visible" src="<?php echo TDU; ?>/images/logo-tablet.png" alt="<?php bloginfo('name'); ?>">
						<img class="mobile-visible" src="<?php echo TDU; ?>/images/logo-mobile.png" alt="<?php bloginfo('name'); ?>">
					</a></strong>
					<div class="right mobile-hide">
						<ul class="socials socials-2">
							<?php array_walk($socials, 'printSocials');	?>
							<!-- <li><a href="#"><img src="<?php echo TDU; ?>/images/ico-facebook.png" alt=""></a></li>
							<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-twitter.png" alt=""></a></li>
							<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-youtube.png" alt=""></a></li>
							<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-rss.png" alt=""></a></li> -->
						</ul>
						<?php get_search_form(); ?>
						<!-- <form action="#" class="search-form pc-visible">
							<input type="text" placeholder="SEARCH">
							<input type="submit" value="Search">
						</form> -->
					</div>
				</div>
				<?php wp_nav_menu( array(
					'container'       => 'nav',
					'container_class' => 'pc-visible',
					'container_id'    => 'main-nav',
					'theme_location'  => 'primary_nav',
					'menu_id'         => 'nav'
				)); ?>
				<div class="hide nav-box">

					<form action="#" class="search-form-tablet cf">
						<input type="text" placeholder="Search">
						<input type="submit" value="Search">
					</form>
					<ul class="socials cf">
						<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-facebook.png" alt=""></a></li>
						<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-twitter.png" alt=""></a></li>
						<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-youtube.png" alt=""></a></li>
						<li><a href="#"><img src="<?php echo TDU; ?>/images/ico-rss.png" alt=""></a></li>
					</ul>
					<?php wp_nav_menu( array(
						'container' => 'nav',
						'container_class' => 'nav-tablet-block',
						'theme_location' => 'primary_nav',
						'menu_class' => 'nav-tablet'
					)); ?>
				</div>
			</div>
		</header>