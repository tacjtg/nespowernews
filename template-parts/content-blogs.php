<?php
/**
 * Template part for displaying blog posts.
 *
 * @package ultrabootstrap
 */

?>


<div class="single-post">
    <div class="info">
        <ul class="list-inline">
            <li><i class="fa fa-user"></i>  &nbsp;<?php echo get_the_author_meta('display_name');?></li>
            <li><i class="fa fa-calendar"></i> <?php echo get_the_date('d M Y');?></li>
            <li><i class="fa fa-comments-o"></i> &nbsp; <?php comments_popup_link('zero comment','one comment', '% comments');?></li>
        </ul>
    </div>
    <div class="post-content">
        <figure>
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('portfolio-thumb'); ?></a>
                <?php else : ?>
                <a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo get_template_directory_uri(); ?>/images/no-blog-thumbnail.jpg" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" /></a>
            <?php endif; ?>  
            <figcaption><?php the_post_thumbnail_caption(); ?></figcaption>
        </figure>
        <article class="contents">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><h1 class="post-title"><?php the_title(); ?></h1></a>
            <?php echo ultrabootstrap_content(60); ?>
        </article>
        <div class="bottom-info">
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="" class="btn btn-primary pull-left">Read More <i class="fa fa-angle-double-right"></i></a>
            <div class="clearfix visible-xs"></div>
            <div class="tag-cat pull-right">
                <ul class="list-inline">
                  <li><i class="fa fa-folder-open"></i> <?php the_category();?></li>
                  <li><i class="fa fa-tags"></i><?php the_tags();?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>