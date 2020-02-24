<?php

//题目描述：给定一个由整数组成的非空数组所表示的非负整数，在该数的基础上加一。

// 最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。

// 你可以假设除了整数 0 之外，这个整数不会以零开头。

// 示例 1:

// 输入: [1,2,3]
// 输出: [1,2,4]
// 解释: 输入数组表示数字 123。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/plus-one
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

  
class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */

    //执行用时 :12 ms, 在所有 PHP 提交中击败了21.43%的用户
    //内存消耗 :14.8 MB, 在所有 PHP 提交中击败了80.00%的用户
    
    function plusOne($digits) {
        for ($i = count($digits)-1; $i >= 0; $i--) {

            //低位+1
            $digits[$i] ++;
            //低位赋值
            $digits[$i] = $digits[$i] % 10;
            //为0则表示有向上进位
            if ($digits[$i] != 0) return $digits;

        }
        //99 / 9 / 999 情况
        array_unshift($digits, 1);
        return $digits;
    }
}