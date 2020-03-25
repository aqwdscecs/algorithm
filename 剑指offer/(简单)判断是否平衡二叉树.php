<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function IsBalanced_Solution($pRoot)
{
    // write code here
    return depth($pRoot) != -1;
}
function depth($node)
{
    if (!$node) return 0;
    
    $left = depth($node->left);
    if ($left == -1) return -1;
    $right = depth($node->right);
    if ($right == -1) return -1;
    
    if (abs($right-$left) > 1) 
        return -1;
    return 1+max($left, $right);
}