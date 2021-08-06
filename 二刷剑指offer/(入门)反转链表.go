/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */

func reverseList(head *ListNode) *ListNode {
    
    var preHead *ListNode = nil
    curHead := head
    for curHead != nil {
        nextHead := curHead.Next

        curHead.Next = preHead
        preHead = curHead
        curHead = nextHead
    }


    return preHead
}

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func reverseList(head *ListNode) *ListNode {
    
    if head == nil || head.Next == nil {
        return head
    }

    newHead := reverseList(head.Next)

    head.Next.Next = head
    head.Next = nil
    return newHead
}
