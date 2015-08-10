<?php

class basicFunctions{
	function __construct(){
		
	}
	public function getUrlPage($page = 'index'){
		global $glob;
		
		$theme = $glob['theme'];;
		
		$_page = end(explode('-',rtrim($page,'/')));

		if(is_numeric($_page)){
			//Postun yüklendiği kısım
			// burada page/post.php yi yükleyeceksin
			
			$glob['page'] = array(
						'id' => $_page,
						'url'=> $page,
						);
						
			include(ROOT_D.'/pages/post.php');
			include(ROOT_D.'/theme/'.$theme['name'].'/post.php');
			
			return TRUE;
		}else{
			
			unset($_page);
			
			if($page)
			{	
				if(file_exists(ROOT_D.'/pages/'.$page.'.php')){
					if(file_exists(ROOT_D.'/pages/'.$page.'.php')){
					
						include(ROOT_D.'/pages/'.$page.'.php');
						include(ROOT_D.'/theme/'.$theme['name'].'/'.$page.'.php');
					
						return TRUE;
						
					}else
						return $this->getUrlPage("error");
				}else
					return $this->getUrlPage("error");;
			}
			return FALSE;
			
		}
	}
	
}
?>