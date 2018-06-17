<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/25 0025
 * Time: 下午 3:34
 */

namespace app\index\model;

class ZTBanModel
{
    public function doSYS($fri, $sec)
    {
        header("Content-Type:text/html;charset=utf8");

        $a3 = $fri;
        $a4=$sec;
        $foo = 2;
        $str2 = trim($a3);

        if ($foo[0] == 2) {


//-------------------------
            $pattern = '/\r\n\r\n/';
            $parts = preg_split($pattern, $str2);
            echo "<textarea  cols=\"60\" rows=\"20\"  id=\"jieguo2\">";
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

                        echo "\n";
                        echo $CJ . $parts[count($parts) - 1] . "%" . $parts[2] . "出厂价";
                        echo "\n";
                        echo "=" . $parts[2] . "\n";
                        echo '    ';
                        echo $parts[0] . $parts[count($parts) - 1] . "%" . $parts[2] . "出厂价" . $parts[5] . "。";

                        break;
                    case "硝酸"://三个匹配同一个代码
                    case "盐酸"://三个匹配同一个代码
                    case "磷酸"://三个匹配同一个代码

                        echo "\n";
                        echo $CJ . $parts[count($parts) - 1] . $parts[2] . "出厂价";
                        echo "\n";
                        echo "=" . $parts[2] . "\n";
                        echo '    ';
                        echo $parts[0] . $parts[count($parts) - 1] . $parts[2] . "出厂价" . $parts[5] . "。";

                        break;
                    case "活性炭":

                        echo "\n";
                        echo $CJ . $parts[$CaiZhi[0] + 1] . $parts[2] . "出厂价";
                        echo "\n";
                        echo "=" . $parts[2] . "\n";
                        echo '    ';
                        echo $parts[0] . $parts[$CaiZhi[0] + 1] . $parts[2] . "出厂价" . $parts[5] . "。";

                        break;
                    default:

                        echo "\n";
                        echo $CJ . $parts[2] . "出厂价";
                        echo "\n";
                        echo "=" . $parts[2] . "\n";
                        echo '    ';
                        echo $parts[0] . $parts[2] . "出厂价" . $parts[5];

                }
                echo "\n\n";
            }
            echo "</textarea>";


//---------------
        } else {


            $string = $str2;
            $pattern = '/(\s){1,}/';
            $parts = preg_split($pattern, $string);


            $str = $parts[0];

            $regex = "/股份有限公司|有限公司|有限责任公司/";

            $CJ = preg_replace($regex, "", $str);


//找出指定键值键名
            $CaiZhi = array_keys($parts, "材质");


            switch ($parts[2]) {
                case "双氧水":
                    echo "</br></br></br>";
                    echo "<textarea  cols=\"60\" rows=\"20\"  id=\"jieguo2\">";
                    echo "\n";
                    echo $CJ . $parts[count($parts) - 1] . "%" . $parts[2] . "出厂价";
                    echo "\n";
                    echo "=" . $parts[2] . "\n";
                    echo '    ';
                    echo $parts[0] . $parts[count($parts) - 1] . "%" . $parts[2] . "出厂价" . $parts[5] . "。";
                    echo "</textarea>";
                    break;
                case "硝酸"://三个匹配同一个代码
                case "盐酸"://三个匹配同一个代码
                case "磷酸"://三个匹配同一个代码
                    echo "</br></br></br>";
                    echo "<textarea  cols=\"60\" rows=\"20\"  id=\"jieguo2\">";
                    echo "\n";
                    echo $CJ . $parts[count($parts) - 1] . $parts[2] . "出厂价";
                    echo "\n";
                    echo "=" . $parts[2] . "\n";
                    echo '    ';
                    echo $parts[0] . $parts[count($parts) - 1] . $parts[2] . "出厂价" . $parts[5] . "。";
                    echo "</textarea>";
                    break;
                case "活性炭":
                    echo "</br></br></br>";
                    echo "<textarea  cols=\"60\" rows=\"20\"  id=\"jieguo2\">";
                    echo "\n";
                    echo $CJ . $parts[$CaiZhi[0] + 1] . $parts[2] . "出厂价";
                    echo "\n";
                    echo "=" . $parts[2] . "\n";
                    echo '    ';
                    echo $parts[0] . $parts[$CaiZhi[0] + 1] . $parts[2] . "出厂价" . $parts[5] . "。";
                    echo "</textarea>";
                    break;
                default:
                    echo "</br></br></br>";
                    echo "<textarea  cols=\"60\" rows=\"20\"  id=\"jieguo2\">";
                    echo "\n";
                    echo $CJ . $parts[2] . "出厂价";
                    echo "\n";
                    echo "=" . $parts[2] . "\n";
                    echo '    ';
                    echo $parts[0] . $parts[2] . "出厂价" . $parts[5];
                    echo "</textarea>";
            }
        }
    }
}
