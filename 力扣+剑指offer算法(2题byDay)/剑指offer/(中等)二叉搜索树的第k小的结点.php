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
function KthNode($pRoot, $k)
{
    // write code here
    if ($k <= 0 ) return null;
    return LDRKthNode($pRoot, $k);
}

function LDRKthNode($root, &$k)
{
    if ($root != null) {
        $node = LDRKthNode($root->left, $k);

        if ($node) return $node;

        $k--;
        if ($k == 0) return $root;

        $node = LDRKthNode($root->right, $k);
        if ($node) return $node;
    }
    return null;
}

//非递归
function KthNode($pRoot, $k)
{
    // write code here
    if ($pRoot == null || $k <= 0 ) return null;
    $stackArr = [];
    $node = $pRoot;
    
    $index = 0;
    while (!empty($stackArr) || $node!= null) {
        if ($node != null) {
            $stackArr[] = $node;
            $node = $node->left;
        } else {
            $node = array_pop($stackArr);
            $index++;
            if ($index == $k) return $node;
            
            $node = $node->right;
        }
    }
    return null;
    
}