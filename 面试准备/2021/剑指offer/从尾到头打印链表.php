<?php

/*
剑指 Offer 06. 从尾到头打印链表
输入一个链表的头节点，从尾到头反过来返回每个节点的值（用数组返回）。

示例 1：
输入：head = [1,3,2]
输出：[2,3,1]
 

限制：
0 <= 链表长度 <= 10000
*/
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */


/*
	非递归  栈|数组
	时空复杂度O(n) O(n)
*/
class Solution {

    /**
     * @param ListNode $head
     * @return Integer[]
     */
    function reversePrint($head) {
        $stack = new SplStack();
        $cur = $head;
        while($cur) {
            $stack->push($cur->val);
            $cur = $cur->next;
        }

        $ret = [];
        while(!$stack->isEmpty()) {
            $ret[] = $stack->pop();
        }

        return $ret;
    }
}

/*
	递归  模拟栈
	时空复杂度O(n) O(n)
*/	
class Solution {

    /**
     * @param ListNode $head
     * @return Integer[]
     */
    function reversePrint($head) {
        $ret = [];

        $this->getNextVal($head, $ret);

        return $ret;
    }

    function getNextVal($head, &$ret) {
        if (!$head) return ;

        $this->getNextVal($head->next, $ret);

        $ret[] = $head->val;
    }

}