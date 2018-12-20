<?php
namespace app\%s\validate;
use think\Validate;

class %sValidate extends Validate
{
    protected $rule = [
        'title'	=>  'require',
    ];

    protected $message  =   [
        'title.require'	=>  '标题必填',
    ];
}
