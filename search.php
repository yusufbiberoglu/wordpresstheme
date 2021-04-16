<?php 

/*
* Arama sonuç sayfası
*/

get_header(); 

?>
	<div id="blog_section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="search_title">
						<?php printf( __('Arama sonuçları: %s', 'yusuf_biberoglu'), get_search_query()); ?>
					</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="card" style="width: 18rem;">
						<ul class="list-group list-group-flush">
							 <li class="list-group-item">
					<?php if (have_posts()) :?>
						<?php while (have_posts()) : the_post(); ?>
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
				<div class="pagenavarea">
					<div id="pagenavi">
						<?php if('yusuf_pagenav') {yusuf_pagenav(); }else{ ?>
							<?php next_posts_link('<span class="alignright">Önceki</span>')?>
							<?php previous_posts_link('<span class="alignright">Sonraki</span>')?>

						<?php } ?>
					</div>
				</div>
			</li>
		</ul>
	</div>
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>