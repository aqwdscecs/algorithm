<?php

// 给定一个大小为 n 的数组，找到其中的多数元素。多数元素是指在数组中出现次数大于 ⌊ n/2 ⌋ 的元素。

// 你可以假设数组是非空的，并且给定的数组总是存在多数元素。

//  

// 示例 1:

// 输入: [3,2,3]
// 输出: 3
// 示例 2:

// 输入: [2,2,1,1,1,2,2]
// 输出: 2

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/majority-element
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


//这题初始思路是类似于 不同两个元素 抵消的办法
//map中存储[count value]
//如果当前元素和该键不存在 先设置对应键  并赋值   否则count++
//最后再遍历一次map  count > n/2的为多数元素

//但后面可以用抵消的办法  
//两个变量  当前记录最多元素(maj)   出现次数(count)
//当前元素和maj不同 count--
//若count==0  当前maj下台 换上num[i] count==1
//最后多数元素为 maj 

//思想就是多数元素对于其他元素上台都可以投一个反对票   而且还能剩余最少一张支持票给自己
//而其他元素 给其他元素投反对票之后 没有剩余票支持自己
//最后一定是多数元素当选

//时空复杂度O(n) O(1)
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $count = 0;
        $candidate = null;
        foreach ($nums as  $v) {
            if ($count == 0) {
                $candidate = $v;
                $count++;
            } else {
                $count += ($candidate == $v) ? 1 : -1;
            }
        }
        return $candidate;
    }
}