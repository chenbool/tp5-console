<?php

class View
{

	public static function makeView($cmd)
	{
		self::writeView($cmd[0]);		
	}


	public static function writeView($module)
	{
		$temp=explode('/',$module);
		$module=strtolower($temp[0]);
		$controller=strtolower($temp[1]);	
		$view=$temp[2];	
		$name=$view.'.html';


		$tpl =file_get_contents(__DIR__.'/tpl/view.tpl');
		$config=require 'Config.php';
		$tpls=sprintf($tpl,$view,$view);
		$path=$config['APP_PATH'].$module.'/view/'.$controller.'/'.$name;
		$dir=$config['APP_PATH'].$module.'/view/'.$controller;



		//判断文件是否存在
		if(is_file($path) ){
			echo "View file is exists\n";
		}else{
			file_exists( $dir ) ||  mkdir($dir,0755,true);
			// file_put_contents($path, $tpls) && die('View create success!');
			if( file_put_contents($path, $tpls) ){
				echo "View create success!\n";
			}
		}
		

	}



}
