<?php

//题目描述：给定一个非负整数数组 A，返回一个数组，在该数组中， A 的所有偶数元素之后跟着所有奇数元素。

// 你可以返回满足此条件的任何数组作为答案。

//  

// 示例：

// 输入：[3,1,2,4]
// 输出：[2,4,3,1]
// 输出 [4,2,3,1]，[2,4,1,3] 和 [4,2,1,3] 也会被接受。
//  

// 提示：

// 1 <= A.length <= 5000
// 0 <= A[i] <= 5000

//双指针法 
//时空复杂度O(n) O(1)
//执行用时 :36 ms, 在所有 PHP 提交中击败了35.71%的用户
//内存消耗 :15.6 MB, 在所有 PHP 提交中击败了100.00%的用户
class Solution {

    /**
     * @param Integer[] $A
     * @return Integer[]
     */
    function sortArrayByParity($A) {
        $eventIndex = $oddIndex = 0;

        $len = count($A);

        while($oddIndex <$len && $eventIndex < $len) {
            while($oddIndex < $len){
                if ($A[$oddIndex] % 2 == 1)//奇数
                    break;
                else $oddIndex++;
            }
            $eventIndex = $eventIndex == 0 ? $oddIndex+1 : $eventIndex+1;
            while($eventIndex < $len) {
                if ($A[$eventIndex] % 2 == 0)
                    break;
                else $eventIndex++;
            }

            if ($eventIndex >= $len || $oddIndex >= $len) break;

            else {
                $temp = $A[$eventIndex];
                $A[$eventIndex] = $A[$oddIndex];
                $A[$oddIndex] = $temp;
            }
        }
        return $A;
    }
}

//优化：首尾指针法  代码更优美
class Solution {

    /**
     * @param Integer[] $A
     * @return Integer[]
     */
    function sortArrayByParity($A) {
        $len = count($A);

        $i = 0; $j = $len-1;

        while($i<$j) {
            if ($A[$i]%2 > $A[$j]%2) {
                $temp  = $A[$i];
                $A[$i] = $A[$j];
                $A[$j] = $temp;
            }
            while ($A[$i]%2 == 0 && $i < $j) $i++;
            while ($A[$j]%2 == 1 && $j > $i) $j--;
        }
        return $A;
    }
}