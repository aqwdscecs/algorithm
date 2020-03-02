<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function MyPrint($pRoot)
{
    // write code here
    if (!$pRoot) return array(); 
    
    $result = [];
    $level = 0;
    //每一层结点存储临时数组
    $arrLevel = [];
    $levelContainer = [$pRoot];
    while (!empty($levelContainer)) {
        
        $node = array_shift($levelContainer);
        $reuslt[$level][] = $node->val;
        
        if ($node->left) $arrLevel[] = $node->left;
        if ($node->right) $arrLevel[] = $node->right;
        
        //当前层的结点已经访问完  需要访问下层结点
        if (empty($levelContainer) && !empty($arrLevel)) {
            $level++;
            $levelContainer = $arrLevel;
            //下层结点临时数组内容重置
            $arrLevel = [];
        }
    }
    return $reuslt;
    
}