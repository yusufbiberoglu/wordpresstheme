<?php
/*
* 
* Ana sayfa şablonu
*
*/
get_header(); ?>


<div id="slider_area">
	<div class="bxslider">
		<?php query_posts('post_type=slider&post_status=publish&posts_per_page=3&order=ASC&paged='.get_query_var('post'));?>
		<?php if(have_posts()):?>
			<?php while(have_posts()) : the_post(); ?>

		<div class="item">
			<?php echo the_post_thumbnail('slider'); ?>
			<div class="slider_inner">
				<div class="slider_table">
					<div class="slider_display">
						<div class="slider_main">
									<?php the_title(); ?>
									<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
	
		</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>



<?php get_footer();?>

