<?php
	
	
	global $theme;
	/***
		HEADER Yükletiliyor
	***/
	include($theme.'/subs/header.php');
	
	/**
	* 
	* CONTENT Kısmı Yükletiriliyor
	* 
	*/
	$page = isset($_GET['page']) ? $_GET['page'] : 'index';
	
	if(!$bfunction->getPage($page))
		$bfunction->getPage("error");
		
	include($theme.'/subs/footer.php');
?>