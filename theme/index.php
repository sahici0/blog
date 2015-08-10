<?php
	global $glob;
	
	$glob['theme']['name'] = $glob['theme']['class']->get_theme();
	
	$theme = $glob['theme']['name'];
	/**
	* 
	* CONTENT Kısmı Yükletiriliyor
	* 
	*/	
	$page = isset($_GET['page']) ? $_GET['page'] : 'index';
	/***
		HEADER Yükletiliyor
	***/
	
	
	include(ROOT_D.'/theme/'.$theme.'/subs/header.php');
	
	$glob['bfunctions']['class']->getUrlPage($page);
	
	include(ROOT_D.'/theme/'.$theme.'/subs/footer.php');
?>