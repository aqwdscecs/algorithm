<?php

class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $rev = 0;

        $max = pow(2,31)-1;
        $min = pow(-2,31);
        
        while ($x != 0) {
            $pop = $x % 10;
            $x = intval($x / 10);
            
            //溢出
            if ( ($rev > intval($max/10) ) || 
                 ($rev == intval($max/10) && $pop == 7)) 
                return 0;
            if ( ($rev < intval($min/10) ) || 
                ($rev == intval($min/10) && $pop == 8)) 
                return 0;

            $rev = $rev * 10 + $pop;
        }
        return $rev;
    }
}