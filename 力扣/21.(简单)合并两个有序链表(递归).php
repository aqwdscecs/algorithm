<?php
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    //执行结果：通过
	//显示详情
	//执行用时 :8 ms, 在所有 PHP 提交中击败了79.54%的用户
	//内存消耗 :15 MB, 在所有 PHP 提交中击败了5.94%的用户
	
    function mergeTwoLists($l1, $l2) {
       if ($l1 == null) {
           return $l2;
       } else if ($l2 == null) {
           return $l1;
       }else if ($l1->val < $l2->val) {
           $l1->next = $this->mergeTwoLists($l1->next, $l2);
           return $l1;
       }else {
           $l2->next = $this->mergeTwoLists($l1, $l2->next);
           return $l2;
       }
    }
}