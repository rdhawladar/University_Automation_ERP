<?php
/**
 * Theme widgets.
 *
 * @package Education_Hub
 */

if ( ! function_exists( 'education_hub_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function education_hub_load_widgets() {

		// Social widget.
		register_widget( 'Education_Hub_Social_Widget' );

	}

endif;

add_action( 'widgets_init', 'education_hub_load_widgets' );


if ( ! class_exists( 'Education_Hub_Social_Widget' ) ) :

	/**
	 * Social widget Class.
	 *
	 * @since 1.0.0
	 */
	class Education_Hub_Social_Widget extends WP_Widget {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'                   => 'education_hub_widget_social',
				'description'                 => esc_html__( 'Social Icons Widget', 'education-hub' ),
				'customize_selective_refresh' => true,
			);
			parent::__construct( 'education-hub-social', esc_html__( 'Education Hub: Social', 'education-hub' ), $opts );
		}

		/**
		 * Echo the widget content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments including before_title, after_title,
		 *                        before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget.
		 */
		function widget( $args, $instance ) {

			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			echo $args['before_widget'];

			// Render title.
			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			$nav_menu_locations = get_nav_menu_locations();
			$menu_id = 0;
			if ( isset( $nav_menu_locations['social'] ) && absint( $nav_menu_locations['social'] ) > 0 ) {
				$menu_id = absint( $nav_menu_locations['social'] );
			}
			if ( $menu_id > 0 ) {

				$menu_items = wp_get_nav_menu_items( $menu_id );

				if ( ! empty( $menu_items ) ) {
					echo '<ul class="size-medium">';
					foreach ( $menu_items as $m_key => $m ) {
						echo '<li>';
						echo '<a href="' . esc_url( $m->url ) . '" target="_blank">';
						echo '<span class="title screen-reader-text">' . esc_attr( $m->title ) . '</span>';
						echo '</a>';
						echo '</li>';
					}
					echo '</ul>';
				}
			}
			echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            {@see WP_Widget::form()}.
		 * @param array $old_instance Old settings for this instance.
		 * @return array Settings to save or bool false to cancel saving.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] = esc_html( strip_tags( $new_instance['title'] ) );

			return $instance;
		}

		/**
		 * Output the settings update form.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance Current settings.
		 */
		function form( $instance ) {

			// Defaults.
			$instance = wp_parse_args( (array) $instance, array(
				'title' => '',
			) );
			$title = esc_attr( $instance['title'] );

			// Fetch navigation.
			$nav_menu_locations = get_nav_menu_locations();
			$is_menu_set = false;
			if ( isset( $nav_menu_locations['social'] ) && absint( $nav_menu_locations['social'] ) > 0 ) {
				$is_menu_set = true;
			}
			?>
		  <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'education-hub' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		  </p>

		<?php if ( true !== $is_menu_set ) :  ?>
        <p>
			<?php echo esc_html__( 'Social menu is not set. Please create menu and assign it to Social Menu.', 'education-hub' ); ?>
        </p>
        <?php endif ?>
		<?php
		}
	}

endif;
