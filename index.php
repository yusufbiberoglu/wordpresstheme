<?php 

/*
* Ana Şablon Dosyası
*/

get_header(); 

?>
	<div id="blog_section" class="<?php echo get_theme_mod('yusuf_sidebar');?>">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
								<div class="post_area">
									<div class="card" style="width: 18rem;">

						<ul class="list-group list-group-flush">
							 <li class="list-group-item">
					<?php if (have_posts()) :?>
						<?php 

						$postEvents = new Wp_Query(array(
							'paged'=> get_query_var('paged', 1),
							'post_type' => 'post',
							'posts_per_page' =>1,
							'orderby' => 'meta_value_num',
							'order'=>'ASC',
		
						));






						while ($postEvents->have_posts()) : $postEvents->the_post(); ?>
					<div class="blog_post">
						<div class="thumbnail">
							<?php 
							if( has_post_thumbnail()) {
							 the_post_thumbnail();
							}else{
								echo '<img src="'.get_bloginfo('stylesheet_directory').'/img/thumbnail.jpg"/>';
							}
						?>
						</div>
						<div class="post_part">
							<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
							<?php the_excerpt();?>
						</div>
					</div>
				<?php endwhile; ?>
				<?php else : ?>
				<h3><?php _e('404 Error; Not found', 'yusuf_biberoglu')?></h3>
				<?php endif; ?>

			</li>
		</ul>

						<?php 
						echo paginate_links(array(
								'total'=>$postEvents->max_num_pages
						));


					 ?>
	</div>
								</div>
						<div class="sidebar_area">
								<?php get_sidebar(); ?>
						</div>
					
				</div>
			
			</div>
		</div>
	</div>

<?php get_footer(); ?>