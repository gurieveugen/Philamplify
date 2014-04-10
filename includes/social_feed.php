<?php

// =========================================================
// REUIRE
// =========================================================
require_once 'google_url.php'; 
require_once 'twitteroauth/twitteroauth.php'; 
require_once 'facebook/facebook.php';

class SocialFeed{
	//                          __              __      
	//   _________  ____  _____/ /_____ _____  / /______
	//  / ___/ __ \/ __ \/ ___/ __/ __ `/ __ \/ __/ ___/
	// / /__/ /_/ / / / (__  ) /_/ /_/ / / / / /_(__  ) 
	// \___/\____/_/ /_/____/\__/\__,_/_/ /_/\__/____/  
	const TWITTER_CONSUMER_KEY        = 'FoRJZBenKUFmIQFLDp2gQ';
	const TWITTER_CONSUMER_SECRET     = 'Kudk8D5ZAxb5tWAoXRO21T47gp6EXRplJ82MEUiqc';
	const TWITTER_ACCESS_TOKEN        = '532546390-23aT4nDlWpYLA543yUfmExBqFs0RDb9AZBRbNFTd';
	const TWITTER_ACCESS_TOKEN_SECRET = 'Mt9Hj9aocqQ7qSQGzowzUkFWpvJx8kyBoLAV9GGfV9kvL';
	const FACEBOOK_APP_ID			  = '1423814364535515';
	const FACEBOOK_SECRET			  = 'bdeb449de6a7a8fb5d0cafa953446ed6';

	//                __  _                 
	//   ____  ____  / /_(_)___  ____  _____
	//  / __ \/ __ \/ __/ / __ \/ __ \/ ___/
	// / /_/ / /_/ / /_/ / /_/ / / / (__  ) 
	// \____/ .___/\__/_/\____/_/ /_/____/  
	//     /_/                              
	private $googl;
	private $twitter;
	private $facebook;
	private $options; 

	//                    __  __              __    
	//    ____ ___  ___  / /_/ /_  ____  ____/ /____
	//   / __ `__ \/ _ \/ __/ __ \/ __ \/ __  / ___/
	//  / / / / / /  __/ /_/ / / / /_/ / /_/ (__  ) 
	// /_/ /_/ /_/\___/\__/_/ /_/\____/\__,_/____/  
	public function __construct()
	{
		$this->googl    = new Googl();
		$this->twitter  = new TwitterOAuth(self::TWITTER_CONSUMER_KEY, self::TWITTER_CONSUMER_SECRET, self::TWITTER_ACCESS_TOKEN, self::TWITTER_ACCESS_TOKEN_SECRET);
		$this->facebook = new Facebook(array(
			'appId'  => '344617158898614',
			'secret' => '6dc8ac871858b34798bc2488200e503d')); 
		$this->options = $GLOBALS['sfoptions']->getAll();
			

		wp_enqueue_script('social_feed', get_bloginfo('template_url').'/js/social_feed.js', array('jquery'));
	}

	public function displayFeed()
	{		
		$tweets = $this->twitter->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$this->options['twitter']."&count=".$this->options['count']);		
		
		
		$user = $this->facebook->getUser();
		// $some_shit = $this->facebook->api('/kingstar.inc/feed?limit=3');
		// var_dump($some_shit);
		var_dump($user);
		?>
		<div class="content-socials">
			<div class="title-row cf">
				<h2 class="title-section green">Recent Activity</h2>
				<ul class="socials-filter pc-visible-dib">
					<li class="active"><a href="#" data-social="all">All</a></li>
					<li><a href="#" data-social="philamplify">Philamplify</a></li>
					<li><a href="#" data-social="twitter">Twitter</a></li>
					<li><a href="#" data-social="facebook">Facebook</a></li>
					<li><a href="#" data-social="google_plus">Google+</a></li>
				</ul>
			</div>
			<div class="socials-filter-row pc-hide bf">
				<select name="socials-filter" class="select-socials-filter">
					<option value="0" class="filter">FILTER</a></li>
					<option value="all">All</a></li>
					<option value="philamplify">Philamplify</a></li>
					<option value="twitter">Twitter</a></li>
					<option value="facebook">Facebook</a></li>
					<option value="google">Google+</a></li>
				</select>
			</div>
			<div class="socials-holder">
				<?php echo $this->getTweets($tweets); ?>						
				<article class="box-social green feed-philamplify feed-all">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-assessment.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow mobile-hide-dib">View the Assessment</a>
					</header>
					<div class="content">
						<p>User Name AGREES with the <a href="#">Winthrop Rockefeller Foundation assessment</a>.</p>
					</div>
				</article>
				<article class="box-social green feed-philamplify">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-assessment.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow mobile-hide-dib">View the Assessment</a>
					</header>
					<div class="content">
						<p>User Name AGREES with the <a href="#">Winthrop Rockefeller Foundation assessment</a>.</p>
					</div>
				</article>
				<article class="box-social green feed-philamplify">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-assessment.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow mobile-hide-dib">View the Assessment</a>
					</header>
					<div class="content">
						<p>User Name AGREES with the <a href="#">Winthrop Rockefeller Foundation assessment</a>.</p>
					</div>
				</article>
				<article class="box-social green feed-philamplify">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-assessment.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow mobile-hide-dib">View the Assessment</a>
					</header>
					<div class="content">
						<p>User Name AGREES with the <a href="#">Winthrop Rockefeller Foundation assessment</a>.</p>
					</div>
				</article>
				<article class="box-social dark-blue feed-facebook feed-all">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-facebook-2.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow-darkblue mobile-hide-dib">View on Facebook</a>
					</header>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis, lorem malesuada accumsan facilisis, nisl ligula ullamcorper libero, ut faucibus eros nibh non velit. ullamcorper libero.</p>
					</div>
				</article>
				<article class="box-social dark-blue feed-facebook">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-facebook-2.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow-darkblue mobile-hide-dib">View on Facebook</a>
					</header>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis, lorem malesuada accumsan facilisis, nisl ligula ullamcorper libero, ut faucibus eros nibh non velit. ullamcorper libero.</p>
					</div>
				</article>
				<article class="box-social dark-blue feed-facebook">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-facebook-2.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow-darkblue mobile-hide-dib">View on Facebook</a>
					</header>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis, lorem malesuada accumsan facilisis, nisl ligula ullamcorper libero, ut faucibus eros nibh non velit. ullamcorper libero.</p>
					</div>
				</article>
				<article class="box-social dark-blue feed-facebook">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-facebook-2.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow-darkblue mobile-hide-dib">View on Facebook</a>
					</header>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis, lorem malesuada accumsan facilisis, nisl ligula ullamcorper libero, ut faucibus eros nibh non velit. ullamcorper libero.</p>
					</div>
				</article>
				<article class="box-social red feed-google_plus feed-all">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-google-2.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow-red mobile-hide-dib">View on Google +</a>
					</header>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis, lorem malesuada accumsan facilisis, nisl ligula ullamcorper libero, ut faucibus eros nibh non velit. ullamcorper libero.</p>
					</div>
				</article>
				<article class="box-social red feed-google_plus">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-google-2.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow-red mobile-hide-dib">View on Google +</a>
					</header>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis, lorem malesuada accumsan facilisis, nisl ligula ullamcorper libero, ut faucibus eros nibh non velit. ullamcorper libero.</p>
					</div>
				</article>
				<article class="box-social red feed-google_plus">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-google-2.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow-red mobile-hide-dib">View on Google +</a>
					</header>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis, lorem malesuada accumsan facilisis, nisl ligula ullamcorper libero, ut faucibus eros nibh non velit. ullamcorper libero.</p>
					</div>
				</article>
				<article class="box-social red feed-google_plus">
					<header class="cf">
						<div class="ico">
							<img src="<?php echo TDU; ?>/images/ico-google-2.png" alt="">
						</div>
						<h4>User Name</h4>
						<strong class="date">1/1/14 at 11:43am</strong>
						<a href="#" class="link-arrow-red mobile-hide-dib">View on Google +</a>
					</header>
					<div class="content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis, lorem malesuada accumsan facilisis, nisl ligula ullamcorper libero, ut faucibus eros nibh non velit. ullamcorper libero.</p>
					</div>
				</article>
			</div>
		</div>
		<?php
	}

	/**
	 * Get tweets from response
	 * @param  array $tweets 
	 * @return string
	 */
	public function getTweets($tweets)
	{
		$out           = '';
		$first         = true;
		$tweets        = array_reverse($tweets);		
		$article_class = array('box-social', 'blue', 'feed-twitter');

		if($tweets)
		{
			foreach ($tweets as &$tweet) 
			{				
				if($first)
				{
					$first    = false;
					$feed_all = ' feed-all';
				}
				else
				{
					$feed_all = '';	
				}

				$classes = implode(' ', $article_class).$feed_all;
				$url     = 'https://twitter.com/'.$tweet->user->screen_name.'/status/'.$tweet->id_str;
				$url     = $this->googl->shorten($url);

				$out.= sprintf('<article class="%s">', $classes);
				$out.= '<header class="cf">';
				$out.= '<div class="ico"><img src="'.TDU.'/images/ico-twitter-2.png" alt=""></div>';
				$out.= sprintf('<h4>%s</h4>', $tweet->user->name);
				$out.= sprintf('<strong class="date">%s</strong>', $this->formatDate(strtotime($tweet->created_at)));
				$out.= sprintf('<a href="%s" class="link-arrow-blue mobile-hide-dib">View on Twitter</a>', $url);
				$out.= '</header>';
				$out.= sprintf('<div class="content"><p>%s</p></div>', $tweet->text);				
				$out.= '</article>';
			}
		}
		return $out;
	}

	/**
	 * Format date time
	 * @param  time $time 
	 * @return string
	 */
	public function formatDate($time)
	{
		$d = date('j/n/y', $time);
		$t = date('g:ia', $time);
		return $d.' at '.$t;
	}
}

// =========================================================
// LAUNCH
// =========================================================
$GLOBALS['social_feed'] = new SocialFeed();