/*

给定单向链表的头指针和一个要删除的节点的值，定义一个函数删除该节点。
返回删除后的链表的头节点。
注意：此题对比原题有改动

示例 1:
输入: head = [4,5,1,9], val = 5
输出: [4,1,9]
解释: 给定你链表中值为 5 的第二个节点，那么在调用了你的函数之后，该链表应变为 4 -> 1 -> 9.

示例 2:
输入: head = [4,5,1,9], val = 1
输出: [4,5,9]
解释: 给定你链表中值为 1 的第三个节点，那么在调用了你的函数之后，该链表应变为 4 -> 5 -> 9.

*/


/*
	双指针:
	1. 头结点为查找结点 直接返回头结点的下一结点
    2. 其他情况：pre为上一结点   cur为当前结点  若cur.Val == val  直接改变上一结点指向的下一节点地址即可删除当前查找的结点
*/
/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func deleteNode(head *ListNode, val int) *ListNode {
    if head.Val == val {
        return head.Next
    }

    pre := head
    cur := head.Next 

    for cur != nil {
        if cur.Val == val {
            pre.Next = cur.Next
            return head
        }
        pre = cur
        cur = cur.Next
    }

    return head
}

