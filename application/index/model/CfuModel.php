<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/12 0012
 * Time: 下午 7:24
 */

namespace app\index\model;

class CfuModel
{
    public function doCfuM($fri, $sec)
    {
        header("Content-Type:text/html;charset=utf8");


        $a3 = $fri;
        $pz_0 = $sec;
        if ($pz_0 == "") {
            $pz_0 = 8;
        }


        $a3 = trim($a3);

        $string = $a3;
        $pattern = '/(\r\n){2,}/';
        $parts = preg_split($pattern, $string);
        echo "条数：" . count($parts);
        if (count($parts) > 1) {
            foreach ($parts as $chacuo) {
                $chacuo = trim($chacuo);
                $pattern = '/\r\n/';
                $parts_cc = preg_split($pattern, $chacuo);
                $parts_cc_1 = preg_replace("/=|(\s*)/", "", $parts_cc[1]);
                $parts_cc_1 = preg_replace("/焦炭/", "冶金焦", $parts_cc_1);
                if (strpos($parts_cc[0], $parts_cc_1)) {
                    if (strpos($parts_cc[2], $parts_cc_1)) {
                    } else {
                        echo "<br>" . "<a style='color: orangered'>关键词-内容错了:" . $parts_cc[2] . "</a> ";
                    }
                } else {
                    echo "<br><a style='color: dodgerblue'>~$parts_cc_1 " . "~关键词错了:" . $parts_cc[0] . "</a> ";
                }


            }
        }

        $p2 = array();
        /*print_r($parts);*/
        foreach ($parts as $fg) {
            $rest = mb_substr($fg, 0, $pz_0, "utf-8");
            $parts2[] = $rest;
        }
        /*echo $rest = substr($parts[0], 0,14);*/
        /*print_r($parts2);*/
        $jg = array_count_values($parts2);//统计数组中所有值出现的次数：
        /*print_r(array_count_values($parts2));*/
        /*echo current($parts2) . "<br>";*/
        foreach ($jg as $sch) {
            if ($sch > 1) {
                /* echo "可能的重复项 ".array_search($sch,$jg) . "<br>";*/
                $p = array_keys($jg, $sch);
                /*print_r($p);*/
                $p2[] = $p;

            }
        }
//移除数组中重复的值
        $ppp3 = array_unique($p2, SORT_REGULAR);//不支持多维数组
        echo "<br>";
//-------------------------------二维数组转一维
        function yizhuanger($youde)
        {
            $result = [];
            array_walk_recursive($youde, function ($value) use (&$result) {
                array_push($result, $value);
            });
            return $result;
        }

//-------------------------------
        $ppp3 = yizhuanger($ppp3);

        /*print_r($ppp3);*/
        foreach ($ppp3 as $sch) {

            echo "可能的重复项: " . $sch . "<br>";

        }
        $p = array_keys($jg, 2);

        if (!$ppp3) {
            echo "此精度无重复";
        }
    }
}