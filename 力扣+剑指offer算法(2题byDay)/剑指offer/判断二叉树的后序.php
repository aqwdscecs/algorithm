<?php

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