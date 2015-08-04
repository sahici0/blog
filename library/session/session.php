<?php

Class fr_session{
	/**
	* 
	* @param string $key
	* @param string or array $value
	* 
	* @return bool
	*/
	function add($key,$value){
		
		$_SESSION[$key] = $value;
	}
	
	function get($key){
		
		return $_SESSION[$key];
		
	}
	
	function is_session($key){
		return isset($_SESSION[$key]);
	}
	
	function is_value($key,$value){
		if($_SESSION[$key] == $value)
			return true;
		return false;
	}
	
	function liste(){
		var_dump($_SESSION);
	}
}
?>