<?php
/*
*      Robo Gallery     
*      Version: 1.0.6
*      By Robosoft
*
*      Contact: http://robosoft.co
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2016, Robosoft. All rights reserved.
*      Available only in  http://robosoft.co/robogallery
*/

if( ROBO_GALLERY_PRO ){
	include_once( ROBO_GALLERY_KEY_PATH );
} else {
	class roboGalleryParent{ public $pro = 0; }
}

class roboGalleryUtils extends roboGalleryParent{
	function getTemplateItem( $item, $class = '', $template = '', $addClass = '' ){
		$retHtml = ''; 
		if(count($item)){
			if( isset($item['enabled']) && $item['enabled'] ){
				if(isset($item['fontSize'])) 		$this->{$class.'Style'} .= ' font-size:'.       (int)$item['fontSize'].'px;'; 

				if(isset($item['fontLineHeight'])) 	$this->{$class.'Style'} .= ' line-height:'.     (int)$item['fontLineHeight'].'%;'; 
				
				if(isset($item['color'])) 			$this->{$class.'Style'} .= ' color:'.			$item['color'].';';
				if(isset($item['fontBold'])) 		$this->{$class.'Style'} .= ' font-weight:'.		($item['fontBold']		?'bold'		:'normal').';';
				if(isset($item['fontItalic'])) 	 	$this->{$class.'Style'} .= ' font-style:'.		($item['fontItalic']	?'italic'	:'normal').';';
				if(isset($item['fontUnderline'])) 	$this->{$class.'Style'} .= ' text-decoration:'.	($item['fontUnderline'] ?'underline':'none').';';
				if(isset($item['colorHover'])) 		$this->{$class.'HoverStyle'} .= 'color:'.$item['colorHover'].';';

				if( $template==1 ){
					if(isset($item['colorBg'])) 	$this->{$class.'Style'} .= 'background:'.$item['colorBg'].';';
					if(isset($item['color']) && isset($item['borderSize']) && $item['borderSize'])
													$this->{$class.'Style'} .= 'border:'.(int)$item['borderSize'].'px solid '.$item['color'].';';
					if(isset($item['colorHover']) && isset($item['borderSize']) && $item['borderSize'])		
													$this->{$class.'HoverStyle'} .= 'border:'.(int)$item['borderSize'].'px solid '.$item['colorHover'].';';
					if(isset($item['colorBgHover']))$this->{$class.'HoverStyle'} .= 'background:'.$item['colorBgHover'].';';
				}
				if($template==1){
					$retHtml .= '<i class="fa '.$item['iconSelect'].' '.$class.' '.$addClass.'" ></i>';
				} else {
					$retHtml .= '<div class="'.$class.' '.$addClass.'">'.$template.'</div>';
				}
			}
		}
		return $retHtml;
	}

	public function compileJavaScript(){
 		return
 		'var '.$this->galleryId.' = {'.$this->helper->getOptionList().'}, '.$this->galleryId.'_css = "'.$this->javaScriptStyle.'",'
		.'roboGalleryDelay = '.(int)get_option( ROBO_GALLERY_PREFIX.'delay',0).'; '
		.'head = document.head || document.getElementsByTagName("head")[0], '
		.'style = document.createElement("style"); '
		.'style.type = "text/css"; '
		.'if (style.styleSheet) style.styleSheet.cssText = '.$this->galleryId.'_css; '
		.'	else  style.appendChild(document.createTextNode('.$this->galleryId.'_css)); '
		.'head.appendChild(style);';
 	}

 	public function addShadow($nameOptions = ''){
 		$shadowStyle = '';
 		$shadow = get_post_meta( $this->id, ROBO_GALLERY_PREFIX.$nameOptions, true );
 		
		if( isset($shadow['hshadow'])) 	$shadowStyle.= (int) $shadow['hshadow'].'px ';

		if( isset($shadow['vshadow'])) 	$shadowStyle.= (int) $shadow['vshadow'].'px ';

		if( isset($shadow['bshadow'])) 	$shadowStyle.= (int) $shadow['bshadow'].'px ';

		if( isset($shadow['color'])) 	$shadowStyle.=  $shadow['color'].' ';

		if( $shadowStyle ){
			return 	'-webkit-box-shadow:'.$shadowStyle.';'.
					'-moz-box-shadow: 	'.$shadowStyle.';'.
					'-o-box-shadow: 	'.$shadowStyle.';'.
					'-ms-box-shadow: 	'.$shadowStyle.';'.
					'box-shadow: 		'.$shadowStyle.';';
		} else return '';

 	}

 	public function addWidth( $colums, $index ){
 		$ret = array();
		if( isset($colums['autowidth'.$index]) ){
			$ret[] = '"columnWidth": "auto"';
			if( isset($colums['colums'.$index]) && $colums['colums'.$index] )  $ret[] =  '"columns":'.$colums['colums'.$index];
		} elseif( isset($colums['width'.$index]) && $colums['width'.$index] ){
			$ret[] = '"columnWidth": '.$colums['width'.$index];
		}
		if( count($ret) ){
			switch ($index) {
				case '1': $r = '960'; break;
				case '2': $r = '650'; break;
				case '3': $r = '450'; break;
			}
			$ret[] = '"maxWidth": '.$r;
			return '{'.implode( ' , ', $ret ).'}';
		} else return '';
 	}

 	function getCorrectSize( $val = ''){
		$correctVal = $val;
		if( strpos( $val, '%')===false && strpos( $val, 'px')===false ){
			$correctVal = $val.'px';
		}
		return $correctVal;
	}

 	public function getThumbParams( ){

 	}
}