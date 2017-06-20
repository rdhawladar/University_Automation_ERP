<?php
/**
 * Custom helper functions.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_get_home_news_block_content' ) ) :

	/**
	 * Render home news block.
	 *
	 * @since 1.0.0
	 */
	function education_hub_get_home_news_block_content() {

		$home_news_section_status = education_hub_get_option( 'home_news_section_status' );
		if ( true !== $home_news_section_status ) {
			return;
		}
		$home_news_section_title  = education_hub_get_option( 'home_news_section_title' );
		$home_news_category       = education_hub_get_option( 'home_news_category' );
		$home_news_number         = education_hub_get_option( 'home_news_number' );
		$home_news_excerpt_length = education_hub_get_option( 'home_news_excerpt_length' );
		$home_news_read_more_text = education_hub_get_option( 'home_news_read_more_text' );

		$qargs = array(
			'posts_per_page' => absint( $home_news_number ),
			'no_found_rows'  => true,
			'post_type'      => 'post',
		);
		if ( absint( $home_news_category ) > 0  ) {
		  $qargs['category'] = absint( $home_news_category );
		}

		$all_posts = get_posts( $qargs );
		ob_start();
	  ?>
	  <?php if ( ! empty( $all_posts ) ) : ?>
	  	<div class="recent-news">
		  	<h2><?php echo esc_html( $home_news_section_title ); ?></h2>
		  	<?php global $post; ?>
		  	<div class="inner-wrapper">

		  	<?php foreach ( $all_posts as $post ) : ?>
		  		<?php setup_postdata( $post ); ?>
			  	<div class="news-post">
				  	<?php if (has_post_thumbnail() ): ?>
				  		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'education-hub-thumb', array( 'class' => 'aligncenter' ) ); ?></a>
				  	<?php endif ?>
				  	<div class="news-content">
				  		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				  		<div class="block-meta">
		  					<?php
		  						$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		  						if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		  							$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		  						}
		  						$time_string = sprintf( $time_string,
		  							esc_attr( get_the_date( 'c' ) ),
		  							esc_html( get_the_date() ),
		  							esc_attr( get_the_modified_date( 'c' ) ),
		  							esc_html( get_the_modified_date() )
		  						);
		  						echo $posted_on = sprintf(
		  							'%s',
		  							'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		  						);
		  					 ?>
	  					</div>
	  					<?php if ( absint( $home_news_excerpt_length ) > 0 ): ?>
					  		<p><?php echo education_hub_the_excerpt( absint( $home_news_excerpt_length ), $post ); ?></p>
	  					<?php endif ?>
	  					<?php if ( ! empty( $home_news_read_more_text ) ): ?>
					  		<a href="<?php the_permalink(); ?>" class="button"><?php echo esc_html( $home_news_read_more_text ); ?></a>
	  					<?php endif ?>
  					</div> <!-- .news-content -->
			  	</div> <!-- .news-post -->

		  	<?php endforeach ?>
		  	</div> <!-- .inner-wrapper -->

		  	<?php wp_reset_postdata(); ?>

	  	</div> <!-- .recent-news -->
	  <?php endif; ?>
	  <?php
	  $output = ob_get_contents();
	  ob_end_clean();
	  return $output;

	}

endif;

if ( ! function_exists( 'education_hub_get_home_events_block_content' ) ) :

	/**
	 * Render home events block.
	 *
	 * @since 1.0.0
	 */
	function education_hub_get_home_events_block_content() {

		$home_events_section_status = education_hub_get_option( 'home_events_section_status' );
		if ( true !== $home_events_section_status ) {
			return;
		}
		$home_events_section_title  = education_hub_get_option( 'home_events_section_title' );
		$home_events_category       = education_hub_get_option( 'home_events_category' );
		$home_events_number         = education_hub_get_option( 'home_events_number' );
		$home_events_excerpt_length = education_hub_get_option( 'home_events_excerpt_length' );

		$qargs = array(
			'posts_per_page' => absint( $home_events_number ),
			'no_found_rows'  => true,
			'post_type'      => 'post',
		);
		if ( absint( $home_events_category ) > 0  ) {
		  $qargs['category'] = absint( $home_events_category );
		}

		$all_posts = get_posts( $qargs );


		ob_start();
	  ?>
	  <?php if ( ! empty( $all_posts ) ) : ?>
	  	<div class="recent-events">
		  	<h2><?php echo esc_html( $home_events_section_title ); ?></h2>
		  	<?php global $post; ?>
		  	<?php foreach ( $all_posts as $post ) : ?>
		  		<?php setup_postdata( $post ); ?>
			  	<div class="event-post">
				  	<?php if (has_post_thumbnail() ): ?>
				  		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?></a>
				  	<?php endif ?>
			  		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  					<?php if ( absint( $home_events_excerpt_length ) > 0 ): ?>
				  		<p><?php echo education_hub_the_excerpt( absint( $home_events_excerpt_length ), $post ); ?></p>
  					<?php endif ?>
			  	</div> <!-- .event-post -->

		  	<?php endforeach ?>
		  	<?php wp_reset_postdata(); ?>

	  	</div> <!-- .recent-events -->
	  <?php endif; ?>
	  <?php
	  $output = ob_get_contents();
	  ob_end_clean();
	  return $output;

	}

endif;

if ( ! function_exists( 'education_hub_quick_links_fallback' ) ) :

	/**
	 * Fallback for Quick Links menu.
	 *
	 * @since 1.0.0
	 */
	function education_hub_quick_links_fallback( $args ){

		echo '<ul>';
		wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 6,
		) );
		echo '</ul>';

	}
endif;

if ( ! function_exists( 'education_hub_primary_menu_fallback' ) ) :

	/**
	 * Fallback for Primary menu.
	 *
	 * @since 1.0.0
	 */
	function education_hub_primary_menu_fallback( $args ){

		echo '<ul>';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'Home', 'education-hub' ). '</a></li>';
		wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 8,
		) );
		echo '</ul>';

	}
endif;
