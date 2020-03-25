<?php


class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function waysToStep($n) {

        $first  = 1;
        $second = 2;
        $third  = 4;
        if ($n<=2) return $n;
        if ($n == 3) return 4;

        $mod = 1000000007;
        for($i=4; $i<=$n; $i++) {
            $step   = ($first+$second)%$mod+($third)%$mod;
            $first  = $second;
            $second = $third;
            $third  = $step;
        }
        return $step%1000000007;
    }
}