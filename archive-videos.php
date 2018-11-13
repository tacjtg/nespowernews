<?php get_header(); ?>
<div class="spacer">
<div class="container">
<section class="page-section">
          
      <div class="<?php echo $class;?> detail-content">
	      <h4 style="margin: 30px 0;">Videos</h4>

<?php	
	$args = array(
		'orderby' 				=> 'date',
		'order'  					=> 'DESC',
		'post_type'				=> 'videos',
		'posts_per_page' 	=> -1,
	);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
?>
<div>
		
		<div class="row nes-video-block">
			<div class="col-lg-3 col-md-3 col-sm-3 nes-featured-video">
				<iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php the_field('video_id');?>?modestbranding=1&autohide=1&showinfo=0" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>					
			</div><!-- /.col -->
			<div class="col-lg-9 col-md-9 col-sm-9">
				<div class="post-block">
						<!-- summary -->
						<div class="summary">
							<h3 class="nes-video-title"><?php the_title(); ?></h3>
							<p><?php the_field('video_description');?></p>
						</div>
						<!-- summary -->
					</div><!-- .post-block -->
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<!--<img src="<?php the_field('video_thumbnail');?>"/>-->
</div>																			                  
<?php	
	endwhile;
	endif;
	wp_reset_query(); 
?>

          </div> <!-- /.end of detail-content -->

  
</section><!-- /.end of section -->
</div>
</div>
<?php get_footer();