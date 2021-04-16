<?php 

/**
* Kategori
*/





get_header(); ?>




<div id="blog_section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					Kategori
					<?php the_archive_title('<h2 class="btn-success text-center">','</h2>'); ?>
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
				
			</li>
		</ul>
	</div>
				</div>
			
			</div>
		</div>
	</div>







<?php get_footer(); ?>