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
     * @param TreeNode $t1
     * @param TreeNode $t2
     * @return TreeNode
     */
    function mergeTrees($t1, $t2) {
        //思路：放置两个数组，按广度优先的策略存储两个树的结点
        //      然后根据n  2n  2n+1 重建二叉树
        // if ($t1 == null) return $t2;
        // if ($t2 == null) return $t1;

        // $arr1 = $arr2 = [];
        // $index = 1;
        // $arr1[1] = $t1->val;
        // $arr2[1] = $t2->val;
        // while ($t1 || $t2) {
        //     if ($t2->left) $arr2[2*$i] = $t2->left->val;
        //     fi ($t2->right) $arr2[2*$i+1] = $t2->right->val;
        //     if ($t1->left) $arr1[2*$i] = $t1->left->val;
        //     if ($t2->right) $arr1[2*$i+1] = $t1->right->val;
            
        //     if ($)
        // } 
       
        //写到上面 感觉树的问题用递归解决还是好点
        //通过重建一个树  递归访问两个当前根节点
        //
        //递归
        if ($t1 == null) return $t2;
        if ($t2 == null) return $t1;

        $t1->val = $t1->val + $t2->val;

        $t1->left  = $this->mergeTrees($t1->left,  $t2->left);
        $t1->right = $this->mergeTrees($t1->right, $t2->right);

        return $t1;
    }
}