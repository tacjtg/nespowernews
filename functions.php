<?php
	
add_action( 'wp_enqueue_scripts', 'nes_enqueue_styles' );
add_action( 'customize_controls_enqueue_scripts', 'nes_remove_ultrabootstrap_customizer_js', 999 );
add_action( 'customize_register', 'nes_customizer', 99);

add_action( 'init', 'nes_category_menu' );
add_action( 'widgets_init', 'nes_home_sidebar' );
add_action('widgets_init', 'nes_recent_widget_registration');
add_image_size( 'nes-featured-image', 1200, 9999 ); // 1200 pixels wide (and unlimited height)
add_filter('pre_get_posts','nes_search_filter');

function nes_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css?family=Roboto:400,500,700,900', false );
	wp_enqueue_script( 'ultrabootstrap-customizer', get_template_directory_uri() . '/js/customizer.js', '1.0.0', true ); 
}

function nes_remove_ultrabootstrap_customizer_js() {
    wp_dequeue_script('ultra-customizer-js' );
}

function nes_home_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'Homepage Sidebar', 'nespowernews' ),
            'id' => 'nes-home-sidebar',
            'description' => __( 'Homepage Sidebar', 'nespowernews' ),
            'before_widget' => '<div class="nes-home-widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="nes-home-widget-title">',
            'after_title' => '</h3>',
        )
    );
}

function nes_category_menu() {
	register_nav_menu('category-menu',__( 'Category Menu' ));
}

function nes_customizer( $wp_customize ) {
	
	// Remove Customizer Settings/Controls
	$wp_customize->remove_setting( 'welcome_textbox2' );
	$wp_customize->remove_control( 'welcome_textbox2' );
	$wp_customize->remove_setting( 'features_title' );
	$wp_customize->remove_control( 'features_title' );	
	$wp_customize->remove_setting( 'featured_no_of_posts' );
	$wp_customize->remove_control( 'featured_no_of_posts' );
	
	// Re-Add Settings to bottom of panel
	$wp_customize->add_setting(
        'welcome_textbox2',
		array(
			'sanitize_callback' => 'ultrabootstrap_sanitize_text',
            'default' => '',
		)
	);

	$wp_customize->add_control(
        'welcome_textbox2',
		array(
			'label' => __('Welcome Button Text','ultrabootstrap'),
			'section' => 'welcome_text',
			'settings' => 'welcome_textbox2',
			'type' => 'text',
		)
	);
	
	// Add New Settings
	$wp_customize->add_setting(
		'welcome_image',
		array(
	        'default' => '',
	        'type' => 'theme_mod',
	        'sanitize_callback' => 'esc_url_raw',
	        'capability' => 'edit_theme_options',
		)
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control( $wp_customize,
        'welcome_image',
        array(
			'label' => __('Welcome Image', 'ultrabootstrap'),
			'section' => 'welcome_text',
			'settings' => 'welcome_image',
		))
    );
    
    $wp_customize->add_setting(
        'featured_video',
		array(
			'sanitize_callback' => 'ultrabootstrap_sanitize_text',
            'default' => '',
		)
	);

	$wp_customize->add_control(
        'featured_video',
		array(
			'label' => __('Featured Video Unique ID','ultrabootstrap'),
			'section' => 'features_category',
			'settings' => 'featured_video',
			'type' => 'text',
		)
	);
			
	// Rename Customizer Panel/Sections
	$wp_customize->get_panel( 'theme_option')->title = __( 'NES Power News Options', 'ultrabootstrap' );
	$wp_customize->get_panel( 'theme_option')->description = __( 'NES Power News Options', 'ultrabootstrap' );
	$wp_customize->get_section( 'features_category')->title = __( 'Featured Posts' );
	$wp_customize->get_section( 'features_category')->priority = 60;	
    
}

// Template Function - Featured Image
function nes_featured_image() {
	if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark" class="featured-image">
			<?php the_post_thumbnail('nes-featured-image'); ?>
		</a>
	<?php } elseif ( get_theme_mod( 'default_thumbnail' ) != '') { ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<img src="<?php echo esc_attr( get_theme_mod('default_thumbnail')); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" />
		</a>
	<?php } else { ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark" class="featured-image">
			<img src="<?php echo get_template_directory_uri(); ?>/images/no-blog-thumbnail.jpg" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" />
		</a>
	<?php }
	if ( is_single() && get_post(get_post_thumbnail_id())->post_excerpt) { ?>
		<div class="nes-featured-image-caption">
			<?php echo wp_kses_post(get_post(get_post_thumbnail_id())->post_excerpt); // displays the image caption ?>
		</div>
	<?php }
}

// Template Function - Category Colors
function nes_category_color() {
	if ( in_category( 'press-release' ) ) {
		echo ' style="background-color: #febf4d !important;"';
	} elseif ( in_category( 'nes-power-news' ) ) {
		echo ' style="background-color: #f16639 !important;"';
	} elseif ( in_category( 'nes-in-the-news' ) ) {
		echo ' style="background-color: #78bc53 !important;"';
	} else {
		echo ' style="background-color: #3457a5 !important;"';
	}
}

function nes_search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
	}

function nes_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('NES_Recent_Posts_Widget');
}

// Rebuild the Recent Posts Widget to Place Date on Top
Class NES_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

        function widget($args, $instance) {

                if ( ! isset( $args['widget_id'] ) ) {
                $args['widget_id'] = $this->id;
            }

            $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

            /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
            $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

            $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
            if ( ! $number )
                $number = 5;
            $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

            /**
             * Filter the arguments for the Recent Posts widget.
             *
             * @since 3.4.0
             *
             * @see WP_Query::get_posts()
             *
             * @param array $args An array of arguments used to retrieve the recent posts.
             */
            $r = new WP_Query( apply_filters( 'widget_posts_args', array(
                'posts_per_page'      => $number,
                'no_found_rows'       => true,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            ) ) );

            if ($r->have_posts()) :
            ?>
            <?php echo $args['before_widget']; ?>
            <?php if ( $title ) {
                echo $args['before_title'] . $title . $args['after_title'];
            } ?>
            <ul>
            <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                <li>
                <?php if ( $show_date ) : ?>
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                <?php endif; ?>
                    <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>                
                </li>
            <?php endwhile; ?>
            </ul>
            <?php echo $args['after_widget']; ?>
            <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

            endif;
        }
}