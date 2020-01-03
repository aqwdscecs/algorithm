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
     * @return Integer
     */
	//依次递归二叉树左右子树 递归计算出各个子结构中最大长度的边
	//如果有大于maxLength的直接重新赋值给maxLength记录
	
	//这个成员属性maxLength用来保存全局递归中最大的边
	//需要注意最大长度整体的结点都在一边的情况   
    public $maxLength = 0;
    function diameterOfBinaryTree($root) {
        if (!$root) return 0;
        $this->countPartionNode($root);
        // echo "$rightCount";
        return $this->maxLength;
    }

    function countPartionNode($node) 
    {
        if (!$node) return 0;
        // echo "$node->val";
        $leftCount = $this->countPartionNode($node->left);
        $rightCount = $this->countPartionNode($node->right);
        $count = $leftCount + $rightCount;
        
        if ($count > $this->maxLength) {
            $this->maxLength = $count;
        }
        
        return 1+max($leftCount, $rightCount);
        
    }
}