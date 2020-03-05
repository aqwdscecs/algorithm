<?php
/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function ReverseList($pHead)
{
    // write code here
    $pre = null;
    while ($pHead!=null) {
        $next = $pHead->next;
        $pHead->next = $pre;
        $pre = $pHead;
        $pHead = $next;
    }
    return $pre;
}



//非递归
function ReverseList($pHead)
{      
    if(!$pHead || !$pHead->next)
        return $pHead;  
                    
    $node = ReverseList($pHead->next);   
    $pHead->next->next = $pHead;          
    $pHead->next = NULL;                
      
    return $node;          
           
}