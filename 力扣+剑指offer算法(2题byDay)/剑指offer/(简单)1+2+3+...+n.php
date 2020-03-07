<?php

function Sum_Solution($n)
{
    // write code here
    return (1+$n)*$n / 2;
}



//不使用* /
//递归
function Sum_Solution($n)
{
	if ($n <=1) return $n;

	return $n+Sum_Solution($n-1);
}