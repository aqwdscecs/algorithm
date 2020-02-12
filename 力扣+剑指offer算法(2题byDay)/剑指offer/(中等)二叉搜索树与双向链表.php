<?php
/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/


//类似于递归中序 
//在最左找到最小值，修改其结点的左右指向，并把结点赋给prev
//然后找递归结束回到其父节点的递归中，并把prev作为引用修改后给父节点
//父节点将关于和左子树的指向修改好之后再递归其右子树   同上
//结果链表头为最左结点地址
function Convert($pRootOfTree)
{
    // write code here
    if ($pRootOfTree == null) return null;
    $prev = null;
    getSortList($pRootOfTree, $prev);
    
    $res = $pRootOfTree;
    while ($res->left) {
        $res = $res->left;
    }
    return $res;
}

function getSortList($cur, &$prev)
{
    if ($cur == null) return null;
    
    getSortList($cur->left, $prev);
    
    $cur->left = $prev;
    
    if ($prev != null) {
        $prev->right = $cur;
    }
    $prev = $cur;
    getSortList($cur->right,$prev);
}
    