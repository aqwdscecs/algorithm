<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
		//行数小于2时不能Z字打印
		//字符长度小于行数时不能打印
		//行数为1直接返回
    	$len = strlen($s);
		if ($len <= 1 || $len < $numRows || $numRows == 1) return $s;
		
		$curRows = 0;
		$direDown = 0; // 方向
		$rowCh = [];

		$chIndex = 0;
		//放置每行的字符
		while ($chIndex < $len) {

			$rowCh[$curRows] .= $s[$chIndex];
			//只有在第一行或者最后一行时curRow方向会改变
			if ($curRows == 0 || $curRows == $numRows-1) $direDown = !$direDown;
			$curRows += $direDown ? 1 : -1;
		}

		//将每行字符合并
		$retRowStr = '';
		for ($row=0; $row < $numRows; $row++){
			$retRowStr .= $$rowCh[$row];
		}
		return $retRowStr;
    }
}