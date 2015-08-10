<?php
class operation_post{
	private $poster;
	function __construct(){
		
		include(ROOT_D.'/inventory/post.php');
		$this->poster = new inventory_data();
	}
	function get_post($id){
		
		$data = $this->poster->get_post($id);
		if(empty($data))
			return FALSE;
		return $data;
	}
	function get_posts_preview($limit){
		$data = $this->poster->get_posts($limit);
		if(empty($data))
			return FALSE;
		return $data;
	}
}
?>