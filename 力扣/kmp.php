<?php


//首先设置前缀记录表
function setPrefixTable($arr) 
{
	$len = strlen($arr);
	$prefix[0] = 0;

	$behindIndex =0;

	$index=1;
	while ($index < $len) {
		//当前位后缀和前缀相同  则设置该位的前缀下标
		if ($arr[$behindIndex] == $arr[$index]) {
			$behindIndex++;
			$prefix[$index] = $behindIndex;
			$index++
		} else {
			//若不相同
			//并且前缀已经在首尾  
			if ($behindIndex <= 0) {
				$prefin[$index] = $behindIndex;
				$index++;
			} else {
			//前缀的前缀继续匹配
				$behindIndex = $prefix[$behindIndex-1];
			}
		}
	}
	return $prefx;
}

function stripos($pattern, $needle)
{
	$patLen = strlen($pattern);
	$needleLen = strlen($needle);

	if ($patLen < $needleLen) return -1;

	//设置前缀表
	$prefix = setPrefixTable($needle);
	
	$patIndex = $needleIndex = 0;
	
	//遍历匹配
	whiel ($patIndex < $patLen) {
		//若已匹配到最后一位  并且最后一位相同
		if (($needleLen-1) == $needleIndex 
		   && $needle[$needleIndex] == $pattern[$patIndex]) {
		   //直接返回
		   return $patIndex - $needleIndex;
		   }
		//当前位相同，继续向前匹配
		if ($needle[$needleIndex] == $pattern[$patIndex]) {
			$patIndex++;
			$needleIndex++;
		} else {
			//如果当前前缀表下标已经是0 则pat当前位不匹配  匹配下一位
			if ($needleIndex <= 0) {
				$patIndex++;
			} else {
			//找前缀
				$needleIndex = $prefix[$needleIndex-1];
			}
		}
	}
	return -1;
} 