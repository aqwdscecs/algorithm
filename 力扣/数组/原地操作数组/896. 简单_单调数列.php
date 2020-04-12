<?php

/*

如果数组是单调递增或单调递减的，那么它是单调的。

如果对于所有 i <= j，A[i] <= A[j]，那么数组 A 是单调递增的。 如果对于所有 i <= j，A[i]> = A[j]，那么数组 A 是单调递减的。

当给定的数组 A 是单调数组时返回 true，否则返回 false。

示例 1：
输入：[1,2,2,3]
输出：true

示例 2：
输入：[6,5,4,4]
输出：true

示例 3：
输入：[1,3,2]
输出：false

提示：
1 <= A.length <= 50000
-100000 <= A[i] <= 100000

*/

/*如果当前比较结果不为0  并且和上一个存储的比较符号不同 返回false*/
/*时空复杂度 O(n) O(1)*/
class Solution {

    /**
     * @param Integer[] $A
     * @return Boolean
     */
    function isMonotonic($A) {
        if (count($A) <=1 ) return true;
        $flag = 0;

        for($i=1; $i<count($A); $i++) {
            if ($A[$i] > $A[$i-1]) $comp = 1;
            else if ($A[$i] < $A[$i-1]) $comp = -1;
            else $comp = 0;

            if ($comp != 0) {
                if ($flag != 0 && $comp != $flag)
                    return false;

                $flag = $comp;
            }
        }
        return true;
    }
}


/*上面方法循环中的if过多  下面用大于 小于存储  如果两个同时不为0 返回false*/
class Solution {

    /**
     * @param Integer[] $A
     * @return Boolean
     */
    function isMonotonic($A) {
        $len = count($A);
        if ($len <= 2) return true;

        $isPower = $isLower = 0;

        for ($i=1; $i<$len ; $i++) {
            if ($A[$i] > $A[$i-1]) $isPower+= 1;
            else if ($A[$i] < $A[$i-1]) $isLower += 1;

            if ($isPower && $isLower) return false;
        }
        return true;
    }
}