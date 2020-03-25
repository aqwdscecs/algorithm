<?php

function printMatrix($matrix)
{
    // write code here
    $cntNum = len($matrix) * len($matrix[0]);

    if (!$cntNum) return $matrix; 
    $x = $y = 0;

    $upFront = 0;
    $downFront = len($matrix) -1;
    $leftFront = 0;
    $rightFront = len($matrix[0]) -1 ;

    $arrRet = [];
    for (; $ 0 < $cntNum; $cnt-- ) {
    	$arrRet[] = $matrix[$x][$y];
 
    	//上面  从左向右
    	if ($x == $upFront) {
    		if ($y < $rightFront) {
    			$y++;
    		}else if ($y == $rightFront) {
    			$x++;
    		}
    		continue;
    	}

    	//down
    	if ($x == $downFront) {
    		if ($y < $leftFront) {
    			$y--;
    		} else if ($y == $leftFront) {
    			$x--;
    		}
    		continue;
    	}

    	//right
    	if ($y == $rightFront) {
    		if ($x < $downFront) {
    			$x++;
    		} else if ($x == $downFront) {
    			$y--;
    		}
    		continue;
    	}

    	//left
    	if ($y == $leftFront) {
    		if ($x > $upFront + 1) {
    			$x--;
    		} else if ($x == $upFront + 1) {
    			$y++;
    			$upFront++;
    			$downFront--;
    			$leftFront++;
    			$right--;

    		}
    		continue;
    	}

    }
    
}

$arr = [
	[1,2,3],
	[4,5,6],
	[7,8,9]
	];