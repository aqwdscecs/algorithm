<?php

// 给定两个整数，被除数 dividend 和除数 divisor。将两数相除，要求不使用乘法、除法和 mod 运算符。
// 返回被除数 dividend 除以除数 divisor 得到的商。

// 示例 1:
// 输入: dividend = 10, divisor = 3
// 输出: 3

// 示例 2:
// 输入: dividend = 7, divisor = -3
// 输出: -2
// 说明:

// 被除数和除数均为 32 位有符号整数。
// 除数不为 0。
// 假设我们的环境只能存储 32 位有符号整数，其数值范围是 [−231,  231 − 1]。本题中，如果除法结果溢出，则返回 231 − 1。
// 在真实的面试中遇到过这道题？

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/divide-two-integers
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    function divide($dividend, $divisor) {
        
        $res = intval($dividend/$divisor);
        if ($res > pow(2,31)-1 || $res < pow(-2,31) ) return pow(2,31)-1;
        return $res;
    }

}

//方法二：通过被除数翻倍和除数大小比较 
// 执行用时 :8 ms, 在所有 PHP 提交中击败了79.49%的用户
// 内存消耗 :14.8 MB, 在所有 PHP 提交中击败了68.75%的用户
class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    function divide($dividend, $divisor) {
        $Max = pow(2,31)-1;
        $Min = pow(-2,31);
        if ($dividend == 0 ) return 0;
        if ($divisor == 1 )  return $dividend;
        // if ($divisor == -1) {
        //     if ($dividend*(-1) < $Min || $dividend*(-1) > $Max )  {
        //         return $Max;
        //     }
        //     return (-1) * $dividend;
        // }
        if ($dividend == $Min && $divisor == -1) return $Max;

        //符号判断 1代表负数  0代表正数
        $sign = ($dividend > 0) ^ ($divisor > 0);
        
        $dividend = ($dividend > 0) ? $dividend : (-1)*$dividend;
        $divisor = ($divisor > 0) ? $divisor : (-1)*$divisor;
        
        $res = $this->div($dividend, $divisor);
        //符号若为1 表示结果为负 反之为正 
        if ($sign) $res = (-1) * $res;
        //再次判断结果是否溢出
        if ($res > $Max || $res < $Min) return $Max;
        return $res;
    }

    function div($dividend, $divisor)
    {
        if ($dividend < $divisor) return 0;
        
        $res = 1;
        $tmp = $divisor;
        while (($tmp+$tmp) <= $dividend) {
            $tmp += $tmp;
            $res += $res;
        }
        $res = $res + $this->div($dividend-$tmp, $divisor);
        return $res;
    }
}

//方法三：用移位的思想进行比较
//       除数右移n位后和被除数做比较(n从31开始)
//       如果移位后结果 小于     被除数 则n--继续右移
//       如果移位后结果 大于等于 被除数 
/********则结果+= 2^n              **
/**********除数 =  除数 - (2^n)*被除数**
/**********继续移位 和 被除数比较 同上 如果小于继续移位直到n=0
/**********否则 结果+= 移位
/**************************************/

//复杂度：O(32)
//执行用时 :4 ms, 在所有 PHP 提交中击败了94.87%的用户
//内存消耗 :14.7 MB, 在所有 PHP 提交中击败了96.88%的用户

class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    function divide($dividend, $divisor) {
        $bitMaxIndex = 31;
        
        if ($dividend == 0) return 0;
        if ($divisor == 1) return $dividend;

        $Max = pow(2,31)-1;
        $Min = pow(-2,31);
        $res = 0;
        if ($dividend == $Min && $divisor == -1) return $Max;

        //计算之前记录下商的正负 用异或结果存储
        //两数符号相同sign为0  相反sign为1
        $sign = ($dividend > 0) ^ ($divisor > 0); 
        
        $absDividend = abs($dividend);
        $absDivisor  = abs($divisor);

        //除数右移bitIndex结果和被除数大小比较
        for ($bitIndex=$bitMaxIndex; $bitIndex >= 0; $bitIndex--) {

            //如果大于等于被除数 则商+= 1<<bitIndex
            if ( ($absDividend >> $bitIndex) >= $absDivisor ) {
                $res += 1<<$bitIndex;    
                //商赋值之后将除数重新计算(余数继续进行判断)
                $absDividend -= $absDivisor<<$bitIndex;  
            }
        }

        //根据上面的符号为标志进行res正负计算
        return ($sign == 0) ? $res : (-1)*$res;
    }
}



