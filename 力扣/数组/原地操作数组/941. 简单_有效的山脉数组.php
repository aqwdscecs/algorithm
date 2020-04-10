<?php



class Solution {

    /**
     * @param Integer[] $A
     * @return Boolean
     */
    function validMountainArray($A) {
        $len = count($A);
        if($len <3)  return false;
        for($i=1; $i<$len; $i++){
             if($A[$i] == $A[$i+1]) return false;
             if ($A[$i-1] >$A[$i]) break;
        }
        if ($i==$len || $i==1) return false;
        for($j=$i; $j<$len; $j++) {
             if($A[$j] >= $A[$j-1]) return false;
        }
        return true;
    }
}
