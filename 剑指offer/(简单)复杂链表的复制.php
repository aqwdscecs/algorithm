<?php
/*class RandomListNode{
    var $label;
    var $next = NULL;
    var $random = NULL;
    function __construct($x){
        $this->label = $x;
    }
}*/

//while循环赋值
function MyClone($pHead)
{
    // write code here
    if ($pHead == null) return null;
    
    $newNode = new RandomListNode($pHead->label);
    //链表结点为1个的情况
    //$newNode->next = $pHead->next;
    $newNode->random = $pHead->random;
    $curNewListNode = $newNode;
    
    $curNode = $pHead;
    //null 和 isset的联系
    while($curNode->next) {
        $curNode = $curNode->next;
        $tempNode = new RandomListNode($curNode->label);
        $tempNode->next = $curNode->next;
        $tempNode->random = $curNode->random;
        $curNewListNode->next = $tempNode;
        $curNewListNode = $curNewListNode->next;
    }
    return $newNode;
}

//递归(代码简洁)
function MyClone($pHead)
{
    if ($pHead == null) return null;

    $pNewListHead = new RandomListNode($pHead->label);

    $pNewListHead->next = MyClone($pHead->next);
    $pNewListHead->random = $pHead->random;

    return $pNewListHead;
}