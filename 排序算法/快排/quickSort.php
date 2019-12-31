<?php

//递归
function quickSort($array) 
{
	$len = count($array);

	if ($len <= 1) 	 return $array;	

	$key = $array[0];

	$left_arr = array();
	$right_arr = array();

	for ($cur = 1; $cur < $len; $cur++) {

		if ($array[$cur] < $key) {
		
			array_push($left_arr, $array[$cur]);
		
		} else {
		
			array_push($right_arr, $array[$cur]);
		
		}
	}

	$left_arr  = quick_sort($left_arr);
	$right_arr = quick_sort($right_arr);

	$retArr = array_merge($left_arr, array($key), $right_arr);

	return $retArr;
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