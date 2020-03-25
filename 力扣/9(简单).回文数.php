<?php


class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */

    //O(n/2) = O(n) 空间复杂度O(n)
    function isPalindrome($x) {
      $str = "$x";
      $len = strlen($str);
      if ($len <= 1) return true;

      if ( (($len -1) % 2) == 0) //奇数个
      {
      	$mid = ($len-1) /2;
      	$left = $mid - 1;
      	$right = $mid + 1;
      	while ($left >= 0 && $right < $len) {
			if ($str[$left] != $str[$right]) return false;  
            $left--;
            $right++;    		
      	}
      } else { //偶数
      	$left = intval(($len - 1) / 2);
      	$right = intval(($len - 1) / 2) + 1;
      	while ($left >=0 && $right < $len) {
      		if ($str[$left] != $str[$right]) return false;
            $left--;
            $right++;
      	}
      }
      return true;
    }

    //O(n)  
    function isPalindrome($x) {
    	if ($x < 0 || ($x % 10 == 0 && $x != 0)) return false;

    	$rev = 0;
    	// $x == $rev (偶数) || $x < $rev (奇数)
    	while ($x > $rev) {
    		$rev = $rev * 10 + ($x%10);
    		$x /= 10;
    	}

    	return $x == $rev || $x == intval($rev/10);
    }

    //库函数
    function isPalindrome($x) {
    	$str = "$x";
    	return $str == strrev($str);
    }
}