<?php 

/*
实现获取下一个排列的函数，算法需要将给定数字序列重新排列成字典序中下一个更大的排列。

如果不存在下一个更大的排列，则将数字重新排列成最小的排列（即升序排列）。

必须原地修改，只允许使用额外常数空间。

以下是一些例子，输入位于左侧列，其相应输出位于右侧列。
1,2,3 → 1,3,2
3,2,1 → 1,2,3
1,1,5 → 1,5,1

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/next-permutation
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/


class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums) {
    	$count = count($nums);
    	if ($count <= 1) return $nums;

    	$exchangeIndex = $searchIndex = $count - 1;
    	while($searchIndex >= 1) {

    		#找到坠落点 记录当前坠落数
    		if ($nums[$searchIndex] > $nums[$searchIndex-1]) {
    			$exchangeIndex = $searchIndex-1;
    			break;
    		} 
    		$searchIndex--;
    	}

    	$secondSearch = $count-1;
    	#从右向坠落点找第一个大于坠落数的下标
    	while($secondSearch <= $searchIndex) {
    		if ($nums[$secondSearch] > $nums[$exchangeIndex]) {
    			$tmp = $nums[$secondSearch];
    			$nums[$secondSearch] = $nums[$exchangeIndex];
    			$nums[$exchangeIndex] = $tmp;
    		}
    	}

    	#交换后的区间逆置为升序
 		for($i=$secondSearch+1;$j=$count-1; $i < $j; $i++; $j--) {
 			$tmp = $nums[$i];
 			$nums[$i] = $nums[$j];
 			$nums[$j] = $tmp;
 		}

    	return $nums;
    }
}