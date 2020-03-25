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
     * @param TreeNode $root
     * @return TreeNode
     */
    public $sum;
    function convertBST($root) { 
       if (!$root) return null;

       $this->convertBST($root->right);

       $this->sum += $root->val;
       
       $root->val = $this->sum;
       $this->convertBST($root->left);
       
       return  $root;
    }

}