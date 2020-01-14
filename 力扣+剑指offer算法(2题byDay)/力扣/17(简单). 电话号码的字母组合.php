<?php


//题目描述
//给定一个仅包含数字 2-9 的字符串，返回所有它能表示的字母组合。

// 给出数字到字母的映射如下（与电话按键相同）。注意 1 不对应任何字母。



// 示例:

// 输入："23"
// 输出：["ad", "ae", "af", "bd", "be", "bf", "cd", "ce", "cf"].
// 说明:
// 尽管上面的答案是按字典序排列的，但是你可以任意选择答案输出的顺序。

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/letter-combinations-of-a-phone-number
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

class Solution {

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        
        $len = strlen($digits);

        if (!$len) return array();
        $dict = [
            '2' => ['a','b','c'],
            '3' => ['d','e','f'],
            '4' => ['g','h','i'],
            '5' => ['j','k','l'],
            '6' => ['m','n','o'],
            '7' => ['p','q','r','s'],
            '8' => ['t','u','v'],
            '9' => ['w','x','y','z'],
        ];

        $retArr = [];

        $this->getLetter($dict, $digits, $retArr);
        return $retArr;
    }

    function getLetter(&$dict,$key, &$retArr) 
    {
        if (!$key) return '';
        $this->getLetter($dict, substr($key, 1),  $retArr);

        //首次进来 第一个数字字典直接赋给retArr
        if (empty($retArr)) {
            $retArr = $dict[$key[0]];
            return $retArr;
        }

        //先将之前的retArr保存
        $preArr = $retArr;
        $retArr = [];
        for ($keyNum=0; $keyNum < count($dict[$key[0]]); $keyNum++) {
            
            for ($i = 0; $i < count($preArr); $i++) {
                $retArr[] = $dict[$key[0]][$keyNum] . $preArr[$i];
            }
        }
    }
}
