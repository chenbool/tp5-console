<?php

class Init
{

	function __construct($cmd){
		// var_dump($cmd);
		$this->make($cmd);
	}

	public function make($module){
		$config=require 'Config.php';
		$module = $module[0];

    	$path = [
    		[
    			'file_path' 	=> '/init/Base.php',
    			'to_file_path'	=> '/'.$module.'/controller/Base.php',
    			'dir_path'		=> '/'.$module.'/controller/'
    		],
    		// [
    		// 	'file_path' 	=> '/init/Model.php',
    		// 	'to_file_path'	=> '/model/Base.php',
    		// 	'dir_path'		=> '/model/'
    		// ],
    		[
    			'file_path' 	=> '/init/Model.php',
    			'to_file_path'	=> '/'.$module.'/model/Base.php',
    			'dir_path'		=> '/'.$module.'/model/'
    		],
    		[
    			'file_path' 	=> '/init/BaseService.php',
    			'to_file_path'	=> '/'.$module.'/service/BaseService.php',
    			'dir_path'		=> '/'.$module.'/service/'
    		]
    	];


		foreach ($path as $v) {
			$file_path = __DIR__.$v['file_path'];

			$to_file_path = $config['APP_PATH'].$v['to_file_path'];

			$dir_path = $config['APP_PATH'].$v['dir_path'];

			file_exists( $dir_path ) ||  mkdir($dir_path,0755,true);

			if( is_file( $to_file_path ) ){
				echo $v['to_file_path'].": --> file is exists! \n";
				break;
			}else{
				copy($file_path,$to_file_path );
				echo $v['to_file_path'].": --> is copy ok! \n";
			}

		}
		

	}

}
