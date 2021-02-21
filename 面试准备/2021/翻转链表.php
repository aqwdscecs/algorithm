<?php

/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/

/**
 * 代码中的类名、方法名、参数名已经指定，请勿修改，直接返回方法规定的值即可
 * 
 * @param head ListNode类 
 * @return ListNode类
 */
//非递归 O(1) O(n)
function ReverseList( $head )
{
    // write code here
    if (!$head) return $head;
    $preNode = null;
//     $curNode = $head;
    
    while($head != null) {
        $nextNode = $head->next;
        $head->next = $preNode;
        $preNode = $head;
        $head = $nextNode;
    }
    return $preNode;
}


//递归 O(n) O(n)
function ReverseList( $head )
{
    // write code here
    if(!$head || !$head->next)
        return $pHead; 
                     
    $node = ReverseList($head->next);  
    $head->next->next = $head;         
    $head->next = NULL;               
       
    return $node;   
}