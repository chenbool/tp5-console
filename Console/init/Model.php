<?php
namespace app\admin\model;
use think\Model,
    think\Request;

class Base extends Model
{
    protected $where;
    protected $order;
    // protected $field = ['*'];
    protected $pageNum = 15;



    public function page(){
        $request = Request::instance();
        // $request->except(['page']);
        $data = $request->param();

        if( isset($data['keyword']) ){
            $this->where['title'] = ['like','%'.$data['keyword'].'%' ];
        }

        if( isset($data['order']) ){
            $this->order = $data['order'].' desc';
        }else{
            $this->order = $this->pk_id().' asc';
        }
        
        unset($data['order']);

        //封装where查询条件 循环生成条件
        foreach ($data as $k => $v) {
            if( !is_null($v) && !empty($v) ){
                $this->where[$k] = $v;
                $this->where[$k] = ['like','%'.$v.'%' ];
            }
        }

        unset($this->where['page']);
        

        return $this
            // ->field( $this->field )
            ->where($this->where)
            ->order($this->order)
            ->paginate( $this->pageNum );     
    }   
     
    public function pk_id(){
        return $this->pk;
    }
}

