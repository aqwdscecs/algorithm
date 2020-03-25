<?php

class Solution {

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
    	
    	$len = strlen($str);
    	if (!$len) return 0;
		$symbol = 1;
		$index = 0;
		$res = 0;

		while ($index < $len && $str[$index] == ' ')$index++; //跳过空格

		if ($index == $len) return 0;  // 跳过空格后没有其他内容 
		if ($str[$index] == '-') {  //第一个符号为 - 
            $symbol = -1;
            $index++;
        }else if ($str[$index] == '+') {  //第一个符号为+
            $index++;
        }
        
        //如果 + - 号之后不是数组 那么直接返回
        if ($str[$index] > '9' || $str[$index] < '0') return 0;

        //定义最大值 最小值
        $max = pow(2,31)-1;
        $min = pow(-2,31);
        //提前max/min 除 10 进行判断是否溢出  
        //因为符号symbol和res数字分开 所以min值应该是 正数
		$curMax = intval((pow(2,31)-1) /10);
		$curMin = $symbol * intval(pow(-2, 31) /10);

		while ( ($index < $len) && ($str[$index] <= '9') && ($str[$index] >= 0) ) {
            if ( ($symbol == -1) &&  (($curMin < $res) || 
				 ($curMin == $res   && $str[$index] >= '8')) ) 
                return $min;

			if ( ($symbol == 1)  && (($curMax < $res)  || 
				 ($curMax == $res   && $str[$index] >= '7')) ) 
				return $max;

			$res = $res * 10 + $str[$index] - '0';
			$index ++;
		}

		return $symbol * $res;
    }
}