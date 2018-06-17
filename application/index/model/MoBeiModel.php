<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31 0031
 * Time: 下午 7:36
 */


namespace app\index\model;

class MoBeiModel
{
    public function doMoBeiM($fri)
    {
        /*error_reporting(0);*/ //即可屏蔽所有错误
        header("Content-Type:text/html;charset=utf8");

        $a3 = $fri;
        $str2 = trim($a3);

        $pattern_hc = '/ton\s?\r\n/s';
        $parts_hc = preg_split($pattern_hc, $str2);
        /*print_r($parts_hc);*/
        echo "<br>";
        $parts_hc2 = array();
        foreach ($parts_hc as $i) {
            $pattern_hc = '/\r\n/s';
            $parts_hc = preg_split($pattern_hc, $i, 5);
            $parts_hc2[] = $parts_hc;
        }

        /*print_r($parts_hc2);*/
        echo "注意重复";


        echo "<br>";


        function diQu($e, $e2)//厂家的地区
        {
            preg_match_all('/\((.*?)\)/', $e, $out);
            if ($out[1] != null) {
                if (strpos("123" . $e2, $out[1][0])) {//  0也是等于false，所以加上"123".
                    return "";
                } else {
                    return $out[1][0];
                }
            }

        }

        function tq($e)//提取价格
        {
            preg_match_all('/\d{3,}/', $e, $out);
            return $out[0][0];
        }

        function sfdq($e)//市场某地区
        {
            preg_match_all('/\((.*?)\)/', $e, $out);
            if ($out[1] != null) {
                return $out[1][0] . "地区";
            } else {
                $keywords = preg_split("/\s+/", $e);
                return $keywords[0];
            }
        }


        echo "<br>";
        echo "<textarea  cols=\"60\" rows=\"20\"  id=\"jieguo2\">";

        $ChongFu = array();
        foreach ($parts_hc2 as $i2) {

            if (strpos($i2[4], "市场")) {
                $biaoTi_sc = sfdq($i2[4]) . $i2[1] . "市场价" . "\n";
                $pz = "=$i2[1]" . "\n";
                $neiRon_sc_1 = "    " . sfdq($i2[4]) . $i2[1] . "市场价" . tq($i2[4]) . "元/吨。" . "\n\n\n";
                if (trim($i2[2]) != "-") {
                    $neiRon_sc_2 = "    " . sfdq($i2[4]) . $i2[1] . "市场价";
                    $neiRon_sc_3 = "," . trim($i2[2]) . "报" . tq($i2[4]) . "元/吨" . "\n\n\n";
                    $neiRon_sc_1 = $neiRon_sc_2 . $neiRon_sc_3;
                }

            } else {
                $biaoTi_cj = diQu($i2[4], $i2[3]) . $i2[3] . $i2[1] . "出厂价" . "\n";
                $pz = "=$i2[1]" . "\n";
                $neiRon_cj_1 = "    " . diQu($i2[4], $i2[3]) . $i2[3] . $i2[1] . "出厂价" . tq($i2[4]) . "元/吨。" . "\n\n\n";
                if (trim($i2[2]) != "-") {
                    $neiRon_cj_2 = "    " . diQu($i2[4], $i2[3]) . $i2[3] . $i2[1] . "出厂价";
                    $neiRon_cj_3 = "," . trim($i2[2]) . "报" . tq($i2[4]) . "元/吨" . "\n\n\n";
                    $neiRon_cj_1 = $neiRon_cj_2 . $neiRon_cj_3;
                }
            }

//    var_dump(strpos($i2[4],"市场"));
            if (strpos($i2[4], "市场")) {
                echo $go = $biaoTi_sc . $pz . $neiRon_sc_1;
            } else {
                echo $goc = $biaoTi_cj . $pz . $neiRon_cj_1;
            }

            /*    $goArray[]=$go;
                $gocArray[]=$goc;*/
        }
        echo "</textarea>";
    }
}




















