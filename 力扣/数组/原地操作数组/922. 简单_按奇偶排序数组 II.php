<?php

//题目描述；给定一个非负整数数组 A， A 中一半整数是奇数，一半整数是偶数。

// 对数组进行排序，以便当 A[i] 为奇数时，i 也是奇数；当 A[i] 为偶数时， i 也是偶数。

// 你可以返回任何满足上述条件的数组作为答案。

//  

// 示例：

// 输入：[4,2,5,7]
// 输出：[4,5,2,7]
// 解释：[4,7,2,5]，[2,5,4,7]，[2,7,4,5] 也会被接受。
//  

// 提示：

// 2 <= A.length <= 20000
// A.length % 2 == 0
// 0 <= A[i] <= 1000

//首先找到偶数位值为奇数的
//再找奇数位值为偶数的  两个相交换
//时空复杂度O(n) O(1)
class Solution {

    /**
     * @param Integer[] $A
     * @return Integer[]
     */
    function sortArrayByParityII($A) {
        $len = count($A);
        $i = 0; $j = 1;

        for(; $i<$len; $i+=2){
            if ($A[$i] %2 == 1) {
                while($A[$j]%2==1 && $j < $len){
                    $j+=2;
                }
                if ($j >= $len) break;
                else {
                    $temp = $A[$i];
                    $A[$i] = $A[$j];
                    $A[$j] = $temp;
                }
            }
        }
        return $A;
    }
}