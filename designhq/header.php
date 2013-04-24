<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php bloginfo('name');?></title>
	<meta name="Robots" content="index,follow" />
	<meta name="author" content="Borut Jegrišnik (www.solucija.com)" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/main.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/prettyphoto/css/prettyPhoto.css" media="screen" />
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/core.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/pngFix/jquery.pngFix.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/prettyphoto/js/jquery.prettyPhoto.js"></script>
	<!--[if IE 6]>
	<style>
		#pitch .infoline {margin-top:-74px;}
		.post-options {margin:-55px 0 40px 138px;}
	</style>
	<![endif]-->

</head>
<body>
	<div id="wrapper">
		<div id="logo">
			<h1><a href="<?php bloginfo('url');?>">DESIGN<span>HQ</span></a></h1>
		</div>
		
		<div id="content">
			
			
			<?php 
				$params = array(
					'theme_location'=>'main',
					'depth'=>2,
					'container' => '',
					'container_class' => '',
					'items_wrap' => '<ul class="menu" id="jMenu">%3$s</ul>',
					'walker'=>new designhq_walker()
				);
				wp_nav_menu($params); 
			?>		
			
			
			<?php get_search_form();?>
			
			
			<div class="x"></div>
			
			
			<!-- BANNER PLUGIN -->
			<div id="pitch">
				<div class="pitch-gallery">
					<div class="pitch-gallery-holder" id="gallery-pitch-holder">
						<div class="pitch-gallery-div">
							<img src="<?php bloginfo('template_url'); ?>/images/big-image.jpg" alt="Pitch 1" />		
							<div class="infoline">Hello! We are professional team of designers and we would like to share our passion with you!</div>					
						</div>					
					</div>
				</div>
			</div>
			<!-- BANNER PLUGIN -->
			
			<div id="center">