<?php

/*
Write a program to find the node at which the intersection of two singly linked lists begins.

For example, the following two linked lists:


begin to intersect at node c1.

 

Example 1:


Input: intersectVal = 8, listA = [4,1,8,4,5], listB = [5,6,1,8,4,5], skipA = 2, skipB = 3
Output: Reference of the node with value = 8
Input Explanation: The intersected node's value is 8 (note that this must not be 0 if the two lists intersect). From the head of A, it reads as [4,1,8,4,5]. From the head of B, it reads as [5,6,1,8,4,5]. There are 2 nodes before the intersected node in A; There are 3 nodes before the intersected node in B.
 

Example 2:


Input: intersectVal = 2, listA = [1,9,1,2,4], listB = [3,2,4], skipA = 3, skipB = 1
Output: Reference of the node with value = 2
Input Explanation: The intersected node's value is 2 (note that this must not be 0 if the two lists intersect). From the head of A, it reads as [1,9,1,2,4]. From the head of B, it reads as [3,2,4]. There are 3 nodes before the intersected node in A; There are 1 node before the intersected node in B.
 

Example 3:


Input: intersectVal = 0, listA = [2,6,4], listB = [1,5], skipA = 3, skipB = 2
Output: null
Input Explanation: From the head of A, it reads as [2,6,4]. From the head of B, it reads as [1,5]. Since the two lists do not intersect, intersectVal must be 0, while skipA and skipB can be arbitrary values.
Explanation: The two lists do not intersect, so return null.
 

Notes:

If the two linked lists have no intersection at all, return null.
The linked lists must retain their original structure after the function returns.
You may assume there are no cycles anywhere in the entire linked structure.
Each value on each linked list is in the range [1, 10^9].
Your code should preferably run in O(n) time and use only O(1) memory.

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/intersection-of-two-linked-lists
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
解法：存在A链  B链   可能：相交  不相交

	  a 表示A链长  b表示B链长  c表示他们的公共链（如果不相交c = 0）
		
	  让A B链同时走  当A或B到尾结点时从另一链的头部重新走  当A B链走完并在对方链也走到尾结点  并且各自最终尾结点不相等(表示未在公共链上) 则为不相交
	  则有 a + c + b + c(A的路程) = b + c + a + c（B的路程)

	  通俗解释： a b可能a>b  c是他们相等的路程

	  只需要关心a 和 b    A链走a  B链走b   取长补短(或取短补长) A链继续走b的路程 B链继续走a的路程  此时他们的总路程 相等 即a + b = b + a 此时他们若相交则相等返回当前结点  若无相交则到尾结点返回null  

	  时空复杂度O(m+n) O(1)
*/
class Solution {
    /**
     * @param ListNode $headA
     * @param ListNode $headB
     * @return ListNode
     */
    function getIntersectionNode($headA, $headB) {
        if (!$headA || !$headB) return null;

        $pA = $headA; $pB = $headB;
        $pAFlag = $pBFlag = 0;

        while(1) {

        	#相等的情况即为他们路程相等后在交点入口处相遇  返回当前结点即可
            if ($pA === $pB) {
                return $pA;
            }
            
            #若A到达尾结点  有可能A链走完  也有可能A链B链都走完
            if ($pA->next === null){
                if($pAFlag == 1) { #A链B链都走完  未相遇返回null
                    return null;
                }
                $pA = $headB;  #A链走完  继续走B链
                $pAFlag = 1;
            } else { #未到尾结点 继续向下走
                $pA = $pA->next;
            } 
            if ($pB->next === null) {  #B到达尾结点  有可能B链走完 也有可能B A链都走完
                if ($pBFlag == 1) { #B A链都走完
                    return null;
                }
                $pB = $headA;  #B链走完  继续走A链
                $pBFlag = 1;
            } else {
                $pB = $pB->next;#未到结点
            }
        }
    }
}