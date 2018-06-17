<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14 0014
 * Time: 下午 7:45
 */


namespace app\index\controller;

use think\Controller;

class Indexin extends Controller
{
    public function index()
    {
        return $this->fetch('/index_x');
    }

}
