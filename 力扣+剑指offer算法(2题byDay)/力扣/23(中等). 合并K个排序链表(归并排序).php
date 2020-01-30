<?php

// 合并 k 个排序链表，返回合并后的排序链表。请分析和描述算法的复杂度。

// 示例:

// 输入:
// [
//   1->4->5,
//   1->3->4,
//   2->6
// ]
// 输出: 1->1->2->3->4->4->5->6

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/merge-k-sorted-lists
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


//思想：和合并两个有序链表思想相同，将多个链表先两两合并，依次合并 剩一个完成合并

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

// 显示详情
// 执行用时 :32 ms, 在所有 PHP 提交中击败了83.93%的用户
// 内存消耗 :23.5 MB, 在所有 PHP 提交中击败了21.95%的用户
    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeTwoLists($list1, $list2) {
    	if ($list1 == null) return $list2;
    	if ($list2 == null) return $list1;

    	if ($list1->val < $list2->val) {
    		$list1->next = $this->mergeTwoLists($list1->next, $list2);
    		return $list1;
    	} else  {
    		$list2->next = $this->mergeTwoLists($list1, $list2->next);
    		return $list2;
    	}
    }

    function mergeKLists($lists) {
		$count = count($lists); 
		if (!$count) return null;
		if ($count == 1) return $lists[0];

		$temp = [];
		for($index = 0; $index < intval($count / 2); $index++) {
			$temp[] = $this->mergeTwoLists($lists[2*$index], $lists[(2*$index) + 1]);
		}
		if ($count % 2 == 1) $temp[] = $lists[$count-1];

		return $this->mergeKLists($temp);
    }
}