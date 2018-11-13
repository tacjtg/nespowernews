<?php
/**
 * Template part for displaying single posts.
 *
 * @package ultrabootstrap
 */

$image_align = 'left';
$image_align = get_field('nes_featured_image_alignment');
?>
<div class="page-title"><h1><?php the_title(); ?></h1></div>
<div class="single-post">
	<div class="info">
		<ul class="list-inline">
			<?php $archive_year  = get_the_time('Y'); $archive_month = get_the_time('m'); $archive_day   = get_the_time('d'); ?>
			<li><i class="fa fa-calendar"></i> <a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date('d M Y');?></a></li>
		</ul>
	</div>
	<div class="post-content">
		<div class="nes-single-post-thumb" style="float:<?php echo $image_align; ?>">
			<?php nes_featured_image(); ?>  
		</div>
		<article class="">
			<?php the_content();?>
			<?php wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ultrabootstrap' ),
					'after'  => '</div>',
				) ); ?>     
		</article>		
		<div class="post-info">Categories: <?php the_category();?><br />Tags: <?php the_tags();?></div>
	</div><!-- .post-content -->
</div><!-- .single-post -->