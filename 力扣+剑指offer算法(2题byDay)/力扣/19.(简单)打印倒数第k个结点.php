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
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        if (!$head) return $head;

        if ($n < 0) return $head;

        $retHead = $behind = $pre = $head;

        $span = 1;
        //先让前面指针走n-1步
        while ($span < $n) {
            if (!$pre->next) break;

            $pre = $pre->next;
            $span++;
        }
        //链表总长度小于n
        if  ($span < $n) return $head;

        $preBehindNode = $head;
        //前后三个指针同时走
        while ($pre->next) {
            $pre = $pre->next;
            $preBehindNode = $behind;
            $behind = $behind->next;
        }
        print($behind->val);
        //pre走到尾节点 删除behind结点
        $preBehind->next = $behind->next;

        // unset($behind);

        return $head;
    }
}