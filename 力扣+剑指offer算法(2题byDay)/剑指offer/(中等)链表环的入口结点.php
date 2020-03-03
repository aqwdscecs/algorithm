<?php
/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function EntryNodeOfLoop($pHead)
{
    // write code here
    //首先快慢指针找到会和点
    //快指针重新从链表头部 慢指针从回合点 以相同step遍历
    //这时两个指针会和点就是环的入口结点
    
    //数学公式 x表示链头距入口结点距离
    //        y表示环中快慢指针会和点距入口结点距离
    //        z表示会和点距入口结点的剩余距离
    //得：快指针路径 = 2*慢指针路径
    //即: x+2y+z = 2(x+y)
    //化简得：x = z 
    //即 链头距入口距离 等于 会和点距入口剩余距离
    
    //所以我们需要先会和  然后快指针重新指向链头 然后两个再次会和点 就是入口
    
    if ($pHead == null) return null;
    
    $low = $fast = $pHead;
    while ($fast && $fast->next) {
        $fast = $fast->next->next;
        $low = $low->next;
        if ($fast == $low) break;
    }
 
    //不存在环
    if ($fast == null || $fast->next == null) return null;

    $fast = $pHead;
    while ($fast != $low) {
        $fast = $fast->next;
        $low = $low->next;
    }
    return $fast;
}