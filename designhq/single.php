<?php get_header();?>
				
			<div id="left">
				
				
				<?php if (have_posts()){ ?>			
				<?php while (have_posts()) : the_post(); ?>
			
					<div>
						Posted on <?php the_time('F jS, Y');?>. by <?php the_author();?>
					</div>
					<h1><?php the_title();?></h1>
					
					<?php the_content(); ?>
					

				<?php endwhile; ?>
				<?php }?>		
				
				<a href="javascript: history.go(-1)" class="read-more">Back</a>	
			</div>
				
				<?php get_sidebar();?>
				
				<?php get_footer();?>
				