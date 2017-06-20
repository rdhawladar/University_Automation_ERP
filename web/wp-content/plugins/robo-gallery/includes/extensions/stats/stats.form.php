<?php 
/*
*      Robo Gallery     
*      Version: 1.2
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

?>
<div class="wrap">
	<h1  class="rbs-stats">
		<?php _e('Robo Gallery Statistics', 'rbs_gallery'); ?>
	</h1>
<br>

<?php 
	
if(!function_exists('rbs_stats_tabs')){
	function rbs_stats_tabs( $current = 'gallery' ) {
	    $tabs = array( 
	    		'gallery' => __('Gallery Statistics', 'rbs_gallery'), 
	    		'export' => __('Images Statistics', 'rbs_gallery') 
	    );
	    echo '<h2 class="nav-tab-wrapper">';
		    foreach( $tabs as $tab => $name ){
		        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
		        echo "<a class='nav-tab$class' href='edit.php?post_type=robo_gallery_table&page=robo-gallery-stats&tab=$tab'>$name</a>";
		    }
	    echo '</h2>';
	}
}
$tab = 'gallery';
//if ( isset( $_GET['tab'] ) )  $tab = $_GET['tab'];
//if ( isset( $_POST['tab'] ) ) $tab = $_POST['tab'];
//rbs_stats_tabs( $tab);

$today = date("Y_j_n"); 
$countPosts = wp_count_posts(ROBO_GALLERY_TYPE_POST);
//print_r($countPosts);

$args = array(
	'post_type'  => ROBO_GALLERY_TYPE_POST,
	'meta_key'   => 'gallery_views_count',
	'posts_per_page' =>-1,
);
$allViews = 0;
$loop = new WP_Query($args);
$allImages = 0;

if ( $loop->have_posts() ){
	for ($i=0; $i <count($loop->posts) ; $i++) { 

		$images = get_post_meta( $loop->posts[$i]->ID, ROBO_GALLERY_PREFIX.'galleryImages', true);
		if( isset($images) && is_array($images) && count($images) ){
			$allImages += count($images);
		}

		$amt = get_post_meta( $loop->posts[$i]->ID, 'gallery_views_count', true);
		if ($amt) {$allViews += $amt;};
	}
}

switch ($tab) {
	case 'gallery':
	?>
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">
					<label ><?php _e('Total Views', 'rbs_gallery'); ?></label>
				</th>
				<td>
					<p><?php echo $allViews ; ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label ><?php _e('Total Images', 'rbs_gallery'); ?></label>
				</th>
				<td>
					<p><?php echo $allImages ; ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label ><?php _e('Total Galleries', 'rbs_gallery'); ?></label>
				</th>
				<td>
					<p><?php echo $countPosts->publish + $countPosts->draft + $countPosts->trash ; ?></p>
				</td>
			</tr>
			<tr>
				<td><hr></td>
			</tr>
			<tr>
				<th scope="row">
					<label ><?php _e('Published', 'rbs_gallery'); ?></label>
				</th>
				<td>
					<p><?php echo $countPosts->publish ; ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label ><?php _e('Drafts', 'rbs_gallery'); ?></label>
				</th>
				<td>
					<p><?php echo $countPosts->draft ; ?></p>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label ><?php _e('Trash', 'rbs_gallery'); ?></label>
				</th>
				<td>
					<p><?php echo $countPosts->trash ; ?></p>
				</td>
			</tr>
			
		</tbody>
	</table>
	<?php
		break;

	default:
 	case 'images':
?>
<?php 
	break;

	case 'import':

 } ?>
</div>
<?php 