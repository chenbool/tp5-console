<?php
namespace app\admin\controller;
use think\Controller,
	think\Request,
    think\Session,
    app\admin\model\Admin,
    app\admin\service\MenuService;

class Base extends Controller
{
    protected $object;
    
	function _initialize()
    {

        if( !Session::has('admin_id') ){
            $this->redirect('login/index');
        }
        
        $this->assign([
            'admin_info'    =>  Admin::get(['id' => Session::get('admin_id') ]),
            'menu'          =>  (new MenuService())->getAll(),
        ]);

	}


    // index
    public function index()
    {
        $this->assign( $this->object->index() ) ;  
        return view();
    }


    public function create()
    {
        $this->assign( $this->object->create() ); 
        return view();
    }


    public function save(Request $request)
    {
        return $this->object->save();
    }

    public function edit($id)
    {
        $this->assign( $this->object->edit($id) ); 
        return view();
    }

    public function delete()
    {
        $id = request()->param('id');
        return $this->object->delete($id);
    }

    // 空方法
    public function _empty($name)
    {
        return $name.'方法不存在';
    }

}
