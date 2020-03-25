<?php


/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums) {
        return $this->BST($nums, 0, count($nums)-1);
    }

    function BST(&$nums, $left, $right) {
        if ($right < $left) return NULL;

        $mid = $left + intval(($right - $left)/2);
        
        $curNode = new TreeNode($nums[$mid]);
        $curNode->left  = $this->BST($nums, $left, $mid - 1);
        $curNode->right = $this->BST($nums, $mid+1, $right);
        return $curNode;
    }
}