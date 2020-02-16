<?php

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    
    //思路：先逆置  再将列对称交换   和线代扯上关系啦。。。 什么逆置 转置
    //O(n^2)  空间O(1)
    //执行用时 :12 ms, 在所有 PHP 提交中击败了41.18%的用户
    //内存消耗 :15.2 MB, 在所有 PHP 提交中击败了12.50%的用户
    function rotate(&$matrix) {
        if (!$matrix) return $matrix;
        
        $len = count($matrix);

        for($i=0; $i<$len; $i++) {
            for($j=$i; $j<$len; $j++) {
                $tmp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$j][$i];
                $matrix[$j][$i] = $tmp;
            }
        }

        for($i=0; $i<$len; $i++) {
            for($j=0; $j<intval($len/2); $j++) {
                $tmp = $matrix[$i][$j];
                $matrix[$i][$j] = $matrix[$i][$len-1-$j];
                $matrix[$i][$len-1-$j] = $tmp;
            }
        }
        return $matrix;
    }
    ///还有其他思路 是通过旋转各个顶点  不过代码实现比较困难 
}