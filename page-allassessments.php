<?php
/*
 * @package WordPress
 * Template Name: AllAssessments Page
*/
?>
<?php get_header(); ?>
<?php the_post(); ?>
<?php
$link = get_permalink();
?>
<header class="page-title">
	<div class="holder">
		<div class="center-wrap">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</header>
	<?php echo do_shortcode('[assessments-featured]'); ?>
	<!-- <article class="big-post-assessments cf">
		<div class="txt">
			<header>
				<h3><a href="#">Featured</a></h3>
				<h2><a href="#">Foundation Name</a></h2>
			</header>
			<p><?php the_content(); ?></p>
			<footer>
				<ul class="share-post">
					<li class="tweet"><a href="https://twitter.com/home?status=<?php echo $link; ?>">tweet</a></li>
					<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link; ?>">facebook</a></li>
					<li class="google"><a href="https://plus.google.com/share?url=<?php echo $link; ?>">google</a></li>
					<li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link; ?>&title=&summary=&source=">linkedin</a></li>
				</ul>
				
				<span class="comment-link"><a href="#">3 Comments</a></span>
			</footer>
		</div>
		<figure><img src="<?php echo TDU; ?>/images/img_01.jpg" alt=" "></figure>
		<footer class="table">
			<ul class="share-post">
				<li class="tweet"><a href="https://twitter.com/home?status=<?php echo $link; ?>">tweet</a></li>
					<li class="facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link; ?>">facebook</a></li>
					<li class="google"><a href="https://plus.google.com/share?url=<?php echo $link; ?>">google</a></li>
					<li class="linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link; ?>&title=&summary=&source=">linkedin</a></li>
			</ul>
			
			<span class="comment-link"><a href="#">3 Comments</a></span>
		</footer>
	</article> -->
	
	<div class="filter-box-assessments cf">
		<div class="center-wrap cf">
			<h3>Filter</h3>
			<div class="select types">
				<select>
					<option>All Foundation Types</option>
					<option>Community Foundation</option>
					<option>Corporate Foundation</option>
					<option>Family Foundation</option>
					<option>Independent Foundation</option>
					<option>Grantmaking Public Charity</option>
				</select>
			</div>
			
			<div class="select states">
				<?php 
				$states = array_merge(array('ALL' => 'ALL'), getStates()); 

				?>
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
			<div class="select years">
				<select>
					<option>All Years Assessed</option>
					<?php
					for($years = 2010; $years <= 2015; $years++)
					{
						printf('<option>%s</option>', $years);
					}
					?>
				</select>
			</div>
			
			<div class="select sort">
				<select>
					<option>Sort A to Z</option>
					<option>Sort Z to A</option>
				</select>
			</div>
		</div>
	</div>
		
	<div id="main" class="center-wrap assessments-page cf">		
	  <div id="content" class="main-content cf">
	  		<?php echo do_shortcode('[assessments]'); ?>
			<div class="btn-more-foundations"><a href="#">more foundations</a></div>
		</div>
		<?php get_sidebar('assessment'); ?>
	</div>

<?php get_footer(); ?>