<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ultrabootstrap
 */

?>

		<!-- Tab to top scrolling -->
		<div class="scroll-top-wrapper"> <span class="scroll-top-inner">
  			<i class="fa fa-2x fa-angle-up"></i>
    		</span>
    	</div> 
		<section class="footers nes-contact-footer">
		<div class="container footers">
			<div class="row nes-email-form justify-content-center">
				<div class="col-lg-8 col-md-86 col-sm-8 nes-footer-form">
					<h2>Media Inquiries</h2>
					<p>Call <a href="tel:615-351-4530">615-351-4530</a>, email <a href="mailto:media@nespower.com">media@nespower.com</a> or fill out the form below.</p>
					<?php echo do_shortcode('[ninja_form id=1]'); ?>
				</div>
			</div>
        <div class="row">
            <?php dynamic_sidebar( 'footer-1' ); ?>
            <?php dynamic_sidebar( 'footer-2' ); ?>
            <?php dynamic_sidebar( 'footer-3' ); ?>
            <?php dynamic_sidebar( 'footer-4' ); ?>
        </div>
    </div>
		</section>
		<footer>
		<div class="container">

				<?php 
                    $show_social_in_footer = get_theme_mod('socialicon_display' );
                    {?>   
			        <div class="pull-left">
				            <ul class="list-inline social">
	                            <?php 
	                            $facebook =  esc_url(get_theme_mod ('facebook_textbox'));
	                            $twitter = esc_url(get_theme_mod('twitter_textbox'));
	                            $googleplus = esc_url(get_theme_mod('googleplus_textbox'));
	                            $youtube = esc_url(get_theme_mod('youtube_textbox'));
	                            $linkedin = esc_url(get_theme_mod('linkedin_textbox'));
	                            $pinterest = esc_url(get_theme_mod('pinterest_textbox'));
	                            if($facebook){?>
	                              <li><a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a></li>
	                            <?php }
	                            if($twitter){?>
	                              <li><a href="<?php echo $twitter;?>"><i class="fa fa-twitter"></i></a></li>
	                            <?php }
	                            if($googleplus) {?>
	                              <li><a href="<?php echo $googleplus;?>"><i class="fa fa-google-plus"></i></a></li>
	                            <?php }
	                            if($youtube){?>
	                              <li><a href="<?php echo $youtube;?>"><i class="fa fa-youtube-play"></i></a></li>
	                            <?php }
	                            if($linkedin){?>
	                              <li><a href="<?php echo $linkedin;?>"><i class="fa fa-linkedin"></i></a></li>
	                            <?php }
	                            if($pinterest){?>
	                              <li><a href="<?php echo $pinterest;?>"><i class="fa fa-pinterest"></i></a></li>
	                            <?php }?>
                        	</ul>
					</div>
				<?php }?> 
				
			    <div class="pull-right"></div>
			    </div>

		</footer>
		<p class="nes-copyright">NES Power News provided by NES Power &copy; <?php echo date("Y"); ?>.</p>

		<?php wp_footer(); ?>
	</body>
</html>