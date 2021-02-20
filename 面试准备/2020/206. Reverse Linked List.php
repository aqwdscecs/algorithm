<?php

/*
Reverse a singly linked list.

Example:

Input: 1->2->3->4->5->NULL
Output: 5->4->3->2->1->NULL
Follow up:

A linked list can be reversed either iteratively or recursively. Could you implement both?

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/reverse-linked-list
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
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
	不用额外空间迭代翻转 时空复杂度O(n)  O(1)
	
	不交换节点  只需要把指针方向调换即可
*/
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        $cur = $head; 
        $pre = null;

        while($cur!= null) {
            $tmpNode = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $tmpNode;
        }

        return $pre;
    }
}


/*
	递归翻转
	时空复杂度
*/
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        if ($head->next === null) {
            return $head;
        }

        $p = $this->reverseList($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $p;
    }
}






