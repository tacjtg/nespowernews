<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ultrabootstrap
 */

get_header(); ?>
<div class="spacer post-list nes-archive">
    <div class="container">
        <div class="row">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) {
				echo '<div class="col-md-9">';
			} else {
				echo '<div class="col-md-12">';
			}			
				if ( have_posts() ) {					
					the_archive_title( '<h4>', '</h4>' );
	                the_archive_description( '<div class="taxonomy-description">', '</div>' );
					echo '<div class="row">';
					
					while ( have_posts() ) { 
						the_post(); 
				        get_template_part( 'template-parts/content');
					}	
				} else {
					echo '<div class="row">';
					get_template_part( 'template-parts/content', 'none' ); 
				} ?>
        			</div><!-- .row -->
					<div class="page-nav"><?php the_posts_navigation(); ?></div>
				</div><!-- .col-md-9/12 -->
			<?php if ( is_active_sidebar( 'nes-home-sidebar' ) ) { ?>
				<div class="col-md-3 nes-sidebar"><?php get_sidebar('sidebar-1'); ?></div>
			<?php } ?>  		
    	</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .post-list -->
<?php get_footer();