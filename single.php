<?php
/**
 * The template for displaying all single posts.
 *
 * @package ultrabootstrap
 */

get_header(); ?>
<div class="spacer nes-single">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<section class="page-section">
					<div class="detail-content">
						<?php while ( have_posts() ) : the_post(); ?>                    
							<?php get_template_part( 'template-parts/content', 'single' ); ?>
						<?php endwhile; // End of the loop. ?>
						<?php comments_template(); ?>
					</div><!-- /.end of deatil-content -->
				</section> <!-- /.end of section -->  
			</div>
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer();