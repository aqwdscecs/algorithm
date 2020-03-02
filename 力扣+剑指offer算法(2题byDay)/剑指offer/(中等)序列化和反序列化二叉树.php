<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
function MySerialize($pRoot)
{
    // write code here
    if ($pRoot == null) return '#';
    return $pRoot->val . ',' 
         . MySerialize($pRoot->left) . ',' 
         . MySerialize($pRoot->right);
} 
function MyDeserialize($s)
{
    // write code here
    $arr = explode(',', $s);
    $i = -1;
    
    return doDeserialize($arr, $i);
}
 
function doDeserialize($arr, &$i){
    $i++;
    if ($i >= count($arr)){
        return null;
    }
    if ($arr[$i] == '#'){
        return null;
    }
    $node = new TreeNode($arr[$i]);
    $node->left = doDeserialize($arr, $i);
    $node->right = doDeserialize($arr, $i);
    return $node;
}