<?php



class Solution {

    /**
     * @param Integer[][] $A
     * @return Integer[][]
     */
    function transpose($A) {
        $rowLen = count($A);
        $colLen = count($A[0]);

        $ans = [];

        for($row=0; $row<$rowLen; $row++) {
            for($col=0;$col<$colLen; $col++){
                $ans[$col][$row] = $A[$row][$col];
            }
        }

        return $ans;


    }
}