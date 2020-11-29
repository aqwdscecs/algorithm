<?php


/*
Invert a binary tree.

Example:

Input:

     4
   /   \
  2     7
 / \   / \
1   3 6   9
Output:

     4
   /   \
  7     2
 / \   / \
9   6 3   1
Trivia:
This problem was inspired by this original tweet by Max Howell:

Google: 90% of our engineers use the software you wrote (Homebrew), but you can’t invert a binary tree on a whiteboard so f*** off.

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/invert-binary-tree
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/


/*
解法 ： 递归翻转   先向下递归左节点  当左节点为空  走父节点的右节点  右-> 左->左  当右节点走到叶子时  父节点与子节点交换
*/

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
    function invertTree($root) {

    	return $this->exchangeNode($root);
    }

    function exchangeNode(&$node)
    {
    	#叶节点直接返回
    	if ($node->left === null && $node->right === null) return $node;

    	#若不是叶节点  先走左节点
    	$leftNode = $this->exchangeNode($node->left);
		
		#左节点交换完  左右节点
    	$rightNode = $this->exchangeNode($node->right);

    	#左右孩子的孩子节点交换完成  交换左右节点  
        $node->left = $rightNode;
        $node->right = $leftNode;
        
    	return $node;
    }
}