<?php get_header(); ?>
	
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					
				<div class="news">
					
					<h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
					
					<div class="thumbnail">
						<?php the_post_thumbnail(); ?>
					</div><!-- /thumbnail-->
					<p class="meta">Date: <span><?php the_time("F j, Y"); ?></span></p>
					<?php the_excerpt(); ?>
					
					<a class="readmore" href="<?php the_permalink();?>">Read more..</a>
					
					<br class="clear" />
				</div><!-- /news-->
					
				<?php endwhile; ?>
					
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
					<br class="clear" />
				</div>
				
				<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>