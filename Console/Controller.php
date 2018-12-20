<?php

class Controller
{

	public static function makeController($cmd)
	{		
		var_dump($cmd[0]);
		self::writeController($cmd[0]);		
	}

	// 创建控制器
	public static function writeController($module)
	{

		$temp=explode('/',$module);
		// 模块
		$module=strtolower($temp[0]);
		// 控制器
		$controller=ucfirst($temp[1]);

		$name=$controller.'.php';

	    $tpl =file_get_contents(__DIR__.'/tpl/controller.tpl');

		$config=require 'Config.php';
		$tpls=sprintf($tpl,$module,$module,$controller,$controller);

		$path=$config['APP_PATH'].$module.'/controller/'.$name;

		$dir=$config['APP_PATH'].$module.'/controller';

		//判断文件是否存在
		if(is_file($path) ){
			echo "Controller file is exists \n";
		}else{
			file_exists( $dir ) ||  mkdir($dir,0755,true);
			// file_put_contents($path, $tpls) && die("Controller create success!\n");
			if( file_put_contents($path, $tpls) ){
				echo "Controller create success!\n";
			}
		}
	
	}


}