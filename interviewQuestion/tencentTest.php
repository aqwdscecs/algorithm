<?php


	public function factorialCountZero($n)
{
	$count = 0;
	while ($n >= 5) {
		$n = intval($n/5);

		$count += $n;
	}
	return $count;
}
}


function bubbleSort($arr) 
{
	$len = count($arr);
	if ($len <= 1) return $arr;

	for ($index=0; $index < $len; $index++) {
		//交换标志
		$boolExchange = false;

		for ($j = 0; $j < $len-$index-1; $j++) {
			if ($arr[$j] > $arr[$j+1]) {
				
				$boolExchange = true;
				//swap
				$temp = $arr[$j];
				$arr[$j] = $arr[$j+1];
				$arr[$j+1] = $temp;
			}
		}
		//如果有交换
		if ($boolExchange) $boolExchange = false;
		//没有交换直接弹出
		else return $arr;
	}
}


function JosephRing($n)
{
	$queue = new SplQueue();
	for ($index=0; $index < $n; $index++) {
		$queue->push($index);
	}
	print_r($queue);
}

function factorialCountZero($n)
{
	$count = 0;
	while ($n > 5) {
		$n = ($n-($n%5))/5;

		$count += $n;
	}
}