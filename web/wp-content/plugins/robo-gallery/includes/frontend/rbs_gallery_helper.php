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


class rbsHelper {
	
	private $optionsArray = array();
	
	private $id = 0;

	public function setId( $id){
		$this->id = $id;
	}

	public function setValue( $valName, $value, $type='string'){
		switch ($type) {
			case 'raw':      break;
			case 'string':
				$value = '"'.$value.'"'; break;
			case 'int':
				$value = (int)$value; 	break;
			case 'bool':
				if($value !='true' && $value !='false') $value = "false";
				break;
		}
		$this->optionsArray[] = '"'.$valName . '": '.$value;
	}

	public function setOption( $valName, $type = 'string' , $default = '' ){
		$value = get_post_meta( $this->id,  ROBO_GALLERY_PREFIX.$valName, true );
		if($type=='bool'){
			if($value==1) $value = 'true';
			if(!$value) $value = 'false';
		}
		$this->setValue($valName , $value, $type);
	}

	public function getOptionList(){
		if( !isset($this->optionsArray) || !count($this->optionsArray) ) return '';
		return implode( ', ' , $this->optionsArray);
	}

	public function addWidth( $colums, $index ){
		$ret = array();
		if( isset($colums['autowidth'.$index]) ){
			$ret[] = '"columnWidth": "auto"';
			if($colums['colums'.$index]) $ret[] =  '"columns":'.$colums['colums'.$index];
		} elseif($colums['width'.$index]){
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

} ?>