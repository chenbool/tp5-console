<?php
namespace app\admin\service;
use think\Controller;

class BaseService extends Controller
{
	// 模型
	protected $model;
	// 验证器
	protected $validate;
	//请求
	protected $request;

	function __construct(){
		$this->request = request();
	}

    public function delete($id)
    {
    	if( $this->model->destroy($id) ){
    		return ['error'	=>	0,'msg'	=>	'删除成功'];
    	}else{
    		return ['error'	=>	100,'msg'	=>	'删除失败'];	
    	}
    }

    // 数据验证
    public function _validate($req)
    {
    	$this->isPost();
		// 验证
		if( $this->validate->check( $req ) ) {
			return $this->addRes( $req );
		}else{
			return ['error'	=>	100,'msg'	=>	$this->validate->getError() ];
		}
    }

    //添加 或者更新数据
    public function addRes($data)
    {
		//检测是否包含主键
		if( !isset( $data[ $this->model->pk_id() ]) ){
			$data['add_time'] = time();
			$this->model->create($data);
			return ['error'	=>	0,'msg'	=>	'添加成功' ];
		}else{
			$this->model->update($data);
			return ['error'	=>	0,'msg'	=>	'更新成功'];
		}
    }

    //检测是否post请求
    protected function isPost(){
    	request()->isPost() || die('request not  post!');
    }

	//上传文件处理
	protected function uploadFile($name){
		$file = $this->request->file($name);
	    if( $file ){
	        $info = $file
		        	->validate( config('upload') )
		        	->move(ROOT_PATH .'public'.DS.'uploads');
	        return $info ? $info->getSaveName() : die( $this->error( $file->getError() ) );
	    }
	}

	public function index()
	{
    	return false;
	}

	public function create()
	{
    	return false;
	}	

}
