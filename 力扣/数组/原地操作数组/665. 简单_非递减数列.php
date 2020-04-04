<?php

//题目描述:
// 给你一个长度为 n 的整数数组，请你判断在 最多 改变 1 个元素的情况下，该数组能否变成一个非递减数列。

// 我们是这样定义一个非递减数列的： 对于数组中所有的 i (1 <= i < n)，总满足 array[i] <= array[i + 1]。

//  

// 示例 1:

// 输入: nums = [4,2,3]
// 输出: true
// 解释: 你可以通过把第一个4变成1来使得它成为一个非递减数列。
// 示例 2:

// 输入: nums = [4,2,1]
// 输出: false
// 解释: 你不能在只改变一个元素的情况下将其变为非递减数列。
//  

// 说明：

// 1 <= n <= 10 ^ 4
// - 10 ^ 5 <= nums[i] <= 10 ^ 5

//调整当前num[i]>nums[i+1]  可能调整nums[i] = nums[i+1] 
//                       也有可能是 nums[i+1] = nums[i]
//可以在纸上画出需要调整的各种情况  
//第一种 3(i) 2时 访问到3 前面没有元素  我们只能尽可能小的调整前面元素  所以nums[i] = nums[i+1]
//第二种  3 4 1 访问到4  前面3(x) > 1(z)的  我们只能调整 1(z) 为4(y)  如果调整为3 1 1会不符合
//第三种  2 4 3 访问到4  前面2(x) < 3(z)的  我们这时调整 x(4) 为3(z)  如果调整z(3)为4(y) 如果z后面是递增的会有影响 或者说会把此时情况处理的更糟 
//所以 结合上面三种  分为以下情况  如果nums[y] > nums[y+1]
//                               1> 如果x前面没有元素  nums[y] = nums[y+1]
//                               2> 前面有元素 
//                                     1> y-1前面元素(x) > y+1当前元素的后一元素(z) nums[z] = nums[y] 
//                                     2> y-1前面元素(x) < y+1当前元素的后一元素(z) nums[y] = nums[z]
//      每次如果nums[y] > nums[y+1] 则必须调整一次  count++  如果count>=2  return false
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function checkPossibility($nums) {
        //菜呀  还是看的题解看会之后写的

        $len = count($nums);
        if ($len <=2) return true;

        $count = 0;
        for($i=0; $i<$len-1; $i++) {
            if ($nums[$i] > $nums[$i+1]) {
                $count++;
                if ($count >= 2) break;

                if (isset($nums[$i-1])) {
                    if ($nums[$i-1] < $nums[$i+1]) {
                        $nums[$i] = $nums[$i+1];
                    } else {
                        $nums[$i+1] = $nums[$i];
                    }
                } else {
                    $nums[$i] = $nums[$i+1];
                }
            }
        }
        return $count <= 1;
    }
}