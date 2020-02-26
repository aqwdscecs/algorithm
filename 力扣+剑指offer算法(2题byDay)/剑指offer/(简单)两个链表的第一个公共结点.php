<?php
/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/

//公共结点为Y型   也有可能不存在 需要考虑进去
//先各自遍历一次 统计长度
//将较长的链表走len1-len2步
//两个同时继续再向下走  中间若有结点相同的 则返回该结点(公共结点)

//也有可能不存在，返回null

//时间复杂度O(3n) 空间复杂度O(1)
function FindFirstCommonNode($pHead1, $pHead2)
{
    // write code here
    $len1 = $len2 = 0;
    $p1 = $pHead1;
    $p2 = $pHead2;

    while(!is_null($p1)) {
        $len1++;
        $p1 = $p1->next;
    }
    while (!is_null($p2)) {
        $len2++;
        $p2 = $p2->next;
    }

    $step = abs($len1 - $len2);
    
    $searchNode = $len1 > $len2 ? $pHead1 : $pHead2;
    while ($step) {
        $searchNode = $searchNode->next;
        $step--;
    }

    $startNode = $len1 <= $len2 ? $pHead1 : $pHead2;

    while (!is_null($searchNode) && !is_null($startNode)) {

        if ($startNode == $searchNode) return $searchNode;
        
        $startNode = $startNode->next;
        $searchNode = $searchNode->next;
    }
    return null;

}
