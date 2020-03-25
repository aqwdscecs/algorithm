<?php

//简单跳台阶

//一般递归会导致重复计算，我们可以从1开始迭代计算到n的情况
//并且 f(3) = f(2) + f(1) 递归情况是这样
//我们可以通过两个变量存储f(n-1) 与 f(n-1)的情况
//这样会避免重复计算的问题  

//递归情况 
//这个时间复杂度为O(2n) 空间复杂度为O(2n)
//存在重复计算的情况 效率比较低
function jumpFloor($number)
{
	if ($number <= 2) return $number;

	return jumpFloor($number-1) +jumpFloor($number-2);
} 


//时间复杂度O(n) 空间复杂度为O(1)
function jumpFloor($number)
{
    // write code here
    if($number <= 2) return $number;

    $step1 = 1;
    $step2 = 2;
    
    for ($i=3; $i <= $number; $number--) {
        $stepSum = $step1 + $step2;
        $step1 = $step2;
        $step2 = $stepSum;
    }
    return $stepSum;
}



/*			变态跳台阶问题                */
//类似于跳台阶  我们先用数学归纳找规律  
//发现 f(n) = 2^(n-1)
//f(n) = 2f(n-1)

//通过上面  我们有两种做法   
//一个是代入公式 f(n) = pow(2,(n-1))
//另一个是递归调用  return 2*f(n-1)
//效率上 代入公式当然优于递归开销

function jumpFloorII($number)
{
    // write code here
    if($number == 1) return 1;
    return pow(2,($number - 1));
}

function jumpFloorII($number)
{
	if ($number == 1) return 1;
	
	return jumpFloorII($number-1);
}
