/*
输入一个链表，输出该链表中倒数第k个节点。为了符合大多数人的习惯，本题从1开始计数，即链表的尾节点是倒数第1个节点。
例如，一个链表有 6 个节点，从头节点开始，它们的值依次是 1、2、3、4、5、6。这个链表的倒数第 3 个节点是值为 4 的节点。

示例：
给定一个链表: 1->2->3->4->5, 和 k = 2.
返回链表 4->5.
*/


/*双指针  - 快指针走k步(中间访问到尾结点直接跳出)   k步之后  快慢指针同时走 当快节点访问到尾部空指针时  慢指针刚好访问到倒数第k个节点*/
/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */

 //时间复杂度O(n)
 //空间复杂度O(1)
func getKthFromEnd(head *ListNode, k int) *ListNode {
    if (head == nil) {
        return nil
    }

    cur , fast := head, head

    for (fast != nil) && (k > 0) {
        fast = fast.Next
        k--
    }

    for (fast != nil) {
        fast = fast.Next
        cur = cur.Next
    }

    return cur
}