<?php


//希尔排序也是基于直接插入的基础上进行排序

//元素n    每次以间隔为n/2为一组进行直接插入
//         d = n/4 ... d= n/8

//非稳定排序
//时间复杂度O(n^(1.3--2))
//空间复杂度O(1)
function ShellsSort($arr)
{
	$count = count($arr);
	if ($count <= 1) return $arr;
	//设置初始增量
	$d = intval($count/2);

	//增量最小为1
	while ($d > 0) {
		//间隔为d的直接插入
		for ($index=$d; $index < $count; $index++) {
			if ($arr[$index-$d] > $arr[$index]) {
				$temp = $arr[$index];

				$j = $index-$d;
				while ($j >= 0 && $arr[$j] > $temp) {
					$arr[$j+$d] = $arr[$j];
					$j -= $d;
				}
				$arr[$j+$d] = $temp;
			}
		}
		$d = intval($d/2);
	}
	return $arr;
}