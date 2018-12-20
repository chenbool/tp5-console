<?php

class Validate
{

	public static function makeValidate($cmd)
	{
		self::writeValidate($cmd[0]);		
	}


	public static function writeValidate($module)
	{
		$temp=explode('/',$module);
		$module=strtolower($temp[0]);
		$name=ucfirst($temp[1]);		

		$tpl =file_get_contents(__DIR__.'/tpl/validate.tpl');

		$config=require 'Config.php';
		$tpls=sprintf($tpl,$module,$name );
		$path=$config['APP_PATH'].$module.'/validate/'.$name.'.php';
		
		$dir=$config['APP_PATH'].$module.'/validate';


		//判断文件是否存在
		if(is_file($path) ){
			echo "Validate file is exists";
		}else{
			file_exists( $dir ) ||  mkdir($dir,0755,true);
			// file_put_contents($path, $tpls) && die('Validate create success!');
			if( file_put_contents($path, $tpls) ){
				echo "Validate create success!\n";
			}
		}
		
	}



}