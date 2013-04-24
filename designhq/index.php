<?php get_header();?>
				
			<div id="left">
				<h1>Blog</h1>
				
				<?php if (have_posts()){ ?>			
				<?php while (have_posts()) : the_post(); ?>
			
				<div class="post">					
					<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
					<?php the_excerpt();?>
				</div>
				<div class="post-options">
					<a href="<?php the_permalink();?>" class="read-more">Read more</a> | Posted on <?php the_time('F jS, Y');?>. by <?php the_author();?>
				</div>
				<div class="x"></div>

				<?php endwhile; ?>
					
					<div class="navigation">
						<div class="alignleft"><?php next_posts_link('Previous entries') ?></div>
						<div class="alignright"><?php previous_posts_link('Next entries') ?></div>
					</div>
					
				<?php }else{
					echo "<p>No posts found</p>";
				}?>			
			</div>
				
				<?php get_sidebar();?>
				
				<?php get_footer();?>
				