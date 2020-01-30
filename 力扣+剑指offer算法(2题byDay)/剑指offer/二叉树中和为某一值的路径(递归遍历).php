<?php


//题目描述
// 输入一颗二叉树的跟节点和一个整数，打印出二叉树中结点值的和为输入整数的所有路径。路径定义为从树的根结点开始往下一直到叶结点所经过的结点形成一条路径。(注意: 在返回值的list中，数组长度大的数组靠前)

//思想： 依次遍历各个结点 并且计算当前值和 target值的差  
//                           如果大于target  继续向下找
//                           如果等于target 并且为叶子节点 存入其路径(这里需要保存当前路径 和 路径list)
//                           如果小于target  直接返回false

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function FindPath($root, $expectNumber)
{
    // write code here
    $onePathList = $allPathList = [];
    if ($root == null) return $allPathList;
    
    treePath($root, $expectNumber, $onePathList, $allPathList);
    
    return $allPathList;
}
function treePath($curNode, $target, $onePathList, &$allPathList)
{
    if ($curNode != null) {
        $target -= $curNode->val;
        $onePathList[] = $curNode->val;
        if ($target > 0) {
            treePath($curNode->left, $target, $onePathList, $allPathList);
            treePath($curNode->right, $target, $onePathList, $allPathList);
        } elseif ($target == 0 && $curNode->left == NULL && $curNode->right == null) {
            $allPathList[] = $onePathList;
        }
    }
}
