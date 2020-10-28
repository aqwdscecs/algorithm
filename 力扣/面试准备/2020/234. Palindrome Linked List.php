<?php

/*
Given a singly linked list, determine if it is a palindrome.

Example 1:

Input: 1->2
Output: false
Example 2:

Input: 1->2->2->1
Output: true
Follow up:
Could you do it in O(n) time and O(1) space?

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/palindrome-linked-list
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
    解法一： 遍历一遍链表存入数组中  再用双指针逼近判断是否为回文数
            时空复杂度O(2n) O(n)
*/
class Solution {

    /**
     * @param ListNode $head
     * @return Boolean
     */
    function isPalindrome($head) {
        $container = [];

        #链表转数组
        $node = $head;
        while($node->val !== null) {
            $container[] = $node->val;
            $node = $node->next;
        }

        #双指针判断回文数
        $len = count($container);
        $left = 0; $right = $len - 1;
        while($left < $right) {
            if ($container[$left] != $container[$right]) {
                return false;
            }

            $left++; $right--;
        }

        return true;
    }
}

/*
    解法二： 不用转换  Step1: 先找到链表中点 
                      Step2: 翻转中点后节点  
                      Step3:头指针和中点指针开始对比值 判断是否一致
                      Step4: 翻转部分恢复 返回结果

        时空复杂度O(n/2)找中点+O(n/2)翻转+O(n/2)判断回文+O(n/2)恢复翻转部分 = O(2n)  O(1)
*/
class Solution {

    /**
     * @param ListNode $head
     * @return Boolean
     */
    function isPalindrome($head) {
        #找到折点
        $midNode = $this->getMidNode($head);
        #翻转后半部分节点
        $revNode = $this->reverseLink($midNode->next);
        #两端指针判断
        $behindNode = $head; $frontNode = $revNode;
        $result = $this->checkMirrorList($behindNode, $frontNode);
        #恢复数据
        $revNode = $this->reverseLink($revNode);
        $midNode->next = $revNode;

        return $result;
        
    }

    function getMidNode($node) {
        $slow = $fast = $node;
        
        while($fast->next !== null && $fast->next->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }

    function reverseLink($node) {
        $cur = $node;
        $pre = null;
        while($cur!== null) {
            $tmp = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $tmp;
        }
        return $pre;
    }

    function checkMirrorList($leftNode, $rightNode) {
        while($rightNode!==null) {
            if ($leftNode->val != $rightNode->val) return false;

            $leftNode = $leftNode->next; 
            $rightNode = $rightNode->next;
        }
        return true;
    }
}


