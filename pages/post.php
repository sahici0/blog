<?php

class page_post {
	private $op_post;
	function __construct() {
		
		include_once(ROOT_D.'/operation/post.php');
		$this->op_post = new operation_post();
		global $glob;
		$glob['data']['content'] = $this->get_data();
	}
	function get_data(){
		global $glob;
		return $this->op_post->get_post($glob['page']['id']);
		
	}
}
global $glob;
$glob['data']['class'] 	 = new page_post();
$glob['data']['content'] = $glob['data']['class']->get_data();
?>