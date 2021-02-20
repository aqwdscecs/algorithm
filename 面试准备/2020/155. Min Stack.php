<?php

/*
Design a stack that supports push, pop, top, and retrieving the minimum element in constant time.

push(x) -- Push element x onto stack.
pop() -- Removes the element on top of the stack.
top() -- Get the top element.
getMin() -- Retrieve the minimum element in the stack.
 

Example 1:

Input
["MinStack","push","push","push","getMin","pop","top","getMin"]
[[],[-2],[0],[-3],[],[],[],[]]

Output
[null,null,null,null,-3,null,0,-2]

Explanation
MinStack minStack = new MinStack();
minStack.push(-2);
minStack.push(0);
minStack.push(-3);
minStack.getMin(); // return -3
minStack.pop();
minStack.top();    // return 0
minStack.getMin(); // return -2

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/min-stack
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

*/



/*解法一： 双栈  一个正常插入元素的栈  另一个是最小栈  正常栈每层的最小值 和最小栈一一对应
		即先插入元素进正常栈    查出当前最小值并入 最小栈

		时空复杂度O(1) O(2n)
*/
class MinStack {
    /**
     * initialize your data structure here.
     */
    public $stack = [];
    public $minStack = [];

    function __construct() {
        $this->minStack[] = PHP_INT_MAX;
    }
  
    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        array_push($this->stack, $x);
        #最小栈 栈顶即为当前最小值  入栈 只需要和栈顶比较即可
        array_push($this->minStack, min(end($this->minStack), $x));
    }
  
    /**
     * @return NULL
     */
    function pop() {
        array_pop($this->stack);
        array_pop($this->minStack);
    }
  
    /**
     * @return Integer
     */
    function top() {
        return end($this->stack);
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        return end($this->minStack);
    }
}


/*
解法二 ： 解法一最小栈中存在多个重复数  我们将不更新最小值的不用入栈  优化了空间使用
			时空复杂度 O（1)   <O(2n)
*/
class MinStack {
    /**
     * initialize your data structure here.
     */
    public $stack = [];
    public $minStack = [];

    function __construct() {
        $this->minStack[] = PHP_INT_MAX;
    }
  
    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x) {
        array_push($this->stack, $x);
        

        # 正常栈入栈值 小于等于 最小栈栈顶时  入最小栈
        $minTop = end($this->minStack);
        if ($minTop >= $x) {
            array_push($this->minStack, $x);
        }
    }
  
    /**
     * @return NULL
     */
    function pop() {
        $stackTop = end($this->stack);
        array_pop($this->stack);
        
        # 正常栈出栈值 小于等于 最小栈栈顶时  最小栈也弹出
        if ($stackTop <= end($this->minStack)) {
            array_pop($this->minStack);
        }
    }
  
    /**
     * @return Integer
     */
    function top() {
        return end($this->stack);
    }
  
    /**
     * @return Integer
     */
    function getMin() {
        return end($this->minStack);
    }
}