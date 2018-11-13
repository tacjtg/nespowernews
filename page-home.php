<?php
/**
 * Template Name: Front Page 
 * The template used for displaying fullwidth page content in fullwidth.php
 *
 * @package ultrabootstrap
 */
get_header(); ?>

<!-- BEGIN .theme-slider -->
<section class="theme-slider">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">	
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php
	            $cn = get_theme_mod('slider_no_of_posts');
				$cid = get_theme_mod('slider_category_display');
				$category_link = get_category_link($cid);
				$ultrabootstrap_cat = get_category($cid);
				if ($ultrabootstrap_cat) {
		            $args = array( 'posts_per_page' => $cn, 'paged' => 1, 'cat' => $cid );
					$loop = new WP_Query($args);
					$cn = 0;
					if ($loop->have_posts()) :  while ( $loop->have_posts() ) : $loop->the_post(); $cn++;
			?>			
						<div class="item <?php echo $cn == 1 ? 'active' : ''; ?>">
							<?php if(has_post_thumbnail()){
			                	$arg = array( 'class' => 'img-responsive', 'alt' => '' );
								the_post_thumbnail('',$arg);
							} ?>
							<div class="nes-slide-caption-box">
							<div class="slide-caption">
								<div class="container">
									<div class="slide-caption-details">
										<h4><?php the_title();?></h4>
										<div style="clear: both"></div>
										<a href="<?php the_permalink();?>" title="" class="btn btn-nes">Read Article</a>
									</div>
								</div>
							</div>
							</div>
						</div> <!-- /.item -->
					<?php endwhile; wp_reset_postdata(); endif;
				} ?>					
		</div> <!-- /.carousel-inner -->
        <!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><i class="fa fa-angle-left"></i></span>
			<span class="sr-only"><?php _e('Previous' , 'ultrabootstrap' ); ?></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"><i class="fa fa-angle-right"></i></span>
			<span class="sr-only"><?php _e('Next' , 'ultrabootstrap' ); ?></span>
		</a>
	</div> <!-- /.carousel-example-generic -->
</section> <!-- /.section -->
<!-- END .theme-slider -->

<!-- BEGIN .nes-featured -->
<section class="nes-featured">
	<div class="container">
		<?php
            $cid = get_theme_mod('features_display');
            $category_link = get_category_link( $cid );
            $ultrabootstrap_cat = get_category( $cid );
		?>
			<div class="row">
				<?php if( get_theme_mod('featured_video') !='' ) {					
					$args = array( 'posts_per_page' => 1, 'paged' => 1, 'cat' => $cid );
					$loop = new WP_Query( $args );                                   
					if ( $loop->have_posts() ) :  while ( $loop->have_posts() ) : $loop->the_post();
				?>
				<div class="col-lg-6 col-md-6 col-sm-6 nes-featured-block">
					<div class="post-block">
						<?php nes_featured_image(); ?>  
						<!-- summary -->
						<div class="summary"<?php nes_category_color(); ?>>
							<p><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></p>
						</div>
						<!-- summary -->
					</div><!-- .post-block -->
				</div>
				<?php endwhile; wp_reset_postdata(); endif; ?>
				
				<div class="col-lg-6 col-md-6 col-sm-6 nes-featured-video">
					<iframe width="100%" height="250" src="https://www.youtube.com/embed/<?php echo esc_attr( get_theme_mod( 'featured_video' ) );?>?modestbranding=1&autohide=1&showinfo=0" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>					
				</div><!-- /.col -->				
					
				<? } else { 					
					$args = array( 'posts_per_page' => 2, 'paged' => 1, 'cat' => $cid );
					$loop = new WP_Query( $args );                                   
					if ( $loop->have_posts() ) :  while ( $loop->have_posts() ) : $loop->the_post();
					?>
					<div class="col-lg-6 col-md-6 col-sm-6 nes-featured-block">
						<div class="post-block">
							<?php nes_featured_image(); ?>  
							<!-- summary -->
							<div class="summary"<?php nes_category_color(); ?>>
								<p><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></p>
							</div>
							<!-- summary -->
						</div><!-- .post-block -->
					</div>
					<?php endwhile; wp_reset_postdata(); endif;				
				} ?>
      </div><!-- /.row -->
	</div><!-- /.container -->
</section>
<!-- END .nes-featured -->

<!-- BEGIN .welcome -->
<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col col-sm-12 welcome-box">			
				<?php if( get_theme_mod( 'welcome_image' ) != '') { ?>
					<div class="nes-featured-image">
						<a href="<?php echo esc_attr(get_theme_mod( 'welcome_button', '' )); ?>" >
							<img src="<?php echo get_theme_mod('welcome_image'); ?>">
						</a>
					</div>
				<?php } ?>
				<div class="welcome-text">
					<?php if( get_theme_mod( 'welcome_textbox1' ) != '') { ?>
						<h4><?php echo esc_attr(get_theme_mod( 'welcome_textbox1', '' )); ?></h1>
					<?php } ?>
					<p><?php echo esc_attr(get_theme_mod( 'textarea_setting', '' )); ?></p>
				</div>
				<a href="<?php echo esc_attr(get_theme_mod( 'welcome_button', '' )); ?>" title="Read More" class="btn btn-danger"><?php echo esc_attr(get_theme_mod( 'welcome_textbox2', '' )); ?></a>
			</div> 
		</div>          
	</div>
</section>
<!-- END .welcome -->

<!-- BEGIN Header Image -->
<?php if (has_header_image()): ?>
	<div class="text-center">
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	</div>
<?php endif;?>
<!-- END Header Image -->

<!-- BEGIN .post-list  -->
<section class="post-list">
	<div class="container">
		<div class="row">
			<div class="<?php if ( is_active_sidebar( 'nes-home-sidebar' ) ) { echo 'col-lg-9 col-md-9 col-sm-8'; } else { echo 'col-lg-12'; } ?>">
				<div class="row">
					<?php
						if ( is_active_sidebar( 'nes-home-sidebar' ) ) { $args = array( 'posts_per_page' => 9, 'paged' => 1 ); } else { $args = array( 'posts_per_page' => 8, 'paged' => 1 ); }
						$loop = new WP_Query( $args );                                   
						if ( $loop->have_posts() ) :  while ( $loop->have_posts() ) : $loop->the_post();
					?>
						<div class="nes-post-block <?php if ( is_active_sidebar( 'nes-home-sidebar' ) ) { echo 'col-lg-4 col-md-4 col-sm-6 eq-blocks'; } else { echo 'col-lg-3 col-md-3 col-sm-6 eq-blocks'; } ?>">
							<div class="post-block">
								<?php nes_featured_image(); ?>  
								<!-- summary -->
								<div class="summary"<?php nes_category_color(); ?>>
									<p><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></p>
								</div>
								<!-- summary -->
							</div>
						</div>
					<?php endwhile; wp_reset_postdata(); endif; ?>
				</div>
			</div>			
			<!-- BEGIN .nes-home-sidebar -->
			<?php if ( is_active_sidebar( 'nes-home-sidebar' ) ) { ?>
			<div class="col-lg-3 col-md-3 col-sm-4">
				<div class="nes-home-sidebar">
					<?php dynamic_sidebar( 'nes-home-sidebar' ); ?>
				</div>
			</div>
			<?php } ?>
			<!-- END .nes-home-sidebar -->
		</div> <!-- /.row -->
	</div> <!-- /.container -->
</section> <!-- /.section -->
<!-- END .post-list  -->
<?php get_footer();