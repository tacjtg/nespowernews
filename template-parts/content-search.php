<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ultrabootstrap
 */

?>

<div class="col-lg-4 col-md-4 col-sm-6 eq-blocks nes-post-block">
    <div class="post-block">
    		<?php nes_featured_image(); ?>  
		<div class="summary"<?php nes_category_color(); ?>>
        <p><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></p>
    	</div>
	</div>
</div>