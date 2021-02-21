<?php


/**
 * 代码中的类名、方法名、参数名已经指定，请勿修改，直接返回方法规定的值即可
 * 将给定数组排序
 * @param arr int整型一维数组 待排序的数组
 * @return int整型一维数组
 */
//快排 时空复杂度O(nlogn) O(logn)
function MySort( $arr )
{
    // write code here
    if (!count($arr)) return $arr;

    $lowArr = $upperArr = [];
    $randIndex = rand(0, count($arr)-1);
    $flagVal = $arr[$randIndex];

    for($i=1; $i<count($arr); $i++) {
    	if ($flagVal > $arr[$i]) {
    		$lowArr[] = $arr[$i];
    	} else {
    		$upperArr[] = $arr[$i];
    	}
    }

    $lowArr = MySort($lowArr);
    $upperArr = MySort($upperArr);

    $ret = array_merge($lowArr, array($flagVal), $upperArr);

    return $ret;
}