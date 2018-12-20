<?php
header("Content-type: text/html; charset=utf-8");    

// $argv=array('artisan','make','controller','Admin','User555');

$cmd=New Console($argv);

class Console
{

	/**
	 * [__construct 初始化]
	 * @param [array] $argv [控制台的参数]
	 */
	function __construct($argv)
	{
		$cmd = self::cmd($argv);
		count($cmd)>0 && self::switchCmd($cmd);
		if( count($cmd)<=0 ){
			self::getList();
		}
		// echo "\n";
		echo "-------------------------------------------------------------------------------\n";

	}


	/**
	 * [cmd 获取控制台的命令]
	 * @param  [array] $argv [控制台的参数]
	 * @return [array]       [命令的结果集]
	 */
	public static function cmd($argv)
	{
		unset($argv[0]);
		$argv = array_values($argv);	
		echo "---------------------------[ Welcome to Console ]------------------------------\n";
		return $argv;
	}


	/**
	 * [switchCmd 判断命令第一个参数]
	 * @param  [array] $cmd [命令的结果集]
	 * @return [type]      [description]
	 */
	public static function switchCmd($cmd)
	{
		switch ($cmd[0]) {
			case 'init':
					echo "[#action#]:   init \n";
					require './Console/Make.php';
					new Make($cmd);
				break;
			case 'make':
					echo "[#action#]:   make\n";
					require './Console/Make.php';
					new Make($cmd);
				break;
			case 'make:controller':
					echo "[#action#]:   make:controller";
					require './Console/Make.php';
					new Make($cmd);
				break;
			case 'make:model':
					echo "[#action#]:   make:model";
					require './Console/Make.php';
					new Make($cmd);
				break;
			case 'make:view':
					echo "[#action#]:   make:view";
					require './Console/Make.php';
					new Make($cmd);
				break;
			case 'make:validate':
					echo "[#action#]:   make:validate";
					require './Console/Make.php';
					new Make($cmd);
				break;
			case 'make:service':
					echo "[#action#]:   make:service";
					require './Console/Make.php';
					new Make($cmd);
				break;
			case '-v':
					echo "[ version ]:   2.0\n";
					echo "[ author  ]:   bool\n";
					echo "[  time   ]:   2018-02-21 18:35\n";
				break;	
			case '-h':
					echo "[ version ]:   2.0\n";
					echo "[ author  ]:   bool\n";
					echo "[  time   ]:   2017-02-21 18:35\n";
					echo "[   QQ    ]:   30024167\n";
					echo '[  github ]:   https://github.com/bool1993/tp-console';
				break;			
			default:
				self::getList();
				break;
		}		
	}

	// 获取列表
	public static function getList(){
		echo " Init       : php app init admin \n";
		echo " All        : php app make admin/index\n";
		echo " Controller : php app make:controller admin/index \n";
		echo " Model      : php app make:model      admin/index \n";			
		echo " View       : php app make:view       admin/index/info \n";
		echo " Validate   : php app make:validate   admin/index \n";
		echo " Service    : php app make:service    admin/index \n";
	}


}