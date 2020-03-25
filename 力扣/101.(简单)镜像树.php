<?php

//题目描述：
// 给定一个二叉树，检查它是否是镜像对称的。

// 例如，二叉树 [1,2,2,3,4,4,3] 是对称的。

//     1
//    / \
//   2   2
//  / \ / \
// 3  4 4  3
// 但是下面这个 [1,2,2,null,3,null,3] 则不是镜像对称的:

//     1
//    / \
//   2   2
//    \   \
//    3    3
// 说明:

// 如果你可以运用递归和迭代两种方法解决这个问题，会很加分。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/symmetric-tree
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。


/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

//递归实现O(n)  空间复杂度O(n)
class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        return $this->isMirror($root->left, $root->right);
    }
    function isMirror($node1, $node2)
    {
        if ($node1 == null && $node2 == null) return true;
        if ($node1 == null || $node2 == null) return false;

        return ($node1->val == $node2->val) 
                && $this->isMirror($node1->left, $node2->right) 
                && $this->isMirror($node1->right, $node2->left);
    }
}

//迭代实现 时间复杂度O(n) 空间复杂度O(n)
class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
    	$arr = [];
    	array_push($arr, $root);
    	array_push($arr, $root);

    	while(!empty($arr)) {
    		$node1 = array_shift($arr);
    		$node2 = array_shift($arr);
    		if ($node1 == null && $node2 == null) continue;
    		if ($node1 == null || $node2 == null) return false;
    		if ($node1->val != $node2->val)  return false;

    		array_push($arr, $node1->left);
    		array_push($arr, $node2->right);

    		array_push($arr, $node1->right);
    		array_push($arr, $node2->left);
    	}
    	return true;
    }
}