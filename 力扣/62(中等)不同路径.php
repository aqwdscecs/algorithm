<?php

class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */


    //简单版本
    function uniquePaths($m, $n) {
      
        if ($m <= 0 || $n <= 0) return 0;

        if ($m == 1 && $n == 1) return 1;
        if ($m == 2 && $n == 2) return 2;

        $count  = 0;
        $count += $this->uniquePaths($m - 1,$n);
        $count += $this->uniquePaths($m, $n - 1);
        
        return $count;
    }


    //将已经计算过的路径条数存储  减少重复查找次数
    public $arr;
    function uniquePaths($m, $n) {
      
        if ($m <= 0 || $n <= 0) return 0;

        if ($m == 1 && $n == 1) {
          $this->dp[$m][$n] = 1;
          return $this->dp[$m][$n];
        }

        if (isset($this->arr[$m][$n])) return $this->arr[$m][$n];

        $this->arr[$m][$n-1] = $this->uniquePaths($m, $n-1);
        $this->arr[$m-1][$n] = $this->uniquePaths($m-1, $n);
        $this->arr[$m][$n] = $this->arr[$m][$n-1] + $this->arr[$m-1][$n];

        return $this->arr[$m][$n];

    }
}

$test = new Solution();
print($test->uniquePaths(23,12));