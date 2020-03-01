<?php

//题目描述
//一个整型数组里除了两个数字之外，其他的数字都出现了两次。请写程序找出这两个只出现一次的数字。



//简单思路
//时间复杂度O(2n) 空间复杂度O(n)
function FindNumsAppearOnce($array)
{
    // write code here
    // return list, 比如[a,b]，其中ab是出现一次的两个数字
    if (empty($array)) return null;
    
    $arrMap = [];
    foreach($array as $key => $value) {
        // if (array_key_exists($value, $arrMap)) {
        //     unset($arrMap[$value]);
        // }else {
        //     $arrMap[$value] = $key;
        // }
        if (!isset($arrMap[$value])) {
        	$arrMap[$value] = $key;
        } else {
        	unset($arrMap[$value]);
        }
    }
    $ret = [];
    foreach ($arrMap as $key => $value) {
        $ret[] = $key;
    }
    return $ret;
}


//异或计算
//时间复杂度小于等于O(2n + 32) 空间复杂度O(1)

//数组元素互相异或   相同数字异或为0   结果为只出现一次的两个数字异或结果
//计算异或结果比特最低位为1的下标   并在进行一次遍历   
//每个元素和当前位(最低位)相同 分一组   
//                      不同 分一组   
//  则分开的两个数组互相异或结果就是两个只出现一次的数字
function FindNumsAppearOnce($array)
{
    // write code here
    // return list, 比如[a,b]，其中ab是出现一次的两个数字
    $count = count($array);
    
    if ($count < 2) return $array;
    
    $xorRet = 0;
    //求得a^b的结果
    foreach($array as $key => $value) {
        $xorRet ^= $value;
    }
    
    //计算最小bite位为1的下标
    for ($firstZeroIndex=0; $firstZeroIndex < 32; $firstZeroIndex++) {
        if( ($xorRet &(1<<$firstZeroIndex)) != 0) break;
    }
    //返回的结果
    $result[0] = $result[1] = 0;
    for ($index=0; $index < $count; $index++) {
        if( ($array[$index] & (1<<$firstZeroIndex)) != 0) {
            $result[0] ^= $array[$index];
        } else {
            $result[1] ^= $array[$index];
        }
    }
    return $result;
}

//类似题型还有 数组a中只有一个数出现一次，其他数都出现了2次，找出这个数字
//            数组a中只有一个数出现一次，其他数字都出现了3次，找出这个数字