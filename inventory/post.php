<?php 

class inventory_data{
	private $databs;
	function __construct() {
		global $glob;
		$this->databs = $glob['db']['class'];
	}
	
	function get_post($id){
		
		
		$query = array(
					'tablo' => 'posts',
					'alanlar' => '*',
					'kosul' => TRUE,
					'where' => 'id='.$id,
					
						);	
		
		$data = $this->databs->SELECT_P($query);
		
		return $data[0];
	}
	function get_posts($limit = ''){
		
		if($limit != '')
			$limit = 'LIMIT '.$limit;
			
		$query = array(
					'tablo' => 'posts',
					'alanlar' => '*',
					'kosul' => TRUE,
					'where' => ' 1=1 '.$limit,//' limit '.$limit.' Order By DESC',
					
						);	
		
		return $this->databs->SELECT_P($query);
	}
}
?>