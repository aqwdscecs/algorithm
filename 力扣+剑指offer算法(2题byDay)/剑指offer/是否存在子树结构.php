<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function HasSubtree($pRoot1, $pRoot2)
{
    // write code here
    if (!$pRoot1 || !$pRoot2) return false;
    
    if ($pRoot1->val == $pRoot2->val) {
        $result = doseTree1HaveTree2($pRoot1, $pRoot2);
    }
    if (!$result) {
        $result = HasSubtree($pRoot1->left, $pRoot2);
    }
    if (!$result) {
        $result = HasSubtree($pRoot1->right, $pRoot2);
    }
    return $result;
}

function doseTree1HaveTree2($node1, $node2)
{
    if ($node2 == null) return true;
    if ($node1 == null) return false;
    
    if ($node1->val != $node2->val) return false;
    return doseTree1HaveTree2($node1->left, $node2->left) && 
           doseTree1HaveTree2($node1->right, $node2->right);
}