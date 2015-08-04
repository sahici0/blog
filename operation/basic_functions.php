<?php

class basicFunctions{
	
	public function getPage($page = 'index.php'){
		//$page = substr($_SERVER['REQUEST_URI'],1);
		//$page = split('/',$page);
		global $theme;
		if($page)
		{	if(file_exists(ROOT_D.'/pages/'.$page.'.php')){
				if(file_exists(ROOT_D.'/pages/'.$page.'.php')){
					
					include(ROOT_D.'/pages/'.$page.'.php');
					include(ROOT_D.'/theme/'.$theme.'/'.$page.'.php');
					return TRUE;
				}else
					return FALSE;

			}else
				return FALSE;
		}
		return FALSE;
	}
	
}


?>