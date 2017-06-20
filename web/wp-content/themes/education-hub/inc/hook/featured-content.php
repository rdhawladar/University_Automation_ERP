<?php
/**
 * Implementation of featured content.
 *
 * @package Education_Hub
 */

// Add featured content to the theme.
add_action( 'education_hub_action_before_content', 'education_hub_add_featured_content', 6 );

// Featured content details.
add_filter( 'education_hub_filter_featured_content_details', 'education_hub_get_featured_content_details' );

if ( ! function_exists( 'education_hub_get_featured_content_details' ) ) :
	/**
	 * Featured content details.
	 *
	 * @since 1.0.0
	 *
	 * @param array $input Featured content details.
	 */
	function education_hub_get_featured_content_details( $input ) {

		$featured_content_type   = education_hub_get_option( 'featured_content_type' );
		$featured_content_number = education_hub_get_option( 'featured_content_number' );

		switch ( $featured_content_type ) {

			case 'featured-page':

				$ids = array();

				for ( $i = 1; $i <= $featured_content_number ; $i++ ) {
					$id = education_hub_get_option( 'featured_content_page_' . $i );
					if ( ! empty( $id ) ) {
						$ids[] = absint( $id );
					}
				}
				// Bail if no valid pages are selected.
				if ( empty( $ids ) ) {
					return $input;
				}

				$qargs = array(
					'posts_per_page' => esc_attr( $featured_content_number ),
					'no_found_rows'  => true,
					'orderby'        => 'post__in',
					'post_type'      => 'page',
					'post__in'       => $ids,
				);

				// Fetch posts.
				$all_posts = get_posts( $qargs );
				$contents = array();

				if ( ! empty( $all_posts ) ) {

					$cnt = 0;
					foreach ( $all_posts as $key => $post ) {

							$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'education-hub-thumb' );
							$contents[ $cnt ]['images']  = $image_array;
							$contents[ $cnt ]['title']   = esc_html( $post->post_title );
							$contents[ $cnt ]['url']     = esc_url( get_permalink( $post->ID ) );
							$contents[ $cnt ]['excerpt'] = education_hub_the_excerpt( apply_filters( 'education_hub_filter_featured_content_excerpt_length', 40 ), $post );

							$cnt++;
					}
				}
				if ( ! empty( $contents ) ) {
					$input = $contents;
				}
			break;

			default:
			break;
		}
		return $input;

	}
endif;

if ( ! function_exists( 'education_hub_add_featured_content' ) ) :
	/**
	 * Add featured content.
	 *
	 * @since 1.0.0
	 */
	function education_hub_add_featured_content() {

		$flag_apply_featured_content = apply_filters( 'education_hub_filter_featured_content_status', true );
		if ( true !== $flag_apply_featured_content ) {
			return false;
		}

		$content_details = array();
		$content_details = apply_filters( 'education_hub_filter_featured_content_details', $content_details );

		if ( empty( $content_details ) ) {
			return;
		}
		// nspre( $content_details );

		// Render content now.
		education_hub_render_featured_content( $content_details );

	}

endif;

if ( ! function_exists( 'education_hub_render_featured_content' ) ) :
	/**
	 * Render featured content.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content_details Details of featured content.
	 */
	function education_hub_render_featured_content( $content_details = array() ) {

		if ( empty( $content_details ) ) {
			return;
		}
		?>
		<div id="featured-content">
			<div class="container">
				<div class="inner-wrapper featured-content-column-<?php echo absint( count( $content_details ) ); ?>">
				<?php foreach ($content_details as $content ): ?>
					<article>
						<header class="entry-header test"><h2 class="entry-title">testing12<a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_attr( $content['title'] ); ?></a></h2></header>
						<?php if ( ! empty( $content['images'] ) ): ?>
							<a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['images'][0]); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>" width="<?php echo esc_attr( $content['images'][1]); ?>" height="<?php echo esc_attr( $content['images'][2]); ?>" /></a>
						<?php endif; ?>
						<div class="entry-content">
							<div>
								<?php
								$excerpt_content = wp_kses_post( $content['excerpt'] );
								echo wpautop( $excerpt_content );
								?>
							</div>
						</div>
					</article>
				<?php endforeach ?>
				</div>
			</div>
		</div>

		<?php

	}

endif;

// Check slider status.
add_filter( 'education_hub_filter_featured_content_status', 'education_hub_check_featured_content_status' );

/**
 * Check status of featured content.
 *
 * @since 1.0.0
 */
if( ! function_exists( 'education_hub_check_featured_content_status' ) ):

  function education_hub_check_featured_content_status( $input ){

    global $post, $wp_query;

    // Featured content status.
    $featured_content_status = education_hub_get_option( 'featured_content_status' );

    // Get Page ID outside Loop.
    $page_id = $wp_query->get_queried_object_id();

    // Front page displays in Reading Settings.
    $page_on_front  = get_option( 'page_on_front' );
    $page_for_posts = get_option( 'page_for_posts' );

    if ( ( absint( $page_on_front ) === absint( $page_id ) && absint( $page_on_front ) > 0 ) && ( 'home-page' === $featured_content_status ) ) {
		$input = true;
    }
    else {
		$input = false;
    }
    return $input;

  }

endif;
