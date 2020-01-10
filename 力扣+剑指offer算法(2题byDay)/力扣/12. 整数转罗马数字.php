<?php

class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num) {
        

        if (!$num) return 0;
            $numsDict = [1000,900,500,400,100,90,50,40,10,9,5,4,1 ];
            $dict = ["M", "CM", "D","CD","C","XC","L","XL","X", "IX", "V", "IV", "I" ];

        $retStr = '';
        $index = 0;
        while ($num) {
            if ($num >= $numsDict[$index]) {
                $retStr .= $dict[$index];
                $num -= $numsDict[$index];
            } else {
                $index++;
            }
        }
        return $retStr;
    }
}
