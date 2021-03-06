]
/*
第一种：
暴力递归  不去重(不记忆法)
时间复杂度为O(P(1,n)+P(2,n)+P(3,n)+...+P(m,n))

延伸 P(1,n) -->  当前数组组成的所有的排列组合数  P(m,n) = n!/(n-m)!
	C(1,n)  --> 当前数组组成的所有的排列组合数(去重) C(m,n) = n!/((n-m)!*m!)
	而C(1,n)+C(2,n)+..C(m,n) = 2^n
摘自：https://www.zhihu.com/question/26094736/answer/610713978

所以去重的算法复杂度都为2^n   不去重时间复杂度>2^n
1...n的递归深度 所以空间复杂度O(n)
*/
func cuttingRope(n int) int {
    if (n <= 2) {
       return 1
    }

    res := -1

    for i:=1; i<n; i++ {
        res = max(res, max(i*cuttingRope(n-i), i*(n-i)))
    }

    return res;
}

func max(i int, j int) int {
    if (i > j) {
        return i
    }

    return j
}
/*
第二种：
带记忆法的剪绳子
时间复杂度为O(C(1,n)+C(2,n)+...C(m,n)) = O(2^n)
空间复杂度O(n)
*/



/*
第三种：
从小到大计算的方法  m的情况最大值多数   m+1的情况下最大值多少  ... n的时候最大值多数
*/


/*
第四种：
找规律  n长的绳子  可以由x个3 再加一个或者0个2 或0个1个 1组成
那么剪掉的绳子最大长度就是 3^x*2 [n%3 余2]   3^x [n%3 == 0]  3^(n-1)*4 [n%3 == 1   1和3可以拼成2*2]
时间复杂度O(1) 空间复杂度O(1)
 */
func cuttingRope(n int) int {
    // 11  3 3 3 2
    // 10  3 3 3 1  => 3 3 2 2
    // 9   3 3 3
    // 8   3 3 2
    // 7   3 3 1  => 3 2 2
    // 6   3 3
    // 5   3 2 
    // 4   3 1  => 2 2  
    
    // 特殊情况
    // 3   2 1
    // 2   1 1
    // 1   1

    if n <= 2 {
        return 1
    }
    if n == 3 {
        return 2
    }
    // 能分成几份3
    parts := n / 3
    another := n % 3
    var result float64

    switch another {
        case 2:
            result = math.Pow(3, float64(parts))
            result *= 2
        case 1:
            result = math.Pow(3, float64(parts-1))
            result *= 4
        default:
            result = math.Pow(3, float64(parts))
    }
    return int(result)

}

