/*
一只青蛙一次可以跳上1级台阶，也可以跳上2级台阶。求该青蛙跳上一个 n 级的台阶总共有多少种跳法。
答案需要取模 1e9+7（1000000007），如计算初始结果为：1000000008，请返回 1。

示例 1：
输入：n = 2
输出：2

示例 2：
输入：n = 7
输出：21

示例 3：
输入：n = 0
输出：1
*/
/* 
n=0时  return 1
n=1时  return 1
n=2时  return 2
n=3时  return 3
n=2时  return 5
n=2时  return 8
n=2时  return 13
```
n=n时  return val[n-1]+val[n-2]

和斐波那契数列一个同种题
*/
func numWays(n int) int {
    if (n == 0) {
        return 1
    }

    if (n <= 2) {
        return n
    }

    a := 1
    b := 2
    for i:=3; i<=n; i++ {
        sum := (a+b)%1000000007
        a = b
        b = sum 
    }

    return b
}


/*可以跳1```n阶  那么跳n阶有多少种方法*/

/*
f(n) = f(n-1) + f(n-2) + ... + f(2) + f(1) + 1
又有f(n-1) = f(n-2) + ... +f(2) + f(1) + 1

则有f(n) = 2*f(n-1)

代入有： f(n) = 1 + f(1) +f(2) + .. + f(n-1)
             = 2^0 + 2^1 + 2^2 + ... 2^n-2
又有： f(n-1) = 2^n-2
    因为f(n) = 2*f(n-1)
    则 f(n) = 2*2^n-2
    即 f(n) = 2^n-1
*/ 
