<?php

/*
描述： 

给出一个区间的集合，请合并所有重叠的区间。

示例 1:

输入: intervals = [[1,3],[2,6],[8,10],[15,18]]
输出: [[1,6],[8,10],[15,18]]
解释: 区间 [1,3] 和 [2,6] 重叠, 将它们合并为 [1,6].
示例 2:

输入: intervals = [[1,4],[4,5]]
输出: [[1,5]]
解释: 区间 [1,4] 和 [4,5] 可被视为重叠区间。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/merge-intervals
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/


/*
    Step 1: 将各元素按照各自下标为0的元素 从小到大排序
    Step 2: 迭代比较  每次都有    第一个元素下标为0的值(即左边界) 小于 第二元素下标为0的值(即左边界)
    Step 3: 如果第二个元素左边界 小于 第一个元素 右边界 则代表有重合  否则 无重合 返回数组中直接写入第二元素区间
    Step 4: 如果有重合 则更新的左边界为当前较小的左边界(因为已经按照左边界排序 所以为第一个元素的左边界) 右边界为两个元素较大的右边界  将得到的区间更新

    时空复杂度O(n) O(n)
*/
class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        $count = count($intervals); 
        if ($count < 2) return $intervals;
        //按各个元素下标0 从小到大排序
        usort($intervals, function($a, $b) {
            if ($a[0] > $b[0]) return 1;
            return -1;
        });

        //初始化
        $ret = [];
        $ret[] = [$intervals[0][0], $intervals[0][1]];
        $retIndex = 0;

        //从第二个元素开始比较
        for($i=1; $i<$count; $i++) {
            //元素有重合
            if ($ret[$retIndex][1] >= $intervals[$i][0]) {
                //右边界为两个比较元素的下标1的最大值
                $ret[$retIndex][1] = max($ret[$retIndex][1], $intervals[$i][1]);
            } else {
                //没有重复区间直接插入
                $ret[] = [$intervals[$i][0],$intervals[$i][1]];
                $retIndex++;
            }
        }
        return $ret;
    }
}