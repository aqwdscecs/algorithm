<?php
/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function deleteDuplication($pHead)
{
    // write code here
    if ($pHead == null || $pHead->next == null) return $pHead;
    
    $curPoint = $pHead;
    if ($pHead->val == $pHead->next->val) {
        $curPoint = $pHead->next->next;
        while ($curPoint!=null && $curPoint->val==$pHead->val)
            $curPoint = $curPoint->next;
        return deleteDuplication($curPoint);
    } else {
        $curPoint = $pHead->next;
        $pHead->next = deleteDuplication($curPoint);
        return $pHead;
    }
}