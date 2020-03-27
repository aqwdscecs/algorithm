## 目录：

### [原地操作数组](https://github.com/wuye251/algorithm/tree/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%8E%9F%E5%9C%B0%E6%93%8D%E4%BD%9C%E6%95%B0%E7%BB%84)
__在线性时间复杂度内进行数组的交换&旋转__
- __[283.简单_移动零](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%8E%9F%E5%9C%B0%E6%93%8D%E4%BD%9C%E6%95%B0%E7%BB%84/283.%E7%AE%80%E5%8D%95_%E7%A7%BB%E5%8A%A8%E9%9B%B6)__
- __[448.简单_查找数组中消失的所有数字](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%8E%9F%E5%9C%B0%E6%93%8D%E4%BD%9C%E6%95%B0%E7%BB%84/448.%E7%AE%80%E5%8D%95_%E6%9F%A5%E6%89%BE%E6%95%B0%E7%BB%84%E4%B8%AD%E6%B6%88%E5%A4%B1%E7%9A%84%E6%89%80%E6%9C%89%E6%95%B0%E5%AD%97.php)__
- [189.简单_旋转数组](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%8E%9F%E5%9C%B0%E6%93%8D%E4%BD%9C%E6%95%B0%E7%BB%84/189.%E7%AE%80%E5%8D%95_%E6%97%8B%E8%BD%AC%E6%95%B0%E7%BB%84.php)


### [双指针类型题目](https://github.com/wuye251/algorithm/tree/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%8F%8C%E6%8C%87%E9%92%88)
__释义：两个边界限制，如果当前res > target  将两个指针中较大元素值更新，找更小值 以达到更接近 target的目的__
- [11.简单_盛水最多的容器](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%8F%8C%E6%8C%87%E9%92%88/11.%E7%AE%80%E5%8D%95_%E7%9B%9B%E6%B0%B4%E6%9C%80%E5%A4%9A%E7%9A%84%E5%AE%B9%E5%99%A8.php)
- [26.简单_删除排序数组中的重复项]()
- [27.简单_移除元素]()
- [88.简单_合并两个有序数组]()(worth review)
- [167.简单_两数之和II](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%8F%8C%E6%8C%87%E9%92%88/167.%E7%AE%80%E5%8D%95_%E4%B8%A4%E6%95%B0%E4%B9%8B%E5%92%8CII.php)

### [二分查找](https://github.com/wuye251/algorithm/tree/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E4%BA%8C%E5%88%86%E6%9F%A5%E6%89%BE)
__数组中的有序查找, 二分查找中的边界值以及循环条件__
- [35.中等_搜索插入位置](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E4%BA%8C%E5%88%86%E6%9F%A5%E6%89%BE/35.%E4%B8%AD%E7%AD%89_%E6%90%9C%E7%B4%A2%E6%8F%92%E5%85%A5%E4%BD%8D%E7%BD%AE.php)

### [摩尔投票算法](https://github.com/wuye251/algorithm/tree/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E6%91%A9%E5%B0%94%E6%8A%95%E7%A5%A8%E7%AE%97%E6%B3%95)
__投票算法----以线性时间复杂度 常数空间复杂度查找多数元素算法__
__多数元素：一个数组中某个元素值出现输入元素个数一半(大于n/2)以上的次数,称为多数元素__
1. 如果候选人不是maj 则 maj,会和其他非候选人一起反对 会反对候选人,所以候选人一定会下台(maj==0时发生换届选举)
2. 如果候选人是maj , 则maj 会支持自己，其他候选人会反对，同样因为maj 票数超过一半，所以maj 一定会成功当选
- [169.简单_多数元素](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E6%91%A9%E5%B0%94%E6%8A%95%E7%A5%A8%E7%AE%97%E6%B3%95/169.%E7%AE%80%E5%8D%95_%E5%A4%9A%E6%95%B0%E5%85%83%E7%B4%A0.php)

### [哈希Map]()
__设置hashMap找对应元素  达到O(1)的快速查找__
- [1.简单_两数之和]()

### [滑动窗口]()
__在一定范围内的数组最优解__
- [643. 简单_子数组最大平均数 I]()

### [动态规划]()
__数组中用动态规划解决问题__
- __[53.简单_最大子序和]()__(worth review)
### [编程之美](https://github.com/wuye251/algorithm/tree/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E7%BC%96%E7%A8%8B%E4%B9%8B%E7%BE%8E)
__用优美的代码逻辑解决问题,感受代码的魅力__
- [119.简单_杨辉三角II](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E7%BC%96%E7%A8%8B%E4%B9%8B%E7%BE%8E/119.%E7%AE%80%E5%8D%95_%E6%9D%A8%E8%BE%89%E4%B8%89%E8%A7%92II.php)


#### [其他简单题](https://github.com/wuye251/algorithm/tree/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%85%B6%E4%BB%96%E7%AE%80%E5%8D%95%E9%A2%98)
- [66.简单_加一]()
- [485.简单_最大连续1的个数](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%85%B6%E4%BB%96%E7%AE%80%E5%8D%95%E9%A2%98/485.%E7%AE%80%E5%8D%95_%E6%9C%80%E5%A4%A7%E8%BF%9E%E7%BB%AD1%E7%9A%84%E4%B8%AA%E6%95%B0.php)
- [217.简单_存在重复元素](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%85%B6%E4%BB%96%E7%AE%80%E5%8D%95%E9%A2%98/217.%E7%AE%80%E5%8D%95_%E5%AD%98%E5%9C%A8%E9%87%8D%E5%A4%8D%E5%85%83%E7%B4%A0.php)