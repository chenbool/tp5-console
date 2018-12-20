<?php

class Service
{

	public static function makeService($cmd)
	{
		self::writeService($cmd[0]);		
	}


	public static function writeService($module)
	{
        $temp=explode('/',$module);
        $module=strtolower($temp[0]);
        $service=ucfirst($temp[1]); 

		$name=$service.'.php';

        $tpl =file_get_contents(__DIR__.'/tpl/service.tpl');
        
    	$config=require 'Config.php';
    	$tpls=sprintf($tpl,$module,$module,$service,$module,$service,$service,$service,$service);
    	$path=$config['APP_PATH'].$module.'/service/'.$name;
    	$dir=$config['APP_PATH'].$module.'/service';

		//判断文件是否存在
		if(is_file($path) ){
			echo "Service file is exists \n";
		}else{
			file_exists( $dir ) ||  mkdir($dir,0755,true);
			// file_put_contents($path, $tpls) && die('Model create success!');
			if( file_put_contents($path, $tpls) ){
				echo "Service create success!\n";
			}
		}	

	}




}
