<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function isSymmetrical($pRoot)
{
    // write code here
    return isMirror($pRoot->left, $pRoot->right);
}

function isMirror($left, $right)
{
    if ($left  == null) return $right== null;
    if ($right == null) return false;
    
    if ($left->val != $right->val) return false;
    return isMirror($left->left,  $right->right)
        && isMirror($left->right, $right->left);
    
}