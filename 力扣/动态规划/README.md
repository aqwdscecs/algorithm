简单DP刷完用了三天时间 10题左右

1. 思路：核心是找 其状态方程,核心是找其状态方程,核心是找其状态方程(重要的话说三遍),如果不容易看题写出,可以先通过画出递归树,再从自底向上梳理
而dp数组是否要设置和状态有关
步骤解析比较全的可以参考 198.打家劫舍[leetcode题解](https://leetcode-cn.com/problems/house-robber/solution/xiao-bai-chu-xue-dpxie-ti-jie-by-wuy9788/)
2. 还有一种是可以用数学归纳来写状态方程,例如跳台阶 1&2 步时 f(n) = f(n-1) + f(n-2)
                                            n 步时  f(n) = 2xf(n) 再通过公式写出状态方程

简单题目中比较经典的题有: 198.打家劫舍  买股票系列问题  面试题08.01.三步问题(类似于斐波那契 和 跳台阶)  影响最深比较难掌握的是 [__试题17.16连续最大和__](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E5%8A%A8%E6%80%81%E8%A7%84%E5%88%92/%E9%9D%A2%E8%AF%95%E9%A2%9817.16.%E7%AE%80%E5%8D%95_%E8%BF%9E%E7%BB%AD%E6%95%B0%E5%88%97%E6%9C%80%E5%A4%A7%E5%92%8C.php)

目前先做完简单题  后续刷中等

- [70.简单_跳台阶 (DP入门)](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E5%8A%A8%E6%80%81%E8%A7%84%E5%88%92/70.%E7%AE%80%E5%8D%95_%E9%9D%92%E8%9B%99%E8%B7%B3%E5%8F%B0%E9%98%B6.php)
- 买卖股票系列问题
	- [121.简单)买卖股票最佳时机](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E5%8A%A8%E6%80%81%E8%A7%84%E5%88%92/%E4%B9%B0%E5%8D%96%E8%82%A1%E7%A5%A8%E7%B3%BB%E5%88%97%E9%97%AE%E9%A2%98/121.%E7%AE%80%E5%8D%95_%E4%B9%B0%E5%8D%96%E8%82%A1%E7%A5%A8%E6%9C%80%E4%BD%B3%E6%97%B6%E6%9C%BA%E7%B3%BB%E5%88%97.php)
	- [122.(中等)买卖股票最佳时机II](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E5%8A%A8%E6%80%81%E8%A7%84%E5%88%92/%E4%B9%B0%E5%8D%96%E8%82%A1%E7%A5%A8%E7%B3%BB%E5%88%97%E9%97%AE%E9%A2%98/122.%E4%B8%AD%E7%AD%89_%E4%B9%B0%E5%8D%96%E8%82%A1%E7%A5%A8%E6%9C%80%E4%BD%B3%E6%97%B6%E6%9C%BAII.php)
- 打家劫舍
	- [198.(简单)打家劫舍](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E5%8A%A8%E6%80%81%E8%A7%84%E5%88%92/%E6%89%93%E5%AE%B6%E5%8A%AB%E8%88%8D/198.%E7%AE%80%E5%8D%95_%E6%89%93%E5%AE%B6%E5%8A%AB%E8%88%8D.php)
- 区域检索
	- [303.(简单)一维区域检索](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E5%8A%A8%E6%80%81%E8%A7%84%E5%88%92/%E5%8C%BA%E5%9F%9F%E6%A3%80%E7%B4%A2/303.%E7%AE%80%E5%8D%95_%E4%B8%80%E7%BB%B4%E5%8C%BA%E5%9F%9F%E6%A3%80%E7%B4%A2.php)
- [面试题17.16.(简单)按摩师](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E5%8A%A8%E6%80%81%E8%A7%84%E5%88%92/%E9%9D%A2%E8%AF%95%E9%A2%9817.16.%E7%AE%80%E5%8D%95_%E6%8C%89%E6%91%A9%E5%B8%88.php)
- __[面试题17.16.(简单)连续最大和__](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E5%8A%A8%E6%80%81%E8%A7%84%E5%88%92/%E9%9D%A2%E8%AF%95%E9%A2%9817.16.%E7%AE%80%E5%8D%95_%E8%BF%9E%E7%BB%AD%E6%95%B0%E5%88%97%E6%9C%80%E5%A4%A7%E5%92%8C.php)
- [面试题08.01.三步问题](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E5%8A%A8%E6%80%81%E8%A7%84%E5%88%92/%E9%9D%A2%E8%AF%95%E9%A2%9808.01.%E7%AE%80%E5%8D%95_%E4%B8%89%E6%AD%A5%E9%97%AE%E9%A2%98.php)
