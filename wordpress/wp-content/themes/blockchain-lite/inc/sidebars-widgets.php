<?php
/**
 * Blockchain_Lite sidebars and widgets related functions.
 */

/**
 * Register widget areas.
 */
function blockchain_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog', 'blockchain-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets added here will appear on the blog section.', 'blockchain-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page', 'blockchain-lite' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Widgets added here will appear on the static pages.', 'blockchain-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	if ( class_exists( 'WooCommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop', 'blockchain-lite' ),
			'id'            => 'shop',
			'description'   => esc_html__( 'Widgets added here will appear on the shop page.', 'blockchain-lite' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	register_sidebar( array(
		'name'          => esc_html__( 'Footer - 1st column', 'blockchain-lite' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Widgets added here will appear on the first footer column.', 'blockchain-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - 2nd column', 'blockchain-lite' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Widgets added here will appear on the second footer column.', 'blockchain-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - 3rd column', 'blockchain-lite' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Widgets added here will appear on the third footer column.', 'blockchain-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer - 4th column', 'blockchain-lite' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Widgets added here will appear on the fourth footer column.', 'blockchain-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'blockchain_lite_widgets_init' );


function blockchain_lite_load_widgets() {
	require get_template_directory() . '/inc/widgets/socials.php';
	require get_template_directory() . '/inc/widgets/latest-post-type.php';

	register_widget( 'CI_Widget_Socials' );
	register_widget( 'CI_Widget_Latest_Post_Type' );
}
add_action( 'widgets_init', 'blockchain_lite_load_widgets' );

function blockchain_lite_footer_widget_area_classes( $layout ) {
	switch ( $layout ) {
		case '3-col':
			$classes = array(
				'footer-1' => array(
					'active' => true,
					'class'  => 'col-lg-4 col-12',
				),
				'footer-2' => array(
					'active' => true,
					'class'  => 'col-lg-4 col-12',
				),
				'footer-3' => array(
					'active' => true,
					'class'  => 'col-lg-4 col-12',
				),
				'footer-4' => array(
					'active' => false,
					'class'  => '',
				),
			);
			break;
		case '2-col':
			$classes = array(
				'footer-1' => array(
					'active' => true,
					'class'  => 'col-md-6 col-12',
				),
				'footer-2' => array(
					'active' => true,
					'class'  => 'col-md-6 col-12',
				),
				'footer-3' => array(
					'active' => false,
					'class'  => '',
				),
				'footer-4' => array(
					'active' => false,
					'class'  => '',
				),
			);
			break;
		case '1-col':
			$classes = array(
				'footer-1' => array(
					'active' => true,
					'class'  => 'col-12',
				),
				'footer-2' => array(
					'active' => false,
					'class'  => '',
				),
				'footer-3' => array(
					'active' => false,
					'class'  => '',
				),
				'footer-4' => array(
					'active' => false,
					'class'  => '',
				),
			);
			break;
		case '1-3':
			$classes = array(
				'footer-1' => array(
					'active' => true,
					'class'  => 'col-lg-3 col-md-6 col-12',
				),
				'footer-2' => array(
					'active' => true,
					'class'  => 'col-lg-9 col-md-6 col-12',
				),
				'footer-3' => array(
					'active' => false,
					'class'  => '',
				),
				'footer-4' => array(
					'active' => false,
					'class'  => '',
				),
			);
			break;
		case '3-1':
			$classes = array(
				'footer-1' => array(
					'active' => true,
					'class'  => 'col-lg-9 col-md-6 col-12',
				),
				'footer-2' => array(
					'active' => true,
					'class'  => 'col-lg-3 col-md-6 col-12',
				),
				'footer-3' => array(
					'active' => false,
					'class'  => '',
				),
				'footer-4' => array(
					'active' => false,
					'class'  => '',
				),
			);
			break;
		case '1-1-2':
			$classes = array(
				'footer-1' => array(
					'active' => true,
					'class'  => 'col-lg-3 col-md-6 col-12',
				),
				'footer-2' => array(
					'active' => true,
					'class'  => 'col-lg-3 col-md-6 col-12',
				),
				'footer-3' => array(
					'active' => true,
					'class'  => 'col-lg-6 col-12',
				),
				'footer-4' => array(
					'active' => false,
					'class'  => '',
				),
			);
			break;
		case '2-1-1':
			$classes = array(
				'footer-1' => array(
					'active' => true,
					'class'  => 'col-lg-6 col-12',
				),
				'footer-2' => array(
					'active' => true,
					'class'  => 'col-lg-3 col-md-6 col-12',
				),
				'footer-3' => array(
					'active' => true,
					'class'  => 'col-lg-3 col-md-6 col-12',
				),
				'footer-4' => array(
					'active' => false,
					'class'  => '',
				),
			);
			break;
		case '4-col':
		default:
			$classes = array(
				'footer-1' => array(
					'active' => true,
					'class'  => 'col-lg-3 col-md-6 col-12',
				),
				'footer-2' => array(
					'active' => true,
					'class'  => 'col-lg-3 col-md-6 col-12',
				),
				'footer-3' => array(
					'active' => true,
					'class'  => 'col-lg-3 col-md-6 col-12',
				),
				'footer-4' => array(
					'active' => true,
					'class'  => 'col-lg-3 col-md-6 col-12',
				),
			);
	}

	return apply_filters( 'blockchain_lite_footer_widget_area_classes', $classes, $layout );
}
