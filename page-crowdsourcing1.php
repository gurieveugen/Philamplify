<?php
/*
 * @package WordPress
 * Template Name: Crowdsourcing Page Step 1
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
	<div class="whoshould-post cf">
	  <article class="center-wrap cf">
	  		<?php the_content(); ?>
			<?php get_sidebar('assessment-top'); ?>
		</article>
	</div>
	
	<div class="filter-box-assessments cf">
		<div class="center-wrap cf">
			<h3>Filter</h3>
			<div class="select types">
				<select name="type" id="type">
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
				<select name="state" id="state" class="select-state">
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
			
			<div class="select sort">
				<select name="sort" id="sort">
					<option>Sort A to Z</option>
					<option>Sort Z to A</option>
				</select>
			</div>
		</div>
	</div>
		
	<div id="main" class="center-wrap assessments-page cf">		
	  <div id="content" class="main-content cf">
	  		<?php echo do_shortcode('[foundations]'); ?>
			<div class="btn-more-foundations blue"><a href="#">more foundations</a></div>
		</div>
		
		<?php get_sidebar('assessment'); ?>
	  </div>
	</div>
<?php get_footer(); ?>