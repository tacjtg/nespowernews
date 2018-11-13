<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ultrabootstrap
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	
	<!--Google Analytics-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54040755-1', 'auto');
  ga('send', 'pageview');

</script>
	
</head>

<body <?php body_class(); ?>>

<header>	
<section class="logo-menu">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only"><?php _e('Toggle navigation' , 'ultrabootstrap' ); ?></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
				      	</button>
				      	<div class="logo-tag">				      		
				      			<?php if ( has_custom_logo()): the_custom_logo(); else: ?>
				      			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h1 class="site-title" ><?php echo bloginfo( 'name' ); ?></h1>
				      			<h2 class="site-description" ><?php bloginfo('description'); ?></h2><?php endif; ?></a>                          						
      					</div>
				    </div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<form  class="navbar-form navbar-left" role="search">
							<ul class="nav pull-right">
								<div class="main-search">
									<button class="btn btn-search" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
									  <i class="fa fa-search"></i>
									</button>
									<div class="search-box collapse" id="collapseExample">
										<div class="well search-well">
										    <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                          						<input type="text" class="form-control" placeholder="<?php echo __('Search a Keyword','ultrabootstrap');?>" value="<?php echo get_search_query(); ?>" name="s">
                          					</form>
										</div>
									</div>
								</div>
							</ul>
						</form>
  							
						<?php
				            wp_nav_menu( array(
				                'menu'              => 'primary',
				                'theme_location'    => 'primary',
				                'depth'             => 8,
				                'container'         => 'div',
				                'menu_class'        => 'nav navbar-nav navbar-left',
				                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				                'walker'            => new ultrabootsrap_wp_bootstrap_navwalker())
				            );
				        ?>
				        <?php
				            wp_nav_menu( array(
				                'menu'              => 'category',
				                'theme_location'    => 'category-menu',
				                'depth'             => 8,
				                'container'         => 'div',
				                'menu_class'        => 'nav navbar-nav navbar-right nes-category-menu',
				                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				                'walker'            => new ultrabootsrap_wp_bootstrap_navwalker())
				            );
				        ?>
				    </div> <!-- /.end of collaspe navbar-collaspe -->
	</div> <!-- /.end of container -->
	</nav>
</section> <!-- /.end of section -->
</header>