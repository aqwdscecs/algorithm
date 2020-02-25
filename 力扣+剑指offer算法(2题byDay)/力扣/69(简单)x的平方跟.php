<?php



class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) {
        //类似于查找某个数字  其最大数字的平方小于等于 x 
        //方法1：暴力遍历，从1开始向上找其最大的小于等于x的值
        $i = 1;
        while (($i * $i) <= $x ) {
            if (($i*$i) < 0) break;
            $i++;
        } 
        return $i-1;
    }
    //方法2：设置左右边界  类似二分法查找
    //时间复杂度O(logN) 空间复杂度O(1)

    //首先 left = right 我们就可以跳出循环 直接返回  所有循环条件是 left < right 
    //其次注意 left逼近时 有可能当前mid就是max[mid]^2 <= x 所以left逼近应该时left = mid
    //那么紧接着想到的就是如果剩两位时  mid = left+(right-left)/2 会陷入死循环 所以在区间或者mid选择上我们 在考虑一下
    //区间  如果是偶数 取右中位数， 原因1: left = mid 而不是mid+1  如果去左中位会进入死循环
    
    function mySqrt($x) {
        if ($x < 2) return $x;
        if ($x == 2) return 1;

        $left = 2;
        $right = intval($x / 2);

        while ($left < $right) {
            $mid = $left + intval(($right - $left)/2 + 1);
            $pow = $mid*$mid;
          
            if ($pow < $x) $left = $mid; 
            else if ($pow > $x) $right = $mid-1;
            else return $mid;
        }
        //运行到这 left >= right   并且 left^2 > x & right^2 < x
        return $right;
    }

    //新get的算法 牛顿迭代
    
}