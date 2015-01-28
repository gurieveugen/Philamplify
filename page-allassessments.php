<?php
/*
 * @package WordPress
 * Template Name: AllAssessments Page
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
	<article class="big-post-assessments cf">
		<div class="txt">
			<header>
				<h3><a href="#">Featured</a></h3>
				<h2><a href="#">Foundation Name</a></h2>
			</header>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed adipiscing dolor eu tincidunt tristique. Nam aliquet turpis faucibus elit molestie egestas. Nulla nec dui quis mi molestie euismod at non ipsum. Quisque dolor augue, feugiat dignissim elit sed, malesuada hendrerit lacus.</p>
			<footer>
				<ul class="share-post">
					<li class="tweet"><a href="#">tweet</a></li>
					<li class="facebook"><a href="#">facebook</a></li>
					<li class="google"><a href="#">google</a></li>
					<li class="linkedin"><a href="#">linkedin</a></li>
				</ul>
				
				<span class="comment-link"><a href="#">3 Comments</a></span>
			</footer>
		</div>
		<figure><img src="<?php echo TDU; ?>/images/img_01.jpg" alt=" "></figure>
		<footer class="table">
			<ul class="share-post">
				<li class="tweet"><a href="#">tweet</a></li>
				<li class="facebook"><a href="#">facebook</a></li>
				<li class="google"><a href="#">google</a></li>
				<li class="linkedin"><a href="#">linkedin</a></li>
			</ul>
			
			<span class="comment-link"><a href="#">3 Comments</a></span>
		</footer>
	</article>
	
	<div class="filter-box-assessments cf">
		<div class="center-wrap cf">
			<h3>Filter</h3>
			<div class="select types" name="types">
				<select>
					<option>All Foundation Types</option>
					<option>Community Foundation</option>
					<option>Corporate Foundation</option>
					<option>Family Foundation</option>
					<option>Independent Foundation</option>
					<option>Grantmaking Public Charity</option>
				</select>
			</div>
			
			<div class="select states" name="states">
				<select>
					<option>All States</option>
					<option>All States 1</option>
					<option>All States 2</option>
				</select>
			</div>
			
			<div class="select years" name="years">
				<select>
					<option>All Years Assessed</option>
					<option>All Years Assessed 1</option>
					<option>All Years Assessed 2</option>
				</select>
			</div>
			
			<div class="select sort" name="sort">
				<select>
					<option>Sort A to Z</option>
					<option>Sort A to Z 1</option>
					<option>Sort A to Z 2</option>
				</select>
			</div>
		</div>
	</div>
		
	<div id="main" class="center-wrap assessments-page cf">		
	  <div id="content" class="main-content cf">
		  <article class="small-post-assessments cf">
			  <header>
				  <h2><a href="#">Foundation Name</a></h2>
				</header>
				<figure><img src="<?php echo TDU; ?>/images/img-1.jpg"></figure>
				<div class="txt">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed adipiscing dolor eu tincidunt tristique. Nam aliquet turpis <strong>faucibus elit</strong> <em>molestie egestas</em>. Nulla nec dui quis mi molestie euismod at non ipsum. Quisque dolor augue, feugiat dignissim elit sed, malesuada hendrerit lacus.</p>
				</div>
				<footer>
				  <ul class="share-post">
					  <li class="tweet"><a href="#">tweet</a></li>
						<li class="facebook"><a href="#">facebook</a></li>
						<li class="google"><a href="#">google</a></li>
						<li class="linkedin"><a href="#">linkedin</a></li>
					</ul>
					
					<span class="comment-link"><a href="#">3 Comments</a></span>
				</footer>
			</article>
			
			<article class="small-post-assessments cf">
			  <header>
				  <h2><a href="#">Foundation Name</a></h2>
				</header>
				<figure><img src="<?php echo TDU; ?>/images/img-1.jpg"></figure>
				<div class="txt">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed adipiscing dolor eu tincidunt tristique. Nam aliquet turpis <strong>faucibus elit</strong> <em>molestie egestas</em>. Nulla nec dui quis mi molestie euismod at non ipsum. Quisque dolor augue, feugiat dignissim elit sed, malesuada hendrerit lacus.</p>
				</div>
				<footer>
				  <ul class="share-post">
					  <li class="tweet"><a href="#">tweet</a></li>
						<li class="facebook"><a href="#">facebook</a></li>
						<li class="google"><a href="#">google</a></li>
						<li class="linkedin"><a href="#">linkedin</a></li>
					</ul>
					
					<span class="comment-link"><a href="#">3 Comments</a></span>
				</footer>
			</article>
			
			<div class="btn-more-foundations"><a href="#">more foundations</a></div>
		</div>
		
		<div id="sidebar">
		  <div class="holder cf">
			  <div class="widget-social tweet">
					<h3>Tweets</h3>
					<header class="cf">
						 <div class="ico"><img src="<?php echo TDU; ?>/images/ico-twitter-2.png" alt=""></div>
						 <h4>MUser Name</h4>
						 <span class="date">1/1/14 at 11:43am</span>
					</header>
					<div class="content">
					  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis, lorem malesuada accumsan facilisis, nisl ligula ullamcorper libero, ut faucibus eros nibh non velit ullamcorper.</p>
						<a href="#" class="link-arrow-blue">View on Twitter</a>
					</div>					
				</div>
				
			  <div class="widget-social">
				  <h3>Facebook posts</h3>
					<header class="cf">
						<div class="ico"><img src="<?php echo TDU; ?>/images/ico-facebook-2.png" alt=""></div>
						<h4>MUser Name</h4>
						<span class="date">1/1/14 at 11:43am</span>
					</header>
					<div class="content">
					  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris venenatis, lorem malesuada accumsan facilisis, nisl ligula ullamcorper libero, ut faucibus eros nibh non velit ullamcorper.</p>
						<a href="#" class="link-arrow-darkblue">View on Facebook</a>
					</div>					
				</div>
				
				<div class="aside-widget widget_text w-col yop-poll-widget" id="text-4">
					<h3>take our Latest Poll</h3>			
					<div class="textwidget">
					<style type="text/css">#yop-poll-container-5_yp54c767d4a35da {
					width:200px;
					background:#fff;
					padding:10px;
					color:#555;
					overflow:hidden;
					font-size:12px;
					}
					#yop-poll-name-5_yp54c767d4a35da {
					font-size:14px;
					font-weight:bold;
					}
					
					#yop-poll-question-5_yp54c767d4a35da {
					font-size:14px;
					margin:5px 0px;
					}
					#yop-poll-answers-5_yp54c767d4a35da {  }
					#yop-poll-answers-5_yp54c767d4a35da ul {
					list-style: none outside none;
					margin: 0;
					padding: 0;
					}
					#yop-poll-answers-5_yp54c767d4a35da ul li { 
					font-style:normal;
					margin:0px 0px 10px 0px;
					padding:0px;
					font-size:12px;
					}
					#yop-poll-answers-5_yp54c767d4a35da ul li input { 
					margin:0px; 
					float:none;
					}
					#yop-poll-answers-5_yp54c767d4a35da ul li label { 
					margin:0px; 
					font-style:normal; 
					font-weight:normal; 
					font-size:12px; 
					float:none;
					}
					.yop-poll-results-5_yp54c767d4a35da {
					font-size: 12px;
					font-style: italic;
					font-weight: normal;
					margin-left: 15px;
					}
					
					#yop-poll-custom-5_yp54c767d4a35da {  }
					#yop-poll-custom-5_yp54c767d4a35da ul {
					list-style: none outside none;
					margin: 0;
					padding: 0;
					}
					#yop-poll-custom-5_yp54c767d4a35da ul li { 
					padding:0px;
					margin:0px;	
					font-size:14px;
					}
					#yop-poll-container-5_yp54c767d4a35da input[type='text'] { margin:0px 0px 5px 0px; padding:2%; width:96%; text-indent:2%; font-size:12px; }
					
					#yop-poll-captcha-input-div-5_yp54c767d4a35da {
					margin-top:5px;
					}
					#yop-poll-captcha-helpers-div-5_yp54c767d4a35da {
					width:30px;
					float:left;
					margin-left:5px;
					height:0px;
					}
					
					#yop-poll-captcha-helpers-div-5_yp54c767d4a35da img {
					margin-bottom:2px;
					}
					
					#yop-poll-captcha-image-div-5_yp54c767d4a35da {
					margin-bottom:5px;
					}
					
					#yop_poll_captcha_image_5_yp54c767d4a35da {
					float:left;
					}
					
					.yop_poll_clear {
					clear:both;
					}
					
					#yop-poll-vote-5_yp54c767d4a35da {
					
					}
					.yop-poll-results-bar-5_yp54c767d4a35da { background:#f5f5f5; height:10px;  }
					.yop-poll-results-bar-5_yp54c767d4a35da div { background:#555; height:10px; }
					#yop-poll-vote-5_yp54c767d4a35da div#yop-poll-vote-5_yp54c767d4a35da button { float:left; }
					#yop-poll-vote-5_yp54c767d4a35da div#yop-poll-results-5_yp54c767d4a35da {
					float: right;
					margin-bottom: 20px;
					margin-top: -20px;
					width: auto;
					}
					#yop-poll-vote-5_yp54c767d4a35da div#yop-poll-results-5_yp54c767d4a35da a { color:#555; text-decoration:underline; font-size:12px;}
					#yop-poll-vote-5_yp54c767d4a35da div#yop-poll-back-5_yp54c767d4a35da a { color:#555; text-decoration:underline; font-size:12px;}
					#yop-poll-vote-5_yp54c767d4a35da div { float:left; width:100%; }
					
					#yop-poll-container-error-5_yp54c767d4a35da {
					font-size:12px;
					font-style:italic;
					color:red;
					text-transform:lowercase;
					}
					
					#yop-poll-container-success-5_yp54c767d4a35da {
					font-size:12px;
					font-style:italic;
					color:green;
					}</style>
						<div id="yop-poll-container-5_yp54c767d4a35da" class="yop-poll-container">
							<div id="yop-poll-container-success-5_yp54c767d4a35da" class="yop-poll-container-success"></div>
							<div id="yop-poll-container-error-5_yp54c767d4a35da" class="yop-poll-container-error"></div>
							<form id="yop-poll-form-5_yp54c767d4a35da" class="yop-poll-forms">
								<div id="yop-poll-name-5_yp54c767d4a35da" class="yop-poll-name">Diversity &amp; Impact</div>
								<div id="yop-poll-question-5_yp54c767d4a35da" class="yop-poll-question">Do you think greater staff and board diversity helps make foundations more effective and impactful?</div>
								<div id="yop-poll-answers-5_yp54c767d4a35da" class="yop-poll-answers">
									<ul>				
										<li class="yop-poll-li-answer-5_yp54c767d4a35da">
										<input type="radio" value="12" name="yop_poll_answer" id="yop-poll-answer-5_yp54c767d4a35da-12" /> 
										<label for="yop-poll-answer-5_yp54c767d4a35da-12">Yes</label>
										<span class="yop-poll-results-text-5_yp54c767d4a35da"></span>			
										</li>
										
										<li class="yop-poll-li-answer-5_yp54c767d4a35da">
										<input type="radio" value="13" name="yop_poll_answer" id="yop-poll-answer-5_yp54c767d4a35da-13" /> 
										<label for="yop-poll-answer-5_yp54c767d4a35da-13">No</label>
										<span class="yop-poll-results-text-5_yp54c767d4a35da"></span>				
										</li>
										
										<li class="yop-poll-li-answer-5_yp54c767d4a35da">
										<input type="radio" value="14" name="yop_poll_answer" id="yop-poll-answer-5_yp54c767d4a35da-14" /> 
										<label for="yop-poll-answer-5_yp54c767d4a35da-14">Maybe</label>
										<span class="yop-poll-results-text-5_yp54c767d4a35da"></span>				
										</li>				
									</ul>
								</div>
								
								<div id="yop-poll-custom-5_yp54c767d4a35da">
									<ul>
									
									</ul>
								</div>    
								
								<div id="yop-poll-vote-5_yp54c767d4a35da" class="yop-poll-footer">
									<div><button class="yop_poll_vote_button" id="yop_poll_vote-button-5_yp54c767d4a35da" onClick="yop_poll_register_vote('5', 'page', '_yp54c767d4a35da'); return false;">Vote</button></div>
									<div id="yop-poll-results-5_yp54c767d4a35da"></div>
									<div></div>   
									<div></div>
								</div>
								<input type="hidden" id="yop-poll-tr-id-5_yp54c767d4a35da" name="yop_poll_tr_id" value=""/><input type="hidden" id="yop-poll-nonce-5_yp54c767d4a35da" name="yop-poll-nonce-5_yp54c767d4a35da" value="b8a3db9286" />
							</form>
						</div>
					</div>
				</div>
				
				<div class="aside-widget w-col tablet-visible right" id="newsfeed-2">
					<h3><a href="http://philamplify.org/newsroom/">Newsroom</a></h3>
					<ul class="list-news">			
						<li><a href="#"><span class="date">12/17</span><strong class="title">Which Funders is NCRP ‘Philamplifying’ Next?</strong></a></li>
						<li><a href="#"><span class="date">11/17</span><strong class="title">Mutual Trust as a Basis for Philanthropic Excellence</strong></a></li>
						<li><a href="#"><span class="date">11/12</span><strong class="title">Fall Issue of “Responsive Philanthropy” Highlights Value of Collaboration</strong></a></li>
						<li><a href="#"><span class="date">10/30</span><strong class="title">Diversity and Effectiveness: What Is the Link for Foundations?</strong></a></li>
						<li><a href="#"><span class="date">10/07</span><strong class="title">Do Feedback Loops in Philanthropy Create Stronger Accountability?</strong></a></li>
					</ul><!-- list-news -->
				</div>
				
				<div class="aside-widget w-col right" id="assessmentfeed-2">
					<h3><a href="#">All Assessments</a></h3>
					<ul class="list">			
						<li><a href="#" class="ico-a">The California Endowment</a></li>
						<li><a href="#" class="ico-a">Daniels Fund</a></li>
						<li><a href="#" class="ico-a">Lumina Foundation For Education</a></li>
						<li><a href="#" class="ico-a">Robert W. Woodruff Foundation</a></li>
						<li><a href="#" class="ico-a">William Penn Foundation</a></li>
					</ul><!-- /.list -->
				</div>
				
				<div class="aside-widget  tablet-hide" id="newsfeed-4">
					<h3><a href="#">Newsroom</a></h3>
					<ul class="list-news">			
						<li><a href="#"><span class="date">12/17</span><strong class="title">Which Funders is NCRP ‘Philamplifying’ Next?</strong></a></li>
						<li><a href="#"><span class="date">11/17</span><strong class="title">Mutual Trust as a Basis for Philanthropic Excellence</strong></a></li>
						<li><a href="#"><span class="date">11/12</span><strong class="title">Fall Issue of “Responsive Philanthropy” Highlights Value of Collaboration</strong></a></li>
						<li><a href="#"><span class="date">10/30</span><strong class="title">Diversity and Effectiveness: What Is the Link for Foundations?</strong></a></li>
						<li><a href="#"><span class="date">10/07</span><strong class="title">Do Feedback Loops in Philanthropy Create Stronger Accountability?</strong></a></li>
					</ul><!-- list-news -->
				</div>
				
			</div>
	  </div>
	</div>		
		
		
		
	

<?php get_footer(); ?>