<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/27 0027
 * Time: 下午 7:40
 */

namespace app\index\model;

class ZTBanModel
{
    public function doZTB($fri, $sec)
    {
        header("Content-Type:text/html;charset=utf8");

        $a3 = $fri;
        $p1 = $sec;
        $str2 = trim($a3);

//去掉画线
        $pattern = '/={41}|(={5}\s\d{4}年\d+月\d+日\s|={3}|\s下午|\s\d{2}:\d{2}:\d{2}\s={5})/s';
        $CJ = preg_replace($pattern, "", $str2);

        $pattern2 = '/((\r\n)|(\n)){4}/s';
        $CJ2 = preg_replace($pattern2, "\n\n\n", $CJ);

        $CJ2 = trim($CJ2);


        $pattern_hc = '/\n\n\n/s';
        $parts_hc = preg_split($pattern_hc, $CJ2);

        foreach ($parts_hc as $kk) {
            $string = $kk;
            $pattern = '/(\r\n)|(\n)/';
            $parts = preg_replace($pattern, "\n=$p1\n    ", $string, 1);


            $parts_jg[] = $parts;

        }

//数组转字符串，第一个参数连接 是不是可以用回调？25-38
        $parts = implode("\n\n\n", $parts_jg);
        $string2 = $parts;
        $pattern4 = '/\d+月\d+日，|\d+月\d+日/';
        $parts = preg_replace($pattern4, "", $string2);


//判断是不是搜塑的
        $find_http = 'http://';
        $pos = strpos($parts, $find_http);
        if ($pos == true) {
//不是搜塑的,去掉中间的两行
            $string = $parts;
            $pattern = '/\n\n\n/s';
            $parts_out = preg_split($pattern, $string);
            echo "<textarea  cols=\"60\" rows=\"20\"  id=\"jieguo2\">";
            foreach ($parts_out as $ys) {
                $string = $ys;
                $pattern = '/\n/s';
                $parts_out2 = preg_split($pattern, $string);
                unset($parts_out2[2], $parts_out2[3]);
                foreach ($parts_out2 as $ys2) {
                    print_r($ys2);
                    echo "\n";
                }
                echo "\n\n";
            }
            echo "</textarea>";

        } else {
            //是搜塑的
            echo "<textarea  cols=\"60\" rows=\"20\"  id=\"jieguo2\">";
            print_r($parts);
            echo "</textarea>";
        }

        echo "</br>";
        echo "<a href=\"ZTBan.html\">返回</a>";
    }

    public function doSYS($fri, $sec)
    {
        header("Content-Type:text/html;charset=utf8");

        $a3 = $fri;
        $foo = array("0" => "2");
        $str2 = trim($a3);

        if ($foo[0] == 2) {


//-------------------------
            $pattern = '/(\n\n)|(\r\n\r\n)/';
            $parts = preg_split($pattern, $str2);
            echo "<textarea   cols=\"60\" rows=\"20\"  id=\"jieguo2\">";
            foreach ($parts as $ChuLai_1) {
                $pattern = '/={41}|(={5}\s\d{4}年\d+月\d+日\s|={3}|\s下午|\s\d{2}:\d{2}:\d{2}\s={5})/s';
                $CJ = preg_replace($pattern, "", $ChuLai_1);
                $str2 = trim($CJ);
                $string = $str2;
                $pattern = '/(\s){1,}/';
                $parts = preg_split($pattern, $string);


                $str = $parts[0];

                $regex = "/股份有限公司|有限公司|有限责任公司|销售分公司|分公司/";

                $CJ = preg_replace($regex, "", $str);


//找出指定键值键名
                $CaiZhi = array_keys($parts, "材质");


                switch ($parts[2]) {
                    case "双氧水":


                        $hebing1 = "\n";
                        $hebing2 = $CJ . $parts[count($parts) - 1] . "%" . $parts[2] . "出厂价";
                        $hebing3 = "\n";
                        $hebing4 = "=" . $parts[2] . "\n";
                        $hebing5 = '    ';
                        $hebing6 = $parts[0] . $parts[count($parts) - 1] . "%" . $parts[2] . "出厂价" . $parts[5] . "。";
                        $hebing[] = $hebing1 . $hebing2 . $hebing3 . $hebing4 . $hebing5 . $hebing6;
                        break;
                    case "硝酸"://三个匹配同一个代码
                    case "盐酸"://三个匹配同一个代码
                    case "磷酸"://三个匹配同一个代码

                        $hebing1 = "\n";
                        $hebing2 = $CJ . $parts[count($parts) - 1] . $parts[2] . "出厂价";
                        $hebing3 = "\n";
                        $hebing4 = "=" . $parts[2] . "\n";
                        $hebing5 = '    ';
                        $hebing6 = $parts[0] . $parts[count($parts) - 1] . $parts[2] . "出厂价" . $parts[5] . "。";
                        $hebing[] = $hebing1 . $hebing2 . $hebing3 . $hebing4 . $hebing5 . $hebing6;
                        break;
                    case "活性炭":

                        $hebing1 = "\n";
                        $hebing2 = $CJ . $parts[$CaiZhi[0] + 1] . $parts[2] . "出厂价";
                        $hebing3 = "\n";
                        $hebing4 = "=" . $parts[2] . "\n";
                        $hebing5 = '    ';
                        $hebing6 = $parts[0] . $parts[$CaiZhi[0] + 1] . $parts[2] . "出厂价" . $parts[5] . "。";
                        $hebing[] = $hebing1 . $hebing2 . $hebing3 . $hebing4 . $hebing5 . $hebing6;
                        break;
                    default:

                        $hebing1 = "\n";
                        $hebing2 = $CJ . $parts[2] . "出厂价";
                        $hebing3 = "\n";
                        $hebing4 = "=" . $parts[2] . "\n";
                        $hebing5 = '    ';
                        $hebing6 = $parts[0] . $parts[2] . "出厂价" . $parts[5];
                        $hebing[] = $hebing1 . $hebing2 . $hebing3 . $hebing4 . $hebing5 . $hebing6;
                }
            }
            foreach ($hebing as $chu) {
                echo $chu . "\n\n";

            }
/*            $arr_age = array("wang"=>18, "li"=>20, "zhang"=>25);
            foreach ($arr_age as $age) {
                echo $age,'<br />';
            }*/

/*            print_r($hebing);*/
            echo "</textarea>";


//---------------
        }

    }

}




