<?php
 

/*题目一*/

function jumpKindCount($n)
{
	// if ($n <= 0) return -1;
	if ($n <= 2) return $n;

	jumpCount($n);
}
function jumpCount($n)
{
	if ($n <= 2) return $n;

	return jumpCount($n-1) + jumpCount($n-2);
}

 
/*题目二*/
function binaryFind($arr, $target)
{ 
		$count = count($arr);

		//为空直接插到首元素
		if ($count <= 0) return 0;

		//小于首元素 直接赋予0下标插入
		if ($arr[0] > $target) return 0;
		//大于末尾元素  直接赋予最后下标+1位置
		if ($arr[$count-1] < $target) return $count;

		$left = 0;
		$right = $count -1 ;
		
		while ($left <= $right) {
			$mid = $left + intval(($right - $left)/2);
			if ($arr[$mid] < $target) {
				$left = $mid;
			}  else if ($arr[$mid] > $target) {
				$right = $mid-1;
			} else {
				return $mid;
			}
		}
		return $mid+1;
}


