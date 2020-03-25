<?php

//题目描述:
// 给定一个二叉树，找出其最大深度。

// 二叉树的深度为根节点到最远叶子节点的最长路径上的节点数。

// 说明: 叶子节点是指没有子节点的节点。

// 示例：
// 给定二叉树 [3,9,20,null,null,15,7]，

//     3
//    / \
//   9  20
//     /  \
//    15   7
// 返回它的最大深度 3 。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/maximum-depth-of-binary-tree
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

class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    //递归
    //时间复杂度O(n) 空间复杂度O(n) 
    //遍历每个结点 时间复杂度O(n)  每个层次深入n次  空间等于O(n)
    functison maxDepth($root) {
        return $root == null ? 0 : max($this->maxDepth($root->left), $this->maxDepth($root->right))+1;
    }
}


/************************************************
* 递归代码少，时间复杂度上和迭代循环相同，          *
* 空间复杂度上迭代循环 优于 递归                  *
*************************************************/


//迭代
//时间复杂度O(n) 空间复杂度O(n) 空间小于n  最大存储为某层最多的结点
// 执行用时 :12 ms, 在所有 PHP 提交中击败了74.40%的用户
// 内存消耗 :16.4 MB, 在所有 PHP 提交中击败了95.00%的用户
function maxDepth($root) {
       // write code here
    // 空树
    if (!$root) return 0;

    $recordMaxDepth = 0; //记录当前层/深度
    
    $nodeContainer = [$root];  //存放上层结点的容器数组

    while (!empty($nodeContainer)) {   //上层结点没有子结点(全为叶子结点)
        $recordMaxDepth++;    //深度+1
        $curLevelNodeCount = count($nodeContainer); //记录上层结点个数
        //结点遍历 找其子节点 放入容器
        for ($index=0; $index < $curLevelNodeCount; $index++) { 
            $curNode = array_shift($nodeContainer);
            if ($curNode->left) {
                array_push($nodeContainer, $curNode->left);
            }
            if ($curNode->right) {
                array_push($nodeContainer, $curNode->right);
            }
        }
    }
    return $recordMaxDepth;
}