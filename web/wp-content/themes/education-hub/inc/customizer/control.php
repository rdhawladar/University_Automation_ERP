<?php
/**
 * Custom Customizer Controls.
 *
 * @package Education_Hub
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Customize Control for Heading.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class Education_Hub_Heading_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'heading';

	/**
	 * Render content.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {

	?>
	<?php if ( ! empty( $this->label ) ) : ?>
		<h3><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span></h3>
	<?php endif; ?>
	<?php if ( ! empty( $this->description ) ) : ?>
		<span class="description customize-control-description"><?php echo $this->description; ?></span>
	<?php endif; ?>

    <?php
	}
}

/**
 * Customize Control for Message.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class Education_Hub_Message_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'message';

	/**
	 * Render content.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {

	?>
	<?php if ( ! empty( $this->label ) ) : ?>
		<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<?php endif; ?>
	<?php if ( ! empty( $this->description ) ) : ?>
		<span class="description customize-control-description"><?php echo $this->description; ?></span>
	<?php endif; ?>
    <?php
	}
}

/**
 * Customize Control for Radio Image.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class Education_Hub_Radio_Image_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'radio-image';

	/**
	 * Render content.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {

		if ( empty( $this->choices ) ) {
			return; }

		$name = '_customize-radio-' . $this->id;

	?>
    <label>
			<?php if ( ! empty( $this->label ) ) : ?>
	      	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
	      	<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<?php
			foreach ( $this->choices as $value => $label ) :
				?>
			  <label>
				<input type="radio" value="<?php echo esc_attr( $value ); ?>" <?php $this->link();
				checked( $this->value(), $value ); ?> class="stylish-radio-image" name="<?php echo esc_attr( $name ); ?>"/>
				  <span><img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" /></span>
			  </label>
				<?php
		  endforeach;
			?>

    </label>
    <?php
	}
}

/**
 * Customize Control for Taxonomy Select.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class Education_Hub_Dropdown_Taxonomies_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'dropdown-taxonomies';

	/**
	 * Taxonomy.
	 *
	 * @access public
	 * @var string
	 */
	public $taxonomy = '';

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
	 * @param string               $id      Control ID.
	 * @param array                $args    Optional. Arguments to override class property defaults.
	 */
	public function __construct( $manager, $id, $args = array() ) {

		$our_taxonomy = 'category';
		if ( isset( $args['taxonomy'] ) ) {
			$taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
			if ( true === $taxonomy_exist ) {
				$our_taxonomy = esc_attr( $args['taxonomy'] );
			}
		}
		$args['taxonomy'] = $our_taxonomy;
		$this->taxonomy = esc_attr( $our_taxonomy );

		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render content.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {

		$tax_args = array(
			'hierarchical' => 0,
			'taxonomy'     => $this->taxonomy,
		);
		$all_taxonomies = get_categories( $tax_args );

	?>
    <label>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
       <select <?php $this->link(); ?>>
			<?php
			printf( '<option value="%s" %s>%s</option>', '', selected( $this->value(), '', false ), ' ' );
			?>
			<?php if ( ! empty( $all_taxonomies ) ) :  ?>
            <?php foreach ( $all_taxonomies as $key => $tax ) :  ?>
				<?php
				printf( '<option value="%s" %s>%s</option>', esc_attr( $tax->term_id ), selected( $this->value(), $tax->term_id, false ), esc_html( $tax->name ) );
				?>
            <?php endforeach ?>
			<?php endif ?>
       </select>
    </label>
    <?php
	}
}
