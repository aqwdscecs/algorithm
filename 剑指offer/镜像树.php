<?php
// 题目描述
// 操作给定的二叉树，将其变换为源二叉树的镜像。
// 输入描述:
// 二叉树的镜像定义：源二叉树
//      8
//    /  \
//   6   10
//  / \  / \
// 5  7 9 11
// 镜像二叉树
//     8
//    /  \
//  10    6
//  / \   / \
// 11  9 7   5

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function Mirror(&$root)
{
    // write code here
    if (!$root) return null;
    if ($root->left)     $rootLeft = Mirror($root->left);
    
    if ($root->right)    $rootRight = Mirror($root->right);
    $root->left  = $rootRight;
    $root->right = $rootLeft;
    
    return $root;
}