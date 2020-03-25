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
    

    //题解版本 O(n)
    function addTwoNumbers($l1, $l2) {
        $root = new ListNode(0);
        $curNode = $root;
        $carry = 0;

        while ($l1 || $l2 || $carry) {
            $l1Val = ($l1 != null)  ? $l1->val : 0;
            $l2Val = ($l2 != null)  ? $l2->val : 0;

            $sum = $l1Val + $l2Val + $carry;
            $carry = intval($sum / 10);
            
            $newNode = new ListNode($sum % 10);
            $curNode->next = $newNode;
            $curNode = $newNode;

            if ($l1) $l1 = $l1->next;
            if ($l2) $l2 = $l2->next;
        }
        return $root->next;

    }


    //第一版  自码版本  未实现
    function addTwoNumbers($l1, $l2) {
        if (!$l1->val) return $l2;
        if (!$l2->val) return $l1;

        $retHead = $l1;
        $higher = 0;

        while ($l1 && $l2) {
            $val1 = $l1->val;
            $val2 = $l2->val;
            //将两位相加
            //首先判断是否有进位
            // echo "l1--->{$val1}  ";
            // echo "l2--->{$val2}  ";
            if ($higher) {
                $val2 += 1;        
                $higher = 0;
            }         
            $val1 += $val2;
            //如果大于10 进位 
            if ($val1 >= 10) {
                $val1 = $val1 % 10;
                $higher = 1;
            }
            $l1->val = $val1;
            $preL1 = $l1;
            $l1 = $l1->next;
            $l2 = $l2->next;            
        }
        
        //判断是否还有进位
        //l2比l1长
        if (!$l1 && $l2) {
            
            $preL1->next = $l2;
            $preL1 = $preL1->next;
            while ($preL1) {
                if ($higher) {
                    $val = $preL1->val + 1;
                    $higher = 0;
                }
                else break;
                if ($val >= 10) {
                    $val  = $val % 10;
                    $higher = 1;
                } 
                $preL1->val = $val;
                $preNode = $preL1;
                $preL1 = $preL1->next;
            }

            if ($higher) {
                $newNode = new ListNode(1); 
                $preNode->next = $newNode;
            }
        }else if (!$l1 && !$l2) {   //一样长 
            if ($higher){
                $preL1->next->val = 1;
                $preL1->next->next = null;
            } 
        }else if ($l1 && !$l2) { // l1比l2长
            $preL1 = $l1;
            while ($preL1) {
                if ($higher) {
                    $val  = $preL1->val + 1;
                    $higher = 0;
                } 
                else break;
                if ($val >= 10) {
                    $val  = $val % 10;
                    $higher = 1;
                } 
                $preL1->val = $val;
                $preNode = $preL1;
                $preL1 = $preL1->next;
                
            } 
            if ($higher) {
                    $newNode = new ListNode(1);
                    $preNode->next = $newNode;
            }
        } 
        return $retHead;
    }
}