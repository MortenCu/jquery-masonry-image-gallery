<?php

	$jmig_options = get_option('jmig_option');

		if(!isset($jmig_options['no_added_css'])) {

			function jmig_html5_gallery() {

				add_theme_support( 'html5', array( 'gallery', 'caption' ) );

			}

				add_action( 'after_setup_theme', 'jmig_html5_gallery');

		}

			function jmig_css() {

				global $post;
				global $wp_styles;

					if( has_shortcode( $post->post_content, 'gallery') ) {

						$jmig_options = get_option('jmig_option');

							if(!isset($jmig_options['no_added_css'])) {

								wp_enqueue_style('jmig_stylesheet_layout',
								plugins_url( '/styles/jmig-masonry-layout.css' , dirname(__FILE__) ),
								array(),
								'2.2'
								);
							}

								wp_enqueue_style('jmig_stylesheet',
									plugins_url( 'styles/jmig-masonry-v3-animation.css' , dirname(__FILE__ ) ),
									array(),
									'2.2'
								);

									if(!isset($jmig_options['fixed_layout'])) {

										$image_width = $jmig_options['image_width'];//get_option( 'thumbnail_size_w' );
										$custom_css_width = '.gallery-item, .gallery-item img, gallery-item a { width: ' . $image_width . 'px !important; max-width: ' . $image_width . 'px !important; min-width: ' . $image_width . 'px !important; }';
										wp_add_inline_style( 'jmig_stylesheet', $custom_css_width );
										
										$image_width = $jmig_options['mobile_image_width'];//get_option( 'thumbnail_size_w' );
										$mobile_custom_css_width = '@media screen and (max-width: 767px) {.gallery-item, .gallery-item img, gallery-item a { width: ' . $image_width . 'px !important; max-width: ' . $image_width . 'px !important; min-width: ' . $image_width . 'px !important; }}';	
										wp_add_inline_style( 'jmig_stylesheet', $mobile_custom_css_width );
									}

										if (!isset($jmig_options['no_added_css'])) {

											if ( $jmig_options['item_margin'] == NULL ) {

												$custom_css_margin = '.gallery-item {margin: 1px !important}';

											}

											else {

												$custom_css_margin = '.gallery-item {margin: ' . $jmig_options['item_margin'] . 'px !important}';

											}

												wp_add_inline_style( 'jmig_stylesheet', $custom_css_margin );
										}


												wp_enqueue_style( 'jmig-lte-IE9',
												plugins_url( 'styles/jmig-lte-ie9.css' , dirname(__FILE__ ) ),
												array(),
												'2.2'
												);

													$wp_styles->add_data( 'jmig-lte-IE9', 'conditional', 'lte IE 9' );

						}

				}

					add_action( 'wp_enqueue_scripts', 'jmig_css', 99 );

			function jmig_js() {

				global $post;

					if( has_shortcode( $post->post_content, 'gallery') ) {

						wp_register_script('masonryInit',
						plugins_url( 'js/masonry-init-v3.js' , dirname(__FILE__ ) ),
						array('masonry'),
						'2.2',
						true);

							wp_enqueue_script('masonryInit');

					}

			}

				add_action( 'wp_enqueue_scripts', 'jmig_js');
?>
