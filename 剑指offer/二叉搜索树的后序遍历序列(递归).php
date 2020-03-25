<?php

// 题目描述
// 输入一个整数数组，判断该数组是不是某二叉搜索树的后序遍历的结果。如果是则输出Yes,否则输出No。假设输入的数组的任意两个数字都互不相同。

//思想：首先将后序序列首先分为左子树和右子树  
//      再将左右子树进行分裂 判断其中各个左子树结点小于根节点  
//                                 各个右子树结点大于根节点
//      不符合直接返回false    符合最后返回true
function VerifySquenceOfBST($sequence)
{
    // write code here
    if (!$sequence) return false;
    
    $len = count($sequence);
    
    $root  = $sequence[$len-1];

    $leftArr = [];
    $rightArr = [];

    for ($left = 0; $left < $len-1; $left++) {
    	if ($sequence[$left] > $root) break;
    }
    $leftArr = array_slice($sequence, 0, $left);

    for ($right = $left; $right < $len-1; $right++) {
    	if ($sequence[$right] < $root) return false;
    }
    $leftArr = array_slice($sequence, $left, $len-1-$left);
    $boolLeft = true;
    $boolRight = true;

    if (count($leftArr)  > 0) $boolLeft  = VerifySquenceOfBST($leftArr);
    if (count($rightArr) > 0) $boolRight = VerifySquenceOfBST($rightArr);

    return ($boolLeft && $boolRight);

}