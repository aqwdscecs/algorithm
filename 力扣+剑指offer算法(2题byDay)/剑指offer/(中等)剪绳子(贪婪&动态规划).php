<?php



//给你一根长度为n的绳子，请把绳子剪成m段（m、n都是整数，n>1并且m>1），每段绳子的长度记为k[0],k[1],...,k[m]。请问k[0]xk[1]x...xk[m]可能的最大乘积是多少？例如，当绳子的长度是8时，我们把它剪成长度分别为2、3、3的三段，此时得到的最大乘积是18。
//
//输入描述:
//输入一个数n，意义见题面。（2 <= n <= 100）
//
//
//输出描述:
//输出答案。
//示例1
//输入
//8
//输出
//18




/**
 * 题目分析：
 * 先举几个例子，可以看出规律来。
 * 4 ： 2*2
 * 5 ： 2*3
 * 6 ： 3*3
 * 7 ： 2*2*3 或者4*3
 * 8 ： 2*3*3
 * 9 ： 3*3*3
 * 10：2*2*3*3 或者4*3*3
 * 11：2*3*3*3
 * 12：3*3*3*3
 * 13：2*2*3*3*3 或者4*3*3*3
 *
 * 下面是分析：
 * 首先判断k[0]到k[m]可能有哪些数字，实际上只可能是2或者3。
 * 当然也可能有4，但是4=2*2，我们就简单些不考虑了。
 * 5<2*3,6<3*3,比6更大的数字我们就更不用考虑了，肯定要继续分。
 * 其次看2和3的数量，2的数量肯定小于3个，为什么呢？因为2*2*2<3*3，那么题目就简单了。
 * 直接用n除以3，根据得到的余数判断是一个2还是两个2还是没有2就行了。
 * 由于题目规定m>1，所以2只能是1*1，3只能是2*1，这两个特殊情况直接返回就行了。
 *
 * 乘方运算的复杂度为：O(log n)，用动态规划来做会耗时比较多。
 */

function cutRope($number)
{
    // write code here
    if ($number == 2) return 1;
    if ($number == 3) return 2;
    
    $x = $number % 3;
    $y = intval($number / 3);
    
    if ($x == 0) return pow(3, $y);

    else if ($x == 1) return 2*2*pow(3, $y-1); 

    else return  2 * pow(3, $y);
}


//dp解法
//O(n^2)  空间复杂度O(n)
function cutRope($number)
{
    // write code here
    if ($number == 2) return 1;
    if ($number == 3) return 2;
    
    $dp[1] = 1;
    $dp[2] = 2;
    $dp[3] = 3;
    
    $res = 0;
    for ($index = 4; $index <= $number; $index++) {
        //折半  1*3  和 3*1 之间只需要计算1*3 即可  
        for ($j = 1; $j <= intval($index/2); $j++) {
            $res = max($res, $dp[$j] * $dp[$index - $j]); 
        }
        $dp[$index] = $res;
    }
    
    return $dp[$number];
}
 

