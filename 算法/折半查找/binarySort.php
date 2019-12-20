<?php

//非递归
function binarySort($arr, $low, $high, $key)
{
	while( $low <= $high) {
		$mid = $low + intval(($high - $low) / 2);
		if ($arr[$mid] == $key) return $mid;
		if ($arr[$mid] < $key) {
			$low = $mid + 1;
			continue;
		}
		// arr[$mid] > $key
		$high = $mid - 1;
		continue;
	}
	return -1;
}


//递归
function binarySort($arr, $low, $high, $key)
{
	if ($low > $high) return -1;

	$mid = $low + intval(($high - $low) / 2);

	if ($arr[$mid] == $key) return $mid;

	if ($arr[$mid] < $key) return binarySort($arr, $mid+1, $high, $key);

	return binarySort($arr, $low, $mid-1, $key);
} 