<?php
/*
*      Robo Gallery     
*      Version: 2.0
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

if ( ! defined( 'WPINC' ) )  die;

rbs_gallery_include('class.postcontroller.php', ROBO_GALLERY_EXTENSIONS_PATH);

if(!function_exists('rbs_ajax_create_article_form')){
	function rbs_ajax_create_article_form(){ 
		$args = array(
			'show_option_all'    => '',
			'show_option_none'   => '',
			'option_none_value'  => '-1',
			'orderby'            => 'ID', 
			'order'              => 'ASC',
			'show_count'         => 0,
			'hide_empty'         => 0, 
			'child_of'           => 0,
			'exclude'            => '',
			'echo'               => 1,
			'selected'           => 0,
			'hierarchical'       => 1, 
			'name'               => 'cat',
			'id'                 => 'rbs_post_create_category',
			'class'              => 'form-control',
			'depth'              => 0,
			'tab_index'          => 0,
			'taxonomy'           => 'category',
			'hide_if_empty'      => false,
			'value_field'	     => 'term_id',	
		);
		if( !isset($_POST['galleryid']) || !(int)$_POST['galleryid'] ){
			echo '<p><strong>'.__('Post not created. Error: ','rbs_gallery').'</strong>'.__('Empty  gallery ID','rbs_gallery').'</p>';
			return ;
		} ; 
		$galleryid = (int) $_POST['galleryid'];
		$post_info = get_post($galleryid );

		if( gettype($post_info)!='object' ) {
			echo '<p><strong>'.__('Post not created. Error: ','rbs_gallery').'</strong>'.__('Incorrect  gallery ID','rbs_gallery').'</p>';
			return ;
		}
		echo "<h3>".__('Add new post','rbs_gallery')."</h3>";
		?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="rbs_post_create_category"><?php _e('Category'); ?>:</label></th>
					<td><?php wp_dropdown_categories( $args ); ?></td>
				</tr>

				<tr>
					<th scope="row"><label for="rbs_post_create_title"><?php _e('Title'); ?>:</label></th>
					<td><input name="rbs_post_create_title" id="rbs_post_create_title" value="<?php echo $post_info->post_title ;?>" class="regular-text" type="text"></td>
				</tr>

				<tr>
					<th scope="row"><label for="rbs_post_create_slug"><?php _e('Slug'); ?>:</label></th>
					<td><input name="rbs_post_create_slug" id="rbs_post_create_slug" value="<?php echo 'post_'.$post_info->post_name;?>" class="regular-text" type="text"></td>
				</tr>
				<?php if( !get_option(ROBO_GALLERY_PREFIX.'postShowText', 0) ) { ?>
				<tr>
					<th scope="row"><label for="rbs_post_create_text"><?php _e('Text'); ?>:</label></th>
					<td><textarea name="rbs_post_create_text" rows="6" cols="50" id="rbs_post_create_text" class="large-text code">[robo-gallery id="<?php echo $galleryid; ; ?>"]</textarea></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php
		
		echo '<p>'.__('Short tag of the gallery will be insert into created article.','rbs_gallery').'</p>';
	}
}

if(!function_exists('rbs_ajax_create_article')){
	function rbs_ajax_create_article(){
		if( 
				isset($_POST['galleryid']) && (int)$_POST['galleryid'] && 
				isset($_POST['categoryid']) && (int)$_POST['categoryid'] 
		){
			$galleryid = (int) $_POST['galleryid'];
			$categoryid = (int) $_POST['categoryid'];

			$post_info = get_post( $galleryid );
			
			if( gettype($post_info)!='object' ) {
				echo '<p><strong>'.__('Post not created. Error: ','rbs_gallery').'</strong>empty gallery id</p>';
				die();
			}
	
			$Poster = new PostController;
			
			$title = $post_info->post_title;
			if(isset( $_POST['articletitle'] ) && $_POST['articletitle'] ) $title = wp_kses_data($_POST['articletitle']);
			
			$slug = 'post_'.$post_info->post_name;
			if(isset( $_POST['articleslug'] ) && $_POST['articleslug'] ) $slug = wp_kses_data($_POST['articleslug']);

			$content_text = '[robo-gallery id="'.$galleryid.'"]';
			if(isset( $_POST['articletext'] ) && $_POST['articletext'] ) $content_text = wp_kses_data($_POST['articletext']);


			$Poster->set_title( $title );
			$Poster->add_category( array($categoryid) );
			$Poster->set_type( "post" );
			$Poster->set_content( $content_text );
			$Poster->set_author_id( get_current_user_id() );
			$Poster->set_post_slug( $slug );
			$Poster->set_post_state( "publish" );
			$Poster->create();
	
			$posts_id = get_post_meta($galleryid, 'rbs_gallery_id',true );

			if(!$posts_id) $posts_id = array();
				else $posts_id = json_decode($posts_id, true);
			$postId = $Poster->PC_current_post_id;
			$posts_id[] = $postId;

			update_post_meta($galleryid, 'rbs_gallery_id', json_encode($posts_id, JSON_FORCE_OBJECT ));

			if( isset($Poster->errors) && count($Poster->errors) ){
				echo '<p><strong>'.__('Post not created. Error: ','rbs_gallery').'</strong><br>';
				for ($i=0; $i < count($Poster->errors); $i++) { 
					$error = $Poster->errors[$i];
					echo ' &nbsp;&nbsp; - '.$error.'<br>';
				}
				echo '</p>';
			} else {
				echo '<h3>'.__('Post').' "'.$title.'" '.__('created').'</h3>'; 
				echo '<p>
					<a href="'.esc_url( get_edit_post_link( $postId ) ).'" class="button button-small" target="_blank">
						'.__('Edit')
					.'</a> 
					<a  href="'.esc_url( get_permalink( $postId ) ).'"  class="button button-small" target="_blank">
						'.__('Preview')
					.'</a> 
				</p>'; 
					 
			}
		} else {
			echo '<p><strong>'.__('Error: input value','rbs_gallery').'</strong></p>';
		}
		die();
	}
}


if(!function_exists('rbs_ajax_posts_list')){
	function rbs_ajax_posts_list(){ 
		
		if( !isset($_POST['galleryid']) || !((int)$_POST['galleryid']) ){
			echo '<p><strong>'.__('Error').': </strong>'.__('Empty gallery ID','rbs_gallery').'</p>';
			return ;
		} ; 
		$galleryid = (int) $_POST['galleryid'];
		$posts = get_post_meta( $galleryid, 'rbs_gallery_id' , true);

		if(!count($posts)){
			e_('No post','rbs_gallery');
			die();
		}

		$posts = json_decode($posts, true);
		echo '<table class="widefat importers striped">';
		echo '<thead>
				<tr>
					<td>'.__('Title').'</td>
					<td>'.__('Status').'</td>
					<td></td>
					<td></td>
				</tr>
			</thead>';
		for ($i=0; $i < count($posts); $i++) { 
			if( !$posts[$i] ) continue ;
			$post_info = get_post( $posts[$i] );
			//print_r($post_info);
			if( gettype($post_info)!='object' ) {
				//echo '<p><strong>'.__('Error: ','rbs_gallery').'</strong>'.__('Incorrect  gallery ID','rbs_gallery').'</p>';
				continue ;
			}
			echo '<tr>
					<td class="row-title">
						'.$post_info->post_title.'
					</td>
					<td class="import-system"  style="width:10%;">
						'.__($post_info->post_status=='publish'?__('Published'):$post_info->post_status).'
					</td>
					
					<td class="import-system" style="width:10%;">
						<a href="'.esc_url( get_edit_post_link($post_info->ID)).'"  title="'.__('Edit').'"  target="_blank">
							'.__('Edit').'
						</a>
					</td>
					<td class="import-system" style="width:10%;">
						<a href="'. esc_url( get_permalink($post_info->ID) ).'" title="'.__('Preview').'" target="_blank">
							'.__('Preview').'
						</a>
					</td>
				</tr>';
		}
		echo '</table>';
		die();
	}
}


if(!function_exists('rbs_ajax_reset_views')){
	function rbs_ajax_reset_views(){ 
		
		if( !isset($_POST['galleryid']) || ! ((int) $_POST['galleryid']) ){
			echo '<p><strong>'.__('Error: ','rbs_gallery').'</strong>'.__('Empty  gallery ID','rbs_gallery').'</p>';
			return ;
		} ; 
		$galleryId =  (int) $_POST['galleryid'];

		$count_key = 'gallery_views_count';

		delete_post_meta( $galleryId, $count_key);
		add_post_meta( $galleryId, $count_key, '0');

		echo 1;
		die();
	}
}