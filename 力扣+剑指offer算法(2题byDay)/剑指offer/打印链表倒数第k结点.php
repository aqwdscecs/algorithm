<?php
/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function FindKthToTail($head, $k)
{
	/*
	 * 思路：两个结点间隔$k-1 这里需要注意倒数k 和两个结点跨度length之间的值
	 *  1.先让前面结点走k-1
	 *  2.两个结点同时走 当前面结点走到尾节点时  后面结点就是需要打印的值
	 *  
	 *  理清思路 注意边界和异常情况处理
	 */
    // write code here
    //异常情况/边界情况
    //1.链表为空
    if ($head === NULL) {
        return $head;
    }
    //2. k <= 0 
    if (!($k> 0)) return null;
    //放置跨度为k的两个结点，向下遍历访问，前面结点访问到尾节点时，后面的结点就是查找结点
    $preNode = $behindNode = $head;
    $length = 1;
    while ($preNode->next && $length < $k) {
        $preNode = $preNode->next;
        $length++;
    }
    //链表总长度 小于 k
    if ($length < $k && !$preNode->next) return null;
    while (isset($preNode->next)) {
        $preNode = $preNode->next;
        $behindNode = $behindNode->next;
    }
    return $behindNode;
}