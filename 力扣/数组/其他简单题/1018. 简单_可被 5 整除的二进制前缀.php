<?php

class Solution {

    /**
     * @param Integer[] $A
     * @return Boolean[]
     */
    function prefixesDivBy5($A) {
        //起始差值 0
        $dValue = 0;
        $curVal = 0;
        $ret = array();
        foreach($A as $k => $val) {
            //计算当前位 
            $curVal = ($curVal<<1) +$val;
            $curVal = $curVal % 5;
            //模5余数
            if ($curVal%5 == 0) $ret[] = true;
            else $ret[] = false;
        }

        return $ret;
    }
}