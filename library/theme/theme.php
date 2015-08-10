<?php
class lib_theme {
	private $data;
	
	function get_theme(){
		global $glob;
		
		$query = array(
					'tablo'   => 'settings',
					'alanlar' => '"value"',
					'kosul'   => TRUE,
					'where'   => 'name="theme"',
					
						);
		$data = $glob['db']['class']->SELECT_P($query);
		
		if(!$data)
		{
			$glob['error']['class']->set_error("Tema Değeri Bulunamadı");
		}else
			return $data[0]['value'];
		return false;
	}
	
	function set_theme($theme_name){
		global $glob;
		
		$query = array(
					'tablo'   => 'settings',
					'kosul'	  => true,
					'where'	  => 'name = "theme"' ,
					'alanlar' => array(
									'value' => $theme_name,
										),
					
					);
					
		if($glob['db']['class']->UPDATE_P($query))
			return TRUE;
		
		return FALSE;
		
		
	}
}
?>