<?php get_header(); ?>
					
				<?php if(have_posts()) : while(have_posts()) : the_post(); 
						$meta = get_post_meta($post->ID, 'Page', true);
						$table_title = get_post_meta($post->ID, 'Table Title', true);
						$table_links = get_post_meta($post->ID, 'Table Link', false);
				?>
				
				<?php
					if($meta['newsletter'] == 1) {
				?>
				<div id="banner">
					
					<form action="" method="post">
						<p>
							<input type="hidden" value="s" name="na" />
							<input type="text" name="nn" value="Name" />
						</p>
						<p>
							<input type="text" name="ne" value="Email" class="left" />
							<input type="submit" name="submit" value="" class="submit left" />
						</p>
					</form>
					
					<br class="clear" />
				</div><!-- /banner-->
				<br />
				<?php
					}
				?>

				<div id="content">
					
					<?php if($table_title) { ?>
					<div class="a_table">
						
						<h2><?php echo $table_title; ?></h2>
						
						<ul>
							<?php foreach($table_links as $link) {
								$info = explode("|", $link);
							?>
							<li><a href="<?php echo $info[1]; ?>"><?php echo $info[0]; ?></a></li>
							<?php } ?>
						</ul>
						
						<br class="clear" />
					</div><!-- /a_table-->
					<?php } ?>
					
					<h1><?php the_title(); ?></h1>
					<p class="meta">Date: <span><?php the_time("F j, Y"); ?></span> Writen by <span><?php the_author(); ?></span></p>
					
					<?php the_content(); ?>
					
					<br class="clear" />
					
					<?php the_tags( '<p class="tags">Tags: ', ', ', '</p>'); ?>
					
				<?php endwhile; endif; ?>
				
				<?php comments_template(); ?>
			
				</div><!-- /content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>