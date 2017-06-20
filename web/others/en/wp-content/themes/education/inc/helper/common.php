<?php
/**
 * Common helper functions.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_the_excerpt' ) ) :

	/**
	 * Generate excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length Excerpt length in words.
	 * @param WP_Post $post_obj WP_Post instance (Optional).
	 * @return string Excerpt.
	 */
	function education_hub_the_excerpt( $length = 40, $post_obj = null ) {

		global $post;
		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}
		$length = absint( $length );
		if ( $length < 1 ) {
			$length = 40;
		}
		$source_content = $post_obj->post_content;
		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;

	}

endif;

if ( ! function_exists( 'education_hub_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 *
	 * @link: https://gist.github.com/melissacabral/4032941
	 *
	 * @param  array $args Arguments
	 */
	function education_hub_simple_breadcrumb( $args = array() ) {

		$args = wp_parse_args( (array) $args, array(
			'separator' => '&gt;',
		) );

		/* === OPTIONS === */
		$text['home']     = get_bloginfo( 'name' ); // text for the 'Home' link
		$text['category'] = __( 'Archive for <em>%s</em>', 'education-hub' ); // text for a category page
		$text['tax']      = __( 'Archive for <em>%s</em>', 'education-hub' ); // text for a taxonomy page
		$text['search']   = __( 'Search results for: <em>%s</em>', 'education-hub' ); // text for a search results page
		$text['tag']      = __( 'Posts tagged <em>%s</em>', 'education-hub' ); // text for a tag page
		$text['author']   = __( 'View all posts by <em>%s</em>', 'education-hub' ); // text for an author page
		$text['404']      = __( 'Error 404', 'education-hub' ); // text for the 404 page

		$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
		$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
		$delimiter   = ' ' . $args['separator'] . ' '; // delimiter between crumbs
		$before      = '<span class="current">'; // tag before the current crumb
		$after       = '</span>'; // tag after the current crumb
		/* === END OF OPTIONS === */

		global $post;
		$homeLink   = esc_url( home_url( '/' ) );
		$linkBefore = '<span typeof="v:Breadcrumb">';
		$linkAfter  = '</span>';
		$linkAttr   = ' rel="v:url" property="v:title"';
		$link       = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

		if ( is_home() || is_front_page() ) {

			if ( $showOnHome == 1 ) { echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>'; }
		} else {

			echo '<div id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf( $link, $homeLink, $text['home'] ) . $delimiter;

			if ( is_category() ) {
				$thisCat = get_category( get_query_var( 'cat' ), false );
				if ( $thisCat->parent != 0 ) {
					$cats = get_category_parents( $thisCat->parent, true, $delimiter );
					$cats = str_replace( '<a', $linkBefore . '<a' . $linkAttr, $cats );
					$cats = str_replace( '</a>', '</a>' . $linkAfter, $cats );
					echo $cats;
				}
				echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;

			} elseif ( is_tax() ) {
				$thisCat = get_category( get_query_var( 'cat' ), false );
				if ( $thisCat->parent != 0 ) {
					$cats = get_category_parents( $thisCat->parent, true, $delimiter );
					$cats = str_replace( '<a', $linkBefore . '<a' . $linkAttr, $cats );
					$cats = str_replace( '</a>', '</a>' . $linkAfter, $cats );
					echo $cats;
				}
				echo $before . sprintf( $text['tax'], single_cat_title( '', false ) ) . $after;

			} elseif ( is_search() ) {
				echo $before . sprintf( $text['search'], get_search_query() ) . $after;

			} elseif ( is_day() ) {
				echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
				echo sprintf( $link, get_month_link( get_the_time( 'Y' ),get_the_time( 'm' ) ), get_the_time( 'F' ) ) . $delimiter;
				echo $before . get_the_time( 'd' ) . $after;

			} elseif ( is_month() ) {
				echo sprintf( $link, get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $delimiter;
				echo $before . get_the_time( 'F' ) . $after;

			} elseif ( is_year() ) {
				echo $before . get_the_time( 'Y' ) . $after;

			} elseif ( is_single() && ! is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object( get_post_type() );
					$slug = $post_type->rewrite;
					printf( $link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name );
					if ( $showCurrent == 1 ) { echo $delimiter . $before . get_the_title() . $after; }
				} else {
					$cat = get_the_category();
					$cat = $cat[0];
					$cats = get_category_parents( $cat, true, $delimiter );
					if ( $showCurrent == 0 ) { $cats = preg_replace( "#^(.+)$delimiter$#", '$1', $cats ); }
					$cats = str_replace( '<a', $linkBefore . '<a' . $linkAttr, $cats );
					$cats = str_replace( '</a>', '</a>' . $linkAfter, $cats );
					echo $cats;
					if ( $showCurrent == 1 ) { echo $before . get_the_title() . $after; }
				}
			} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {
				$post_type = get_post_type_object( get_post_type() );
				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {
				$parent = get_post( $post->post_parent );
				$cat = get_the_category( $parent->ID );
				$cat = $cat[0];
				$cats = get_category_parents( $cat, true, $delimiter );
				$cats = str_replace( '<a', $linkBefore . '<a' . $linkAttr, $cats );
				$cats = str_replace( '</a>', '</a>' . $linkAfter, $cats );
				echo $cats;
				printf( $link, get_permalink( $parent ), $parent->post_title );
				if ( $showCurrent == 1 ) { echo $delimiter . $before . get_the_title() . $after; }
			} elseif ( is_page() && ! $post->post_parent ) {
				if ( $showCurrent == 1 ) { echo $before . get_the_title() . $after; }
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ( $parent_id ) {
					$page = get_page( $parent_id );
					$breadcrumbs[] = sprintf( $link, get_permalink( $page->ID ), get_the_title( $page->ID ) );
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse( $breadcrumbs );
				for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
					echo $breadcrumbs[ $i ];
					if ( $i != count( $breadcrumbs ) -1 ) { echo $delimiter; }
				}
				if ( $showCurrent == 1 ) { echo $delimiter . $before . get_the_title() . $after; }
			} elseif ( is_tag() ) {
				echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;

			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata( $author );
				echo $before . sprintf( $text['author'], $userdata->display_name ) . $after;

			} elseif ( is_404() ) {
				echo $before . $text['404'] . $after;
			}

			if ( get_query_var( 'paged' ) ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) { echo ' ('; }
				echo __( 'Page', 'education-hub' ) . ' ' . get_query_var( 'paged' );
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) { echo ')'; }
			}

					echo '</div>';

		}

	}

endif;

if ( ! function_exists( 'education_hub_the_custom_logo' ) ) :

	/**
	 * Displays custom logo.
	 *
	 * @since 1.7
	 */
	function education_hub_the_custom_logo() {

		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}
		else {
			$site_logo = education_hub_get_option( 'site_logo' );
			if ( ! empty( $site_logo ) ) {
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-link">
					<img src="<?php echo esc_url( $site_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
				</a>
				<?php
			}
		}

	}

endif;
