<?php
class Make
{

	/**
	 * [__construct 初始化]
	 * @param [array] $argv [控制台的参数]
	 */
	function __construct($cmd)
	{
		$this->make($cmd);
	}

	/**
	 * [make 判断第命令第二个参数]
	 * @param  [array] $cmd [命令的结果集]
	 * @return [type]      [description]
	 */
	public function make($cmd)
	{
		$tempCmd=$cmd[0];
		unset($cmd[0]);
		$cmd=array_values($cmd) ;

		switch ( $tempCmd ) {
			case 'init':
					require 'Init.php';
					new Init($cmd);
				break;
			case 'make':
					// var_dump($cmd);
					
					require 'View.php';
					require 'Model.php';
					require 'Service.php';
					require 'Validate.php';
					require 'Controller.php';

					$Controller=new Controller();
					$Controller->makeController($cmd);

					$Model=new Model();
					$Model->makeModel($cmd);

					$Model=new View();
					$Model->makeView([$cmd[0].'/index/index']);

					$Model=new Validate();
					$Model->makeValidate($cmd);
					
					$service=new Service();
					$service->makeService($cmd);
				break;
			case 'make:controller':
					echo " [controller] \n[#message#]:  ";
					require 'Controller.php';
					$Controller=new Controller();
					$Controller->makeController($cmd);
				break;
			case 'make:model':
					echo " [model] \n[#message#]:  ";
					require 'Model.php';
					$Model=new Model();
					$Model->makeModel($cmd);
				break;	
			case 'make:view':
					echo " [view] \n[#message#]:  ";
					require 'View.php';
					$Model=new View();
					$Model->makeView($cmd);
				break;	
			case 'make:validate':
					echo " [Validate] \n[#message#]:  ";
					require 'Validate.php';
					$Model=new Validate();
					$Model->makeValidate($cmd);
				break;				
			case 'make:service':
					echo " [Service] \n[#message#]:  ";
					require 'Service.php';
					$service=new Service();
					$service->makeService($cmd);
				break;	
			default:
					echo "sorry! is error\n";
				break;
		}	


	}


}

