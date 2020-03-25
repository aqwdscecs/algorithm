## 目录：

### [双指针类型题目](https://github.com/wuye251/algorithm/tree/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%8F%8C%E6%8C%87%E9%92%88)
__释义：两个边界限制，如果当前res > target  将两个指针中较大元素值更新，找更小值 以达到更接近 target的目的__
- [11.简单_盛水最多的容器](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%8F%8C%E6%8C%87%E9%92%88/11.%E7%AE%80%E5%8D%95_%E7%9B%9B%E6%B0%B4%E6%9C%80%E5%A4%9A%E7%9A%84%E5%AE%B9%E5%99%A8.php)
- [167.简单_两数之和II](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E5%8F%8C%E6%8C%87%E9%92%88/167.%E7%AE%80%E5%8D%95_%E4%B8%A4%E6%95%B0%E4%B9%8B%E5%92%8CII.php)

### [摩尔投票算法](https://github.com/wuye251/algorithm/tree/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E6%91%A9%E5%B0%94%E6%8A%95%E7%A5%A8%E7%AE%97%E6%B3%95)
__投票算法----以线性时间复杂度 常数空间复杂度查找多数元素算法__
__多数元素：一个数组中某个元素值出现输入元素个数一半(大于n/2)以上的次数,称为多数元素__
1. 如果候选人不是maj 则 maj,会和其他非候选人一起反对 会反对候选人,所以候选人一定会下台(maj==0时发生换届选举)
2. 如果候选人是maj , 则maj 会支持自己，其他候选人会反对，同样因为maj 票数超过一半，所以maj 一定会成功当选
- [169.简单_多数元素](https://github.com/wuye251/algorithm/blob/master/%E5%8A%9B%E6%89%A3/%E6%95%B0%E7%BB%84/%E6%91%A9%E5%B0%94%E6%8A%95%E7%A5%A8%E7%AE%97%E6%B3%95/169.%E7%AE%80%E5%8D%95_%E5%A4%9A%E6%95%B0%E5%85%83%E7%B4%A0.php)
