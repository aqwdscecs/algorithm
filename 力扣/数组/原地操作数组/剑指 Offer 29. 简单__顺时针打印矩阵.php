<?php


/*
输入一个矩阵，按照从外向里以顺时针的顺序依次打印出每一个数字。

示例 1：

输入：matrix = [[1,2,3],[4,5,6],[7,8,9]]
输出：[1,2,3,6,9,8,7,4,5]
示例 2：

输入：matrix = [[1,2,3,4],[5,6,7,8],[9,10,11,12]]
输出：[1,2,3,4,8,12,11,10,9,5,6,7]
 

限制：

0 <= matrix.length <= 100
0 <= matrix[i].length <= 100

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/shun-shi-zhen-da-yin-ju-zhen-lcof
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/

/*
  上下左右依次遍历 每次遍历把对应的t r b l的边界值缩小

  主要对各种条件 或者边界情况需要注意

  O(mn) O(nm)
*/

/*
执行用时：40 ms, 在所有 PHP 提交中击败了93.09%的用户
内存消耗：17.7 MB, 在所有 PHP 提交中击败了100.00%的用户
*/


/*
  思路参考来源: https://leetcode-cn.com/problems/shun-shi-zhen-da-yin-ju-zhen-lcof/solution/mian-shi-ti-29-shun-shi-zhen-da-yin-ju-zhen-she-di/
*/
class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        $row = count($matrix);
        if (!$row) return array();
        $col = count($matrix[0]);

        $t = $l = 0; 
        $b = $row - 1;
        $r = $col - 1;
        
        $res = [];
        while(true) {

           for ($curY=$l; $curY <= $r; $curY++) { #向右 top
               $res[] = $matrix[$t][$curY];
           } 
           if (++$t > $b) break;

           for ($curX=$t; $curX <= $b; $curX++) { #向下 right
               $res[] = $matrix[$curX][$r];
           }
           if (--$r < $l) break;

           for ($curY=$r; $curY >= $l; $curY--) { #向左 behind
               $res[] = $matrix[$b][$curY];
           }
           if ($t > --$b) break;
           for ($curX=$b; $curX >= $t; $curX--) { #向上 left
               $res[] = $matrix[$curX][$l];
           }
           if (++$l > $r) break;
        }
        return $res;
    }

}