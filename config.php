<?php
    //Hataları Göster/Gösterme
    define('ERROR_REPORT',1);
    define('WARNING_REPORT',1);
    
    // Dizin
	define('ROOT_D',dirname(__FILE__).'');
	define('PAGES_D',ROOT_D.'pages\\');
	
	// URL
    define('HOST',$_SERVER['HTTP_HOST']);
    
    //DB Bilgileri
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASSWORD','');
	define('DB_NAME','blogV1');
	
	// Karakter seti
	define('DB_CHARSET','UTF8');
	define('PAGE_CHARSET','UTF-8');

	// SESSION Değişkenleri
	define('USER_NAME','user_info');
?>