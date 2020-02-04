<?php


function ShellSort($arr)
{
	$len = count($arr);
	for ($step = intval($len/2); $step > 0; $step = intval($step/2)){
		for ($i = $step; $i < $len; $i++) {
			$j = $i;
			$temp = $arr[$j];

			while($j - $step >= 0 && $arr[$j-$step] > $temp) {
				$arr[$j] = $arr[$j-$step];
				$j -= $step;
			}
			$arr[$j] = $temp;
		}
	}
}