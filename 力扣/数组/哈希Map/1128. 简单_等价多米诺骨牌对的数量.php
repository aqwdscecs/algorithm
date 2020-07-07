<?php

/*
给你一个由一些多米诺骨牌组成的列表 dominoes。

如果其中某一张多米诺骨牌可以通过旋转 0 度或 180 度得到另一张多米诺骨牌，我们就认为这两张牌是等价的。

形式上，dominoes[i] = [a, b] 和 dominoes[j] = [c, d] 等价的前提是 a==c 且 b==d，或是 a==d 且 b==c。

在 0 <= i < j < dominoes.length 的前提下，找出满足 dominoes[i] 和 dominoes[j] 等价的骨牌对 (i, j) 的数量。

 

示例：

输入：dominoes = [[1,2],[2,1],[3,4],[5,6]]
输出：1
 

提示：

1 <= dominoes.length <= 40000
1 <= dominoes[i][j] <= 9

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/number-of-equivalent-domino-pairs
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/

/*
    思路：符合条件的是[1,2] = [1,2]或[1,2] = [2,1]
        它两共通点 为比较的数字相同 只是顺序不同 
        我们可以通过排序 设置hashMap 对应索引为hasMap[12]++ 来初始化
        再一次遍历hashMap我们可以对其求排列数 val*(val-1) / 2 来计算
        最后结果即为累加和

*/

/*
时空复杂度 O(mn) O(n) n为哈希表长度

执行用时：144 ms, 在所有 PHP 提交中击败了100.00%的用户
内存消耗：51.4 MB, 在所有 PHP 提交中击败了100.00%的用户
*/

class Solution {

    /**
     * @param Integer[][] $dominoes
     * @return Integer
     */
    function numEquivDominoPairs($dominoes) {
        
        $hashMap = array();
        foreach($dominoes as $k => $v) {
            //小到大排序
            sort($v);
            $curIndex = $v[0] . $v[1];
            $hashMap[$curIndex]+= 1;
        }

        $count = 0;
        foreach($hashMap as $dict => $val) {

            $count += intval(($val/2) *($val-1));
        }
        return $count;
    }
}