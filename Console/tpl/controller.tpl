<?php
namespace app\%s\Controller;
use app\%s\service\%sService as Service;

class %s extends Base {

    function __construct(Service $service)
    {
        parent::__construct();
        $this->object = $service;
    }

}
