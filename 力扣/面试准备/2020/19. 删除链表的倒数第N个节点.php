<?php

/*
给定一个链表，删除链表的倒数第 n 个节点，并且返回链表的头结点。

示例：

给定一个链表: 1->2->3->4->5, 和 n = 2.

当删除了倒数第二个节点后，链表变为 1->2->3->5.
说明：

给定的 n 保证是有效的。

进阶：

你能尝试使用一趟扫描实现吗？

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/remove-nth-node-from-end-of-list
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/


/*快慢指针  需要注意当是单个链表走时 需要走到最后面NULL的地方*/

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */

class Solution 
{
    public function removeNthFromEnd($head, $n) 
    {
        $retHead = new ListNode(null);
        $retHead->next = $head;
        $fast = $slow = $retHead;
        while($n-- >= 0) {
            $fast = $fast->next;
        }

        #慢指针访问到倒数n个  快指针到尾端
        while ($fast) {
        	$fast = $fast->next;
        	$slow = $slow->next;
        }
        $slow->next = $slow->next->next;

        return $retHead->next;
    }
}

