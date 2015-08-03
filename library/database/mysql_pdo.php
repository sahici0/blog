<?php

class mysql_pdo{

	private $mysql = NULL;	
	function __construct(){
	try{
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND  => 'SET NAMES '.DB_CHARSET);

			$this->mysql = new PDO(PROVIDER.';host:'.DB_HOST,DB_USER,DB_PASSWORD,$options);
			// $db_ = new PDO("mysql:host=localhost;dbname=haber","root","");
			if(!$this->mysql){
				exit("PDO_MYSQL : Bağlantı Sorunu");
			}
		}catch(Exception $e){
			exit("PDO_MYSQL ||#|| CONNECTION  ; ".$e->getMessage());
		}
		
	}
	function db_is_CONNECT($veri){

		
		
	}
	function db_INSERT_P($veri){
		/*
		@date 30.01.2014
		@param $veri = array(
					'tablo' => 'tablo_ismi',
					'alanlar' => array(
						'isim' => $koşul,
						'veri' => $sudur
						)
		);
		
		*/
		$alanlar = '';
		$alanlar_V = '';
		
		foreach(array_keys($veri['alanlar']) as $dizi){
			$alanlar .= $dizi.",";
			$alanlar_V .= '?,';
		}
		$alanlar = rtrim($alanlar,',');
		$alanlar_V = rtrim($alanlar_V,',');

        if(isset($veri['valid'])){
		        echo 'INSERT INTO '. $veri['tablo'].'('.$alanlar.') VALUES('.implode(',',array_values($veri['alanlar'])).')';
		}	

		$execut = $this->mysql->prepare('INSERT INTO '. $veri['tablo'].'('.$alanlar.') VALUES('.$alanlar_V.')');
		
		$result = !($execut->execute(array_values($veri['alanlar']))) ? false : $this->mysql->lastInsertId();
		/*
			kayıt işlemi başarılı ise son idyi döndürür
			kayıt işlemi başarısız ise false döndürür
		*/
		$this->mysql;
		$execut = NULL;
		// sonucu false veya son id eez< döndürür
		return $result;
					
	}
	function db_SELECT_P($veri,$return = PDO::FETCH_ASSOC){
		/*
		@date 30.01.2014
		@param	$veri = array(
						'tablo' => 'tablo_ismi',
						'alanlar' => '*',
						'koşul' => true,
						'where' => 'isim = "sahbaz" AND soyisim = "kadir"'
						'koşul' => array(
							'isim' => $koşul,
							'veri' => $sudur
							)
			);
		*/
		
		$alanlar_V = '';
		$kosul = '';
		if($veri['kosul']){
			empty($veri['where']) ? exit('Boş Koşul Gönderdiniz!!!') : true;
			$kosul = ' WHERE '.$veri['where'];
		}
		if(isset($veri['valid'])){
		echo 'SELECT  '.
								$veri['alanlar'].
								' FROM '.
								$veri['tablo'].
								$kosul;
		}
		if(gettype($veri['alanlar']) == 'array'){
			foreach($veri['alanlar'] as $gezici){
			 $alanlar = $gezici.',';
			}
			$alanlar = rtrim($alanlar,',');
		}else{
			$alanlar = "*";
		}
		
		$alanlar_V = rtrim($alanlar_V,',');

		$execut = $this->mysql->prepare('SELECT  '.
								$alanlar.
								' FROM '.
								$veri['tablo'].
								$kosul	
		);
		
		$result = $execut->execute() ? $execut->fetchAll($return) : false;
		$execut = NULL;
		// sonucu false veya son id olarak döndürür
		return $result;
	
	}
	function db_UPDATE_P($veri){
						/*
		@date 10.02.2014
		@param $veri = array(
					'tablo' => 'tablo_ismi',
					'alanlar' => array(
						'isim' => $koşul,
						'veri' => $sudur
					'kosul' => true,
					'where' => 'kadir="sahbaz"'
						)
		);
		
		*/
		$alanlar = '';
		$alanlar_V = '';
		$kosul = '';
		
		if($veri['kosul']){
			empty($veri['where']) ? exit('Boş Koşul Gönderdiniz!!!') : true;
			$kosul = ' WHERE '.$veri['where'];
		}
		
		foreach(array_keys($veri['alanlar']) as $dizi){
			$alanlar .= $dizi.",";
			$alanlar_V .= $dizi.'=?,';
		}
		$alanlar = rtrim($alanlar,',');
		$alanlar_V = rtrim($alanlar_V,',');
		
		if(isset($veri['valid'])){
			echo 'UPDATE '.$veri['tablo'].' SET '.$alanlar_V.''.$kosul;
			var_dump(array_values($veri['alanlar']));
		}
		
		$execut = $this->mysql->prepare('UPDATE '.$veri['tablo'].' SET '.$alanlar_V.''.$kosul);
		
		$result =  !($execut->execute(array_values($veri['alanlar']))) ? false : $this->mysql->lastInsertId();
		/*
			kayıt işlemi başarılı ise son idyi döndürür
			kayıt işlemi başarısız ise false döndürür
		*/
		$this->mysql;
		$execut = NULL;
		// sonucu false veya son id eez< döndürür
		return $result;
	}
	function db_DELETE($data){
		/*
		
			Daha Sonra Yazılacak
		
		*/
	}
}
?>