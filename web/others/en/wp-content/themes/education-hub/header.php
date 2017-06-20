<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Education_Hub
 */

?><?php
	/**
	 * Hook - education_hub_action_doctype.
	 *
	 * @hooked education_hub_doctype -  10
	 */
	do_action( 'education_hub_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - education_hub_action_head.
	 *
	 * @hooked education_hub_head -  10
	 */
	do_action( 'education_hub_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * Hook - education_hub_action_before.
	 *
	 * @hooked education_hub_page_start - 10
	 * @hooked education_hub_skip_to_content - 15
	 */
	do_action( 'education_hub_action_before' );
	?>

    <?php
	  /**
	   * Hook - education_hub_action_before_header.
	   *
	   * @hooked education_hub_header_top_content - 5
	   * @hooked education_hub_header_start - 10
	   */
	  do_action( 'education_hub_action_before_header' );
	?>
		<?php
		/**
		 * Hook - education_hub_action_header.
		 *
		 * @hooked education_hub_site_branding - 10
		 */
		do_action( 'education_hub_action_header' );
		?>
    <?php
	  /**
	   * Hook - education_hub_action_after_header.
	   *
	   * @hooked education_hub_header_end - 10
	   * @hooked education_hub_add_primary_navigation - 20
	   */
	  do_action( 'education_hub_action_after_header' );
	?>

	<?php
	/**
	 * Hook - education_hub_action_before_content.
	 *
	 * @hooked education_hub_add_breadcrumb - 7
	 * @hooked education_hub_content_start - 10
	 */
	do_action( 'education_hub_action_before_content' );
	?>
    <?php
	  /**
	   * Hook - education_hub_action_content.
	   */
	  do_action( 'education_hub_action_content' );
	?>
