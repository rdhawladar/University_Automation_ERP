<?php
/*
*      Robo Gallery     
*      Version: 1.0
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/


class roboGalleryImages{
	public $id 			= 0;
	public $cloneId 			= 0;
	public $imgArray	= array();
	public $catArray	= array();

	public $width 		= 0;
	public $height		= 0;
	public $thumbsource = '';
	public $orderby = '';
	public $lazyLoad = 1;


	function __construct($id, $cloneId = 0){
 		if( isset($id) && (int) $id ){
			$this->id = (int) $id;
 		}
 		
 		if( isset($cloneId) && (int) $cloneId ){
			$this->cloneId = (int) $cloneId;
 		} else $this->cloneId = $this->id;

 		++$this->lazyLoad;
 	}

 	function setSize( $width , $height, $thumbsource, $orderby ){
 		$this->width 		= $width;
 		$this->height 		= $height;
 		$this->thumbsource 	= $thumbsource;
 		$this->orderby 		= $orderby;
 	}

 	function getImages(){
 		if(!$this->id) return false;
 		++$this->lazyLoad;
		$tempImages = get_post_meta( $this->id, ROBO_GALLERY_PREFIX.'galleryImages', true );

		if( isset($tempImages) && !is_array($tempImages)==1 && trim($tempImages)=='' ) $tempImages = array();
		
		if( isset($tempImages) && is_array($tempImages) && isset($tempImages[0]) && count($tempImages)==1 && trim($tempImages[0])=='' ) $tempImages = array();
		
		if( !get_post_meta( $this->cloneId, ROBO_GALLERY_PREFIX.'menuSelfImages', true ) ){
			$tempImages = array();
		}

		for ($i=0; $i < count($tempImages) ; $i++){
			$this->imgArray[] = array( 'id'=> $tempImages[$i], 'catid'=> $this->id );
		}

		$post = get_post($this->id);

		if( get_post_meta( $this->cloneId, ROBO_GALLERY_PREFIX.'menuSelf', true ) ){
			$this->catArray[] = array( 'id'=>$this->id, 'title'=> $post->post_title, 'name'=>$post->post_name);
		}

		$my_wp_query = new WP_Query();
 		$all_wp_pages = $my_wp_query->query(array(
 				'post_type' => ROBO_GALLERY_TYPE_POST,
 				'orderby'   => array( 'menu_order'=> 'DESC', 'order'=> 'ASC', 'title'=> 'DESC' ),
 				'posts_per_page' => $this->lazyLoad,
 		));

 		//print_r($all_wp_pages);
		$children = get_page_children( $this->id, $all_wp_pages );
		//print_r($children);
		$tempCatArray  = array();
		for($i=0;$i<count($children);$i++){
			$tempImages = get_post_meta( $children[$i]->ID, ROBO_GALLERY_PREFIX.'galleryImages', true );
			if($tempImages && count($tempImages)){
				$post = get_post($children[$i]->ID); 
				$tempCatArray[] = array( 'id'=>$children[$i]->ID,'title'=> $post->post_title, 'name'=>$post->post_name);
				for ($j=0; $j < count($tempImages) ; $j++){
					$this->imgArray[] = array( 'id'=> $tempImages[$j], 'catid'=> $children[$i]->ID );
				}
			}
		}
		$tempCatArray = array_reverse ($tempCatArray);
		$this->catArray = array_merge($this->catArray, $tempCatArray );

		for($i=0;$i<count($this->imgArray);$i++){
			$img = $this->imgArray[$i];
			$thumb =  wp_get_attachment_image_src( $img['id'] , $this->thumbsource);

			if( !is_array($thumb) || !count($thumb) ){
				unset($this->imgArray[$i]);	
			} else {
				$this->imgArray[$i]['image'] 	= 	wp_get_attachment_url( $img['id'] );
				$this->imgArray[$i]['thumb'] 	=	(isset($thumb) && count($thumb) ) ? $thumb[0] : '';
				$this->imgArray[$i]['sizeW']  	=	(isset($thumb[1]) && count($thumb)) ? $thumb[1] : $this->width;
				$this->imgArray[$i]['sizeH']  	= 	(isset($thumb[2]) && count($thumb)) ? $thumb[2] : $this->height;
				$this->imgArray[$i]['data'] 	=	get_post($img['id'] );
				$this->imgArray[$i]['link'] 	=	get_post_meta( $img['id'], ROBO_GALLERY_PREFIX.'gallery_link', true );
				$this->imgArray[$i]['typelink'] = 	get_post_meta( $img['id'], ROBO_GALLERY_PREFIX.'gallery_type_link', true );
				$this->imgArray[$i]['videolink']= 	get_post_meta( $img['id'], ROBO_GALLERY_PREFIX.'gallery_video_link', true );
				$this->imgArray[$i]['col'] 		=	get_post_meta( $img['id'], ROBO_GALLERY_PREFIX.'gallery_col', true );
				$this->imgArray[$i]['effect'] 	=	get_post_meta( $img['id'], ROBO_GALLERY_PREFIX.'gallery_effect', true );
			}
			
		}	

		switch ( $this->orderby ) {
			case 'random':		shuffle ($this->imgArray);										break;
			case 'titleU':		usort($this->imgArray,array('roboGalleryImages','titleUp') );	break;
			case 'titleD':		usort($this->imgArray,array('roboGalleryImages','titleDown') );	break;
			case 'dateU':		usort($this->imgArray,array('roboGalleryImages','dateUp') );	break;
			case 'dateD':		usort($this->imgArray,array('roboGalleryImages','dateDown') );	break;
			case 'categoryU':	$this->imgArray = array_reverse($this->imgArray);				break;
			case 'categoryD':
			default:
				break;
		}
		
 	}

 	private static function titleUp($item1,$item2){
		return strcasecmp ($item1['data']->post_title, $item2['data']->post_title)*-1;
	}

	private static function titleDown($item1,$item2){
		return strcasecmp ($item1['data']->post_title, $item2['data']->post_title);
	}

	private static function dateUp($item1,$item2){
		if($item1['data']->post_date==$item2['data']->post_date) return 0;
		if($item1['data']->post_date > $item2['data']->post_date) return 1;
			else return -1;
	}

	private static function dateDown($item1,$item2){
		if($item1['data']->post_date==$item2['data']->post_date) return 0;
		if($item1['data']->post_date > $item2['data']->post_date) return -1;
			else return 1;
	}
}