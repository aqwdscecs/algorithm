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
    if ($pRoot == null) return array();

    //每层的所有结点存储临时数组
    $arrContainer = [$pRoot];
    //返回结果
    $result = [];
    
    $level = 0; //偶为左向右  奇为右向左

    //层次遍历
    while (!empty($arrContainer)) {
    
        $levelNode = [];
        //层次中每个结点处理
        while(!empty($arrContainer)) {
            $node = array_pop($arrContainer);
            $result[$level][] = $node->val;
        
            if (($level%2) == 0){
                if ($node->left) $levelNode[] = $node->left;
                if ($node->right)  $levelNode[] = $node->right;
            
            } else {
                if ($node->right) $levelNode[] = $node->right;
                if ($node->left)  $levelNode[] = $node->left;
            }
        }
        
        $arrContainer = $levelNode;
        $level++;
    }
    return $result;
    
}
