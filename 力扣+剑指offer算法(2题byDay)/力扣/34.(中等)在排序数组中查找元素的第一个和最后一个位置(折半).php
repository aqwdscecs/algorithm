<?php


//题目描述：
//给定一个按照升序排列的整数数组 nums，和一个目标值 target。找出给定目标值在数组中的开始位置和结束位置。
// 你的算法时间复杂度必须是 O(log n) 级别。
// 如果数组中不存在目标值，返回 [-1, -1]。

// 示例 1:
// 输入: nums = [5,7,7,8,8,10], target = 8
// 输出: [3,4]

// 示例 2:
// 输入: nums = [5,7,7,8,8,10], target = 6
// 输出: [-1,-1]

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/find-first-and-last-position-of-element-in-sorted-array
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */ 

    // 执行用时 :24 ms, 在所有 PHP 提交中击败了90.59%的用户
	// 内存消耗 :19 MB, 在所有 PHP 提交中击败了78.57%的用户
    //时间复杂度：O(logn+ m) m为查找数的重复个数  最坏为O(n)
    //思想：直接折半查找到一个mid值 然后两个循环向两端查找 直到和target不相同记录两端下标
    function searchRange($nums, $target) {
        $count = count($nums);

        if ($count <= 0) return [-1,-1];
        
        $low = 0;
        $high = $count-1;

        $retArr = [];
        $retArr = array_pad($retArr, 2, -1);

        while ($low <= $high) {
            $mid = $low + intval(($high - $low ) / 2);
            
            if ($target < $nums[$mid]) {
                $high = $mid - 1;
            }else if ($target > $nums[$mid]) {
                $low = $mid + 1;
            } else { // target == nums[mid]
               
                for($i=$mid; $i >= 0; $i--) {
                    if ($target != $nums[$i]) {
                        $retArr[0] = $i+1;
                        break;
                    }
                }        
                if ($retArr[0] == -1) $retArr[0] = 0; 
                
                for($i= $mid; $i < $count; $i++) {
                    if ($target != $nums[$i]) {
                        $retArr[1] = $i-1;
                        break;
                    }
                }
                if ($retArr[1] == -1) $retArr[1] = $count-1;
                
                return $retArr; 
            }
        }
        // print_r($retArr);
        return $retArr;
    }
}

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $count = count($nums);

        if ($count <= 0) return [-1,-1];
        
        $low = 0;
        $high = $count-1;

        $retArr = [];
        $retArr = array_pad($retArr, 2, -1);

        //找左边界
        //初始代码
        // while ($low < $high) {
        //     $mid = $low + intval(($high - $low ) / 2);
        //     if ($nums[$mid] < $target) {
        //         $low = $mid + 1;
        //     } else if ($nums[$mid] > $target) {
        //         $high = $mid - 1;
        //     } else if ($nums[$mid] == $target) {
        //         $high = $mid;
        //     }
        // }
        //提取重复代码
        while ($low < $high) {
            $mid = $low + intval(($high-$low)/2);
            if ($nums[$mid] < $target) {
                $low = $mid + 1;
            } else if ($nums[$mid >= $target]){
                $high = $mid;
            }
        }

        //左边界找到的位置
        if ($nums[$low] != $target) return $retArr;
        $retArr[0] = $low;

        //重新赋值low 和 high 找右边界
        $low = 0;  $high = $count - 1;
        while ($l < $high) {
            $mid = $low + intval(($high - $low ) / 2);
            if ($nums[$mid] < $target) {
                $low = $mid + 1;
            } else if ($nums[$mid] > $target) {
                $high = $mid -1;
            } else if ($nums[$mid] == $target) {
                $low = $mid;
            }
        }
        $retArr[1] = $low;
        print_r($retArr);
        // return $retArr;
    }

    //执行用时 :24 ms, 在所有 PHP 提交中击败了90.59%的用户
	//内存消耗 :19.1 MB, 在所有 PHP 提交中击败了75.71%的用户
    //思想：两次折半  一次找到左边界  第二次找到又边界
    //时间复杂度：O(2logn)稳定  
    function searchRange($nums, $target) {
        $count = count($nums);

        if ($count <= 0) return [-1,-1];
        
        $low = 0;
        $high = $count-1;

        $retArr = [];
        $retArr = array_pad($retArr, 2, -1);
        
        //找左边界
        //初始代码
        // while ($low < $high) {
        //     $mid = $low + intval(($high - $low ) / 2);
        //     if ($nums[$mid] < $target) {
        //         $low = $mid + 1;
        //     } else if ($nums[$mid] > $target) {
        //         $high = $mid - 1;
        //     } else if ($nums[$mid] == $target) {
        //         $high = $mid;
        //     }
        // }
        //提取重复代码
        while ($low < $high) {
            $mid = $low + intval(($high-$low)/2);
            if ($nums[$mid] < $target) {
                $low = $mid + 1;
            } else if ($nums[$mid] >= $target){
                $high = $mid;
            }
        }

        //左边界找到的位置
        if ($nums[$low] != $target) return $retArr;
        $retArr[0] = $low;

        //重新赋值low 和 high 找右边界
        $low = 0;  $high = $count;
        //左边界和右边界的nums[mid] = target 情况 low或者high的折半情况不太一样
        while ($low < $high) {
            $mid = $low + intval(($high-$low)/2);
            if ($nums[$mid] < $target) {
                $low = $mid + 1;
            } else if ($nums[$mid] > $target) {
                $high = $mid;
            } else if ($nums[$mid] == $target) {
                $low = $mid + 1;
            }

        }
        $retArr[1] = $low -1;
        return $retArr;
    }
}