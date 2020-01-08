<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function PrintFromTopToBottom($root)
{
    // write code here
    if (!$root) return $root;
    $retArr = [];
    $pointNode = array($root);
    $tempContain = [];

    while (empty($pointNode)) {
        foreach ($pointNode as $value) {
            if ($value->left) $tempContain[] = $value->left;
            if ($value->right) $tempContain[] = $value->right;
        }
        while (empty($pointNode)) {
         $retArr[] = array_shift($pointNode)->val;
        }
        $pointNode = $tempContain;
    }
    return $retArr;
}

//递归

function PrintFromTopToBottom($root)
{
    if (!$root) return $root;

    $retArr = [];
    foreachNode($root, $retArr);

    return $retArr;
}

function foreachNode($root, &$retArr) 
{
    if (!$root) return $root;

    if ($root->left) {
        $left = $root->left;
        $retArr[] = $left->val;
    }
    if ($root->right) {
        $right = $root->right;
        $retArr[] = $right->val;
    }

    foreachNode($left, $retArr);
    foreachNode($right, $retArr);

}