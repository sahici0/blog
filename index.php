<?php
include('config.php');
include('library/error/Error.php');
include('library/session/session.php');
include('library/theme/theme.php');
include('operation/basic_functions.php');
include_once(ROOT_D.'/library/database/'.DATABASE);

global $glob;
$glob 	= array(
			'error' => array(
						'class' => new  lib_error(),
							),
			'session'=> array(
						'class' => new	fr_session(),
						),
			'db'=> array(
						'class' => new	library_sql(),
						),
			
			'theme'=> array(
						'class' => new lib_theme(),
							),
			'bfunctions' => array(
						'class' => new basicFunctions(),
						)
			);
			
include('theme/index.php');


?>