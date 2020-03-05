<?php

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/


//前序第一个元素为当前树的根节点， 然后再到中序中找其根节点的位置，前半部分即为左子树
//通过中序找到的根节点  其[0,index-1]为其左子树范围，即 前序中的[1,index]范围
//从[1,index]的首元素即为当前左子树的根节点  也为上面[0,len]的前序首元素的左孩子

//然后继续向下递归，找齐子树中的左右孩子，通过划分范围

//时间复杂度O(n) 空间复杂度(2n) /*递归深度n  每个层次new一个节点 n*/
function reConstructBinaryTree($pre, $vin)
{
    // write code here
     if (!empty($pre) && !empty($vin)) {
        $root  = new TreeNode($pre[0]);
        $index = array_search($pre[0], $vin);
        
        
        //数组范围 pre->[1,index]  vin->[0,index-1] 而在物理序列(array_slice)即为index  所以↓↓↓为index 实际为index-1
        $root->left = reConstructBinaryTree(array_slice($pre,1,$index), array_slice($vin,0,$index));
        $root->right = reConstructBinaryTree(array_slice($pre,$index + 1), array_slice($vin,$index + 1));
        return $root;
    }
}                                       