<?php

class Model
{

	/**
	 * [makeModel 判断第命令第三、四个参数个参数]
	 * @param  [array] $cmd [命令的结果集]
	 * @return [type]      [description]
	 */
	public static function makeModel($cmd)
	{
		self::writeModel($cmd[0]);		
	}


	public static function writeModel($module)
	{
        $temp=explode('/',$module);
        $module=strtolower($temp[0]);
        $model=ucfirst($temp[1]); 

		$name=$model.'.php';

        $tpl =file_get_contents(__DIR__.'/tpl/model.tpl');
        
    	$config=require 'Config.php';
    	$tpls=sprintf($tpl,$module,$model);
    	$path=$config['APP_PATH'].$module.'/model/'.$name;
    	$dir=$config['APP_PATH'].$module.'/model';

		//判断文件是否存在
		if(is_file($path) ){
			echo "Model file is exists \n";
		}else{
			file_exists( $dir ) ||  mkdir($dir,0755,true);
			// file_put_contents($path, $tpls) && die('Model create success!');
			if( file_put_contents($path, $tpls) ){
				echo "Model create success!\n";
			}
		}	

	}



}