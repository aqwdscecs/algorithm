<?php

/*
给你一棵所有节点为非负值的二叉搜索树，请你计算树中任意两节点的差的绝对值的最小值。

 

示例：

输入：

   1
    \
     3
    /
   2

输出：
1

解释：
最小绝对差为 1，其中 2 和 1 的差的绝对值为 1（或者 2 和 3）。
 

提示：

树中至少有 2 个节点。
本题与 783 https://leetcode-cn.com/problems/minimum-distance-between-bst-nodes/ 相同

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/minimum-absolute-difference-in-bst
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

/*中序遍历 为有序数组 求min差值就好*/

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
    function getMinimumDifference($root) {
        $ans = PHP_INT_MAX; 
        $pre = -1;
        
        $this->dfs($root, $pre, $ans);

        return $ans;
    }

    function dfs($root, &$pre, &$ans) {
        if ($root == null) {
            return ;
        }

        #左
        $this->dfs($root->left, $pre, $ans);

        #中
        if ($pre != -1) {
            $ans = min($ans, abs($root->val - $pre));
        }
        $pre = $root->val;

        #右
        $this->dfs($root->right, $pre, $ans);
    }
}