<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/14 0014
 * Time: 下午 8:26
 */


namespace app\index\controller;

use app\index\model\MoBeiModel;
use app\index\model\CfuModel;
use app\index\model\ZTBanModel;
use think\Controller;


class Zonghe extends Controller
{
    public function longzhong()
    {
        return $this->fetch('/zonghe/lz');
    }

    public function mobei()
    {
        return $this->fetch('/zonghe/mb');
    }

    public function do_mobei()
    {
        $a3 = $_POST["fnameoo"];
        $out = new MoBeiModel();
        $out->doMoBeiM($a3);
    }

    public function mo_ban()
    {
        return $this->fetch('/mo_ban/cfu');
    }

    public function cfu()
    {
        return $this->fetch('/zonghe/cfu');
    }

    public function do_cfu()
    {
        $a3 = $_POST["fnameo"];
        $pz_0 = $_POST["pzhon"];
        $out = new CfuModel();
        $out->doCfuM($a3, $pz_0);
    }

    public function more()
    {
        $a3 = $_GET['more_name'];
        $this->assign('a3', $a3);
        return $this->fetch('/more');
    }


    public function do_more()
    {
        $more_go = input("more_go");
        $a3 = input("fnameo");
        $pz_0 = input("pzhon");

/*        $more_go = $_POST["more_go"];
        $a3 = $_POST["fnameo"];
        $pz_0 = $_POST["pzhon"];*/
/*echo "<textarea>"."123".$a3."</textarea>";*/
        $out = new ZTBanModel();
        switch ($more_go) {
            case "ZTBan":
                $out->doZTB($a3, $pz_0);
                break;
            case "SYS":
                $out->doSYS($a3, $pz_0);
                break;
        }

    }
}
