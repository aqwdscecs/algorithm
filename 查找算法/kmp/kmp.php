<?php

class KMP {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function setPrefixTable($needle)
    {
        $len = strlen($needle);
        //首先设置第一位的公共前缀位为0
        $prefix[0] = 0;

        $behindIndex = 0;
        //设置公共前缀为指针从1开始
        $index = 1;
        //循环设置1以及后面的前缀位
        while ($index < $len) {
            if ($needle[$behindIndex] == $needle[$index]) {
                $behindIndex ++;
                $prefix[$index] = $behindIndex;
                $index++;
            } else {
                if ($behindIndex <= 0) {
                    $prefix[$index] = $behindIndex;
                    $index++;
                } else {
                    $behindIndex = $prefix[$behindIndex-1];
                }
            }
        }
        return $prefix;
    }
    function strStr($haystack, $needle) {
        $patLen    = strlen($haystack);
        $needleLen = strlen($needle);
        
        //需要查找的长度为空的情况
        if (!$needleLen) return $needleLen;
        //patLen长度小于needle长度
        if ($patLen < $needleLen) return -1;
        //首先设置前缀记录表   
        $prefix = $this->setPrefixTable($needle);
        //pattern和needle串下标指针
        $patIndex = $needleIndex = 0;

        //遍历pattern查找
        while($patIndex < $patLen) {
            //当找到needle最后一位 并且和当前pattern对应位置字符相同
            if (  ($needleLen-1) == $needleIndex 
                &&($needle[$needleIndex] == $haystack[$patIndex])
                ) {
                    return $patIndex - $needleIndex;
                }
            
            //当前needle和pattern串字符相同
            if ( $needle[$needleIndex] == $haystack[$patIndex]) {
                $patIndex ++;
                $needleIndex++;
            } else {
                //不存在前缀 则pattern向下一位重新从pattern 的0位比较
                if ($needleIndex <= 0) {
                    $patIndex++;
                } else {
                    //如果不相同，needle找前缀位置 回退
                    $needleIndex = $prefix[$needleIndex-1];
                }
            }
        }
        return -1;
    }
}