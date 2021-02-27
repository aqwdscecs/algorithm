/*
F(0) = 0,   F(1) = 1
F(N) = F(N - 1) + F(N - 2), 其中 N > 1.
斐波那契数列由 0 和 1 开始，之后的斐波那契数就是由之前的两数相加而得出。
答案需要取模 1e9+7（1000000007），如计算初始结果为：1000000008，请返回 1。

示例 1：
输入：n = 2
输出：1

示例 2：
输入：n = 5
输出：5

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/fei-bo-na-qi-shu-lie-lcof
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

/*
动态规划 
dp[a] + dp [a-1] = dp[a+1]

dp数组记录    -> reutn a+1 只需要计算 当前第a+1个元素值即可  
                有dp[n-2] = a; dp[n-1] = b;  有dp[n] = a+b 
                只需要每次更新a b值即可 ： sum = a+b    a = b   b=sum（此时b即为dp[n]）
*/
func fib(n int) int {
    if(n<=1) {
      return n  
    } 
    a := 0 
    b := 1

    for i:=2; i<=n; i++ {
        tmp := b
        b = (a + b) % 1000000007
        a = tmp
    }
    return b
}