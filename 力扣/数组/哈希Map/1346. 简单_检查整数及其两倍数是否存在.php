<?php

// 给你一个整数数组 arr，请你检查是否存在两个整数 N 和 M，满足 N 是 M 的两倍（即，N = 2 * M）。

// 更正式地，检查是否存在两个下标 i 和 j 满足：

// i != j
// 0 <= i, j < arr.length
// arr[i] == 2 * arr[j]
//  

// 示例 1：

// 输入：arr = [10,2,5,3]
// 输出：true
// 解释：N = 10 是 M = 5 的两倍，即 10 = 2 * 5 。
// 示例 2：

// 输入：arr = [7,1,14,11]
// 输出：true
// 解释：N = 14 是 M = 7 的两倍，即 14 = 2 * 7 。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/check-if-n-and-its-double-exist
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


/*
	初始思路：遍历一次  设置hashMap  即hashMap[index] = 1 || hashMap[index]++
	      再遍历一次hashMap   判断hashMap[2*index]是否存在  存在跳出返回true
		   ***** 注意 0  0 特判  1个0时不满足条件   2个0即满足  可跳出 *****
		   时间复杂度O(2n)  空间复杂度O(n)
*/

/*
执行用时：20 ms, 在所有 PHP 提交中击败了46.15%的用户
内存消耗：14.8 MB, 在所有 PHP 提交中击败了100.00%的用户
*/
class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function checkIfExist($arr) {
        //O(mn) O(m)

        //设置哈希map
        $cnt = count($arr);

        $hashMap = array();
        for ($index=0; $index<$cnt; $index++) {
            if (isset($hashMap[$arr[$index]])) $hashMap[$arr[$index]]++;
            else $hashMap[$arr[$index]] = 1;
        }
        //遍历哈希
        foreach ($hashMap as $index => $val) {
            if ($index!=0 && isset($hashMap[$index*2])) {
                return true;
            }
            if ($index == 0 && $hashMap[$index] >= 2) return true;
        }
        return false;
    }
}


/*
	优化： 查看题解后 对上面思路可以优化至 O(n) O(n)
	      情况1：在一次遍历arr数组时  查看对应hashMap[arr[index]*2]是否存在  存在直接返回true(之前是先设hashMap[arr[index]]) = 1） 将第二次hashMap判断 加到了 第一次遍历中
		  情况2：*2 不存在  但是为偶数 其hashMap[arr[index]/2]存在 也返回true
		  其他情况：不符合 继续遍历  执行结束返回false
*/

/*
执行用时：16 ms, 在所有 PHP 提交中击败了69.23%的用户
内存消耗：15.1 MB, 在所有 PHP 提交中击败了100.00%的用户
*/
class Solution {

    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function checkIfExist($arr) {
        //O(mn) O(m)

        //设置哈希map
        $cnt = count($arr);

        $hashMap = array();
        for ($index=0; $index<$cnt; $index++) {
            if (isset($hashMap[$arr[$index]*2])) return true;
            if ($arr[$index]%2== 0 && isset($hashMap[$arr[$index]/2])) return true;
            else $hashMap[$arr[$index]] = 1;
        }
       
        return false;
    }
}