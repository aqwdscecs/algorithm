<?php

// 题目描述
// 把只包含质因子2、3和5的数称作丑数（Ugly Number）。例如6、8都是丑数，但14不是，因为它包含质因子7。 习惯上我们把1当做是第一个丑数。求按从小到大的顺序的第N个丑数。


//借鉴思路：
//1
// 1*2 1*3 1*5  -> 2 3 5  -> 把其中最小的放到arr尾部 
// 并且有三个指针分别指向其n*2 n*3 n*5的数下标 如果当前计算的丑数等于其n*2 | n*3 | n*5 那么下次应该计算的是arr[n+1]*x 【x=2,3,5】

//时间复杂度 O(n)  空间复杂度O(n) 
function GetUglyNumber_Solution($index)
{
    // write code here

    //小于7的全是丑数， 直接返回即可
    if ($index < 7) return $index;
    
    $arr = [];
    $pt2 = $pt3 = $pt5 = 0;
    
    $curNum = 1;
    array_push($arr, $curNum);
    
    while (count($arr) < $index) {
        $curNum = min($arr[$pt2] * 2, 
                      $arr[$pt3] * 3, 
                      $arr[$pt5] * 5
                     );
        if ($arr[$pt2] * 2 == $curNum) $pt2++;
        if ($arr[$pt3] * 3 == $curNum) $pt3++;
        if ($arr[$pt5] * 5 == $curNum) $pt5++;
        
        array_push($arr, $curNum);
    }
    return $arr[$index-1];
}