<?php ini_set('display_errors', 0);?>
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
<link rel="stylesheet" type="text/css" href="http://localhost/pundro_demo/assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="http://localhost/pundro_demo/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  	div.applyonline a.applyon{
  		color: #fff;
	    text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
	    background-color: #49afcd;
	    padding: 3% 10%;
	    border-radius: 3px;
	    /* float: right; */
  	}
  	div.applyonline{
  		position: absolute;
	    margin: 5% 40%;
	    width: 302px;
  	}
  	div#modalRegister.applyonmodal {
	    left: 48%;
    	width: 44%;
	}
	div#modalRegister.applyonmodal .modal-body{
		height: 200px;
	}
	div.ac_results{
		width: 400px !important;
	}
  </style>
  <link rel="stylesheet" type="text/css" href="http://localhost/pundro_demo/web/autocomplete/jquery.autocomplete.css" />
<script type="text/javascript" src="http://localhost/pundro_demo/web/autocomplete/jquery.js"></script>
<script type="text/javascript" src="http://localhost/pundro_demo/web/autocomplete/jquery.autocomplete.js"></script>
<script>
$(document).ready(function(){
 $("#tag").autocomplete("http://localhost/pundro_demo/web/autocomplete/autocomplete.php", {
		selectFirst: true
	});
});
</script>

<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<div class="applyonline">
<a class="applyon" href="http://localhost/pundro_demo/web/how-to-apply/" target="_blank">How to Apply</a>
	<a class="applyon" href="#" data-toggle="modal" data-target="#modalRegister"> Apply Online</a>

	<div id="modalRegister" class="modal fade applyonmodal" role="dialog">
	    <div class="modal-dialog">
	        <!-- Modal content-->
	        <div class="modal-content">
	            <div class="modal-body">
					<div class="tab-pane box onad">
						<form method="POST" action="http://localhost/pundro_demo/web/authentication1.php">
							<div class="form-group test32">
							<h1>Please Enter Your Reference Number</h1>
								<div class="col-sm-offset-2 col-sm-5">
									<!-- <input type="text" name="MoneyReceiptSearch" placeholder="01679624759">-->
									<input id="tag" name="MoneyReceiptSearch" class="form-control" placeholder="01679624759">
								</div>
								<div class="col-sm-2">
									<button type="submit" class="btn btn-info"><?php echo "Submit"; ?></button>
								</div>
							</div>
						</form>
					</div>
	            </div>	            
	        </div>
	    </div>
	</div>
</div>
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