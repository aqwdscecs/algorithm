<?php


//归并排序
function InversePairs($data)
{
    // write code here
    $count = count($data);
    if ($count <= 1) return 0;
       
    $left  = 0;
    $right = $count - 1;
    $sum = 0;
    return divide($left, $right, $data, $sum)% 1000000007;
}

function divide($left, $right, &$data, &$sum)
{
   if ($left == $right)
       return ;
    
    $mid = $left + intval(($right-$left)/2);
    
    divide($left, $mid, $data, $sum);
    divide($mid+1, $right, $data, $sum);
    
    merge($left, $right, $mid, $data, $sum);
    
    return $sum;
}

function merge($left, $right, $mid, &$data, &$sum)
{
    $tmp = [];
    $l = $left;
    $r = $mid+1;

    while($l<=$mid && $r<=$right) {
        if ($data[$l] > $data[$r]) {
            $tmp[] = $data[$r++];
            $sum += $mid - $l + 1;
        } else {
            $tmp[] = $data[$l++];
        }
    }
    
    while($l<=$mid) {
        $tmp[] = $data[$l++];
    }
    while($r<=$right) {
        $tmp[] = $data[$r++];
    }
    // $index = 0;
    // $tmpCount = count($tmp);
    for ($i=0,$len=count($tmp); $i<$len; $i++) {
        $data[$left+$i] = $temp[$i];
    }
}