<?php


//题目描述
// 给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。

// 有效字符串需满足：

// 左括号必须用相同类型的右括号闭合。
// 左括号必须以正确的顺序闭合。
// 注意空字符串可被认为是有效字符串。

// 示例 1:

// 输入: "()"
// 输出: true
// 示例 2:

// 输入: "()[]{}"
// 输出: true
// 示例 3:

// 输入: "(]"
// 输出: false
// 示例 4:

// 输入: "([)]"
// 输出: false
// 示例 5:

// 输入: "{[]}"
// 输出: true

// 来源：力扣（LeetCode）
// 链接：https://leetcode-cn.com/problems/valid-parentheses
// 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    //    执行结果：通过
    //    显示详情
    //    执行用时 :8 ms, 在所有 PHP 提交中击败了70.75%的用户
    //    内存消耗 :15.1 MB, 在所有 PHP 提交中击败了39.03%的用户

    function isValid($s) {
        $len = strlen($s);
        if (!$len) return true;
        $stack = new SplStack();
        for ($index = 0; $index < $len; $index++) {
            
            $curCh = $s[$index];
            
            //如果栈元素数量  大于 len 的一半 那么直接返回false
            $countStack = $stack->count();
            if ($countStack > $len) return false;

            if ($curCh == '(' || $curCh == '[' || $curCh == '{') {
            
                $stack->push($curCh);
            
            } else if (!$stack->isEmpty()) {

                $top = $stack->top();
                if ( ($curCh == ')' && $top == '(') || 
                     ($curCh == ']' && $top == '[') ||
                     ($curCh == '}' && $top == '{') ) {
                    
                    $stack->pop();
                
                } else return false;

            } else return false;
        }
        return $stack->isEmpty();
    }
}

$test = new Solution();

$str = "(())))";
print($test->isValid($str));