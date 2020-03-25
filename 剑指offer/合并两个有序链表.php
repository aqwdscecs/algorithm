<?php
/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function Merge($pHead1, $pHead2)
{
    // write code here
    $retHead = null;;
    
    //边界判断
    if ($pHead1 == null) return $pHead2;
    if ($pHead2 == null) return $pHead1;
    
    //返回头结点确定
    if ($pHead1->val <$pHead2->val) {
        $retHead = $pHead1;
        $pHead1 = $pHead1->next;
    } else {$retHead = $pHead2;
        $retHead = $pHead2;
        $pHead2 = $pHead2->next;
    }
    
    $curNode = $retHead;
    
    while ($pHead1 && $pHead2) {
        if ($pHead1->val < $pHead2->val) {
            $curNode->next = $pHead1;
            $curNode = $curNode->next;
            $pHead1 = $pHead1->next;
            continue;
        }
        $curNode->next = $pHead2;
        $curNode = $curNode->next;
        $pHead2 = $pHead2->next;
        continue;
    }
    //剩余链表结点接上
    if (!$pHead1) $curNode->next = $pHead2;
    if (!$pHead2) $curNode->next = $pHead1;
    
    return $retHead;
    
}