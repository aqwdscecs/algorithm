<?php

//递归
function quickSort($arr)
{

	$left_arr = array();
	$right_arr = array();

	$flag = $arr[0];

	$len = count($arr);
	for ($i = 1; $i < $len; $i++) {

		if ($arr[$i] < $flag) {
			array_push($left_arr, $arr[$i]);
		} else {
			array_push($right_arr, $)
		}
	}
	$left_arr  = quickSort($left_arr);
	$right_arr = quickSort($right_arr);

	$retArr = array_merge($flag, $left_arr, $right_arr);
}

//非递归
// function quickSort($arr)
// {
// 	$low = 0;
// 	$high = count($arr) - 1;
// 	$flag = $arr[$low];

// 	while ($low < $high) {
// 		while ($low < $high && $arr[$low] < $arr[$flag]) $low++;
// 		while ($low < $high && $arr[$high] > $arr[$flag]) $high++;

// 		$temp = $arr[$high];
// 		$arr[$high] = $arr[$low];
// 		$arr[$low] = $temp;
// 	}

// }