<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/

//递归
//时间复杂度O(n) 空间复杂度O(n)
function TreeDepth($pRoot)
{
    // write code here
    if (!$pRoot) return 0;
    $leftDepth  = 1+TreeDepth($pRoot->left);
    $rightDepth = 1+TreeDepth($pRoot->right);
    return max($leftDepth, $rightDepth);
}

//递归简化
function TreeDepth()
{
    return $pRoot == null ? 0 
        : max(TreeDepth($pRoot->left),
              TreeDepth($pRoot->right)
            )+1;
}

//迭代
//时间复杂度O(n) 空间复杂度O(n)
function TreeDepth($pRoot)
{
    // write code here
    // 空树
    if (!$pRoot) return 0;

    $recordMaxDepth = 0; //记录当前层/深度
    
    $nodeContainer = [$pRoot];  //存放上层结点的容器数组

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