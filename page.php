<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ultrabootstrap
 */

get_header(); ?>
<div class="spacer nes-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<section class="page-section">					
					<div class="detail-content">            
		            	<?php while ( have_posts() ) : the_post();
			            		get_template_part( 'template-parts/content', 'page' );
							endwhile; 
							comments_template(); ?>         
		        	</div> <!-- /.end of detail-content -->	
				</section><!-- /.end of section -->
			</div>
			<div class="col-sm-3"><?php get_sidebar(); ?></div>
		</div>
	</div>
</div>
<?php get_footer();