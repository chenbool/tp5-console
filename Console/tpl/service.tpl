<?php
namespace app\%s\service;
use app\%s\model\%s,
	app\%s\validate\%sValidate;

class %sService extends BaseService
{

	function __construct()
	{
		parent::__construct();
        $this->validate = validate('%sValidate');
		$this->model 	= new %s();
	}

}
