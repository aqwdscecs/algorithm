<?php

//每次冒出一个第i大的数字放入最终位置
//平均时间复杂度O(n^2) 空间复杂度O(1)
function bubbleSort($arr)
{
	$len = count($arr);

	$i = $j = 0;
	for ($i=0; $i < $len; $i++) {
		for($j=0; $j < $len-$i-1; $j++) {

			if ($arr[$j] > $arr[$j+1]) {
				//swap
				$temp = $arr[$j];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $temp;
			}
		} 
	}
	return $arr;
}

//优化 ：如果某次没有数字交换| 有序 那么直接结束
function bubbleSort($arr)
{
	$len = count($arr);

	$boolExchange = false;

	for ($i=0; $i < $len; $i++) { 
		for ($j=0; $j < $len - 1 - $i; $j++) { 
			if ($arr[$j] > $arr[$j+1]) {
				$boolExchange = true;
				$temp = $arr[$j];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $temp;
			}
		}
		if ($boolExchange == false) return $arr;

		$boolExchange = false;
	}
}