<?php
/*class TreeLinkNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function GetNext($pNode)
{
    // write code here
    if ($pNode == null) return null;
    //Thought:
    //1.pNode->right is exists
    //return pNode->right
    //pNode->next judge is or not root
    if ($pNode->right) {
        $pNode = $pNode->right;
        while ($pNode->left) {
            $pNode = $pNode->left;
        }
        return $pNode;
    }
    //2. pNode->next->left = pNode
    //return pNode->next;
    if ($pNode->next->left == $pNode) return $pNode->next;
    //3. 1> is root
    if (!($pNode->next)) {
        $rightTreeNode = $pNode->right ?? null;
        if (!$rightTreeNode) return null;
        while ($rightTreeNode->left) {
            $rightTreeNode = $rightTreeNode->left;
        }
        return $rightTreeNode;
    }
    //2> pNode->next = pNode->next->next->left
    //return pNode->next->next
    if ($pNode->next == $pNode->next->next->left) {
        return $pNode->next->next;
    }
    //None of the above is true
    //return null (the most of right) end of node
    return null;
    
}

//redundance improve

//all situation have first part of  current node has right child tree
//                   one another situation is find its parent 
//  last situation null is node site the most of right or end of tree node
function GetNext($pNode)
{
    // write code here
    if ($pNode == null) return null;
    
    if ($pNode->right) {
        $pNode = $pNode->right;
        while ($pNode->left) $pNode = $pNode->left;
        return $pNode;
    }
    while ($pNode->next) {
        if ($pNode->next->left == $pNode) return $pNode->next;
        $pNode = $pNode->next;
    }
    return null;
}