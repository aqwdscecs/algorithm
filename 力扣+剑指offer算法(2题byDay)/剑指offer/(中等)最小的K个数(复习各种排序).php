<?php

//题目描述：
// 输入n个整数，找出其中最小的K个数。例如输入4,5,1,6,2,7,3,8这8个数字，则最小的4个数字是1,2,3,4,。

    //冒泡O(kn)
    //快排(nlogn)
    //堆排(max(klogn, n))


function GetLeastNumbers_Solution($input, $k)
{
    // write code here
    $count = count($input);
    if ($count < $k || $k <= 0) return [];
    
    //冒泡
    // return bubbleSortGetMinK($input, $k);
    //快排
    $sortArr = quickSortGetMinK($input);
    for ($i=0; $i<$k; $i++) {
        $retArr = $sortArr[$i];
    }
    return $retArr;
}

//冒泡O(kn)
//运行时间：9ms
// 占用内存：2788k
function bubbleSortGetMinK($input, $k)
{
    
    $retArr = [];
    for ($i=0; $i<$k; $i++) {
        $min = $input[$i];
        for ($j=$i+1; $j<$count; $j++) {
            if ($input[$j] < $min) {
                $min = $input[$j];
                
                $tmp = $input[$j];
                $input[$j] = $input[$i];
                $input[$i] = $tmp;
            }
        }
        $retArr[] = $min;
    }
    return $retArr;
}

//快排(nlogn)
//运行时间：7ms
//占用内存：2768k
function quickSortGetMinK($input)
{
    $count = count($input);

    $flagValue = $input[0];

    $lowerArr = [];
    $upperArr = []; 
    $index = 1;
    while($index < $count) {
        if ($input[$index] <= $flagValue) $lowerArr[] = $input[$index];
        else $upperArr[] = $input[$index];
    }
    $lowerArr = quickSortGetMinK($lowerArr);
    $upperArr = quickSortGetMinK($upperArr);

    $sortArr = array_merge($lowerArr, array($flagValue), $upperArr);

    
    return $retArr;
}

//堆排
function heapSort($input,$k)
{
    // if ($k == 1)
    $count = count($input);
    $endNode = $count-1;
    $parent = intval(($endNode - 1) / 2);
    $index = $parent;

    while ($index >= 0) {
        headAdjustDown($input,$index, $k);
        $index--;
    }
}
function headAdjustDown(&$tree, $index, $k)
{
    $leftChilden = $index*2+1;
    $rightChilden= $index*2+2;
    $min = $tree[$index];
    $len = $k;
    if ($len > $leftChilden && $tree[$index] > $tree[$leftChilden]) {
        $min = $tree[$leftChilden];
        $tmp = $tree[$leftChilden];
        $tree[$leftChilden] = $tree[$index];
        $tree[$index] = $tmp;
    }
    if ($len > $rightChilden && $min > $tree[$rightChilden]) {
        $min = $tree[$rightChilden];
        $tmp = $tree[$rightChilden];
        $tree[$rightChilden] = $tree[$index];
        $tree[$index] = $tmp;
    }
    headAdjustDown($tree, $leftChilden, $k);
    headAdjustDown($tree, $rightChilden, $k);
}

