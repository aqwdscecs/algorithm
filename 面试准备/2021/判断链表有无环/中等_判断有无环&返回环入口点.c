/**
 * struct ListNode {
 *	int val;
 *	struct ListNode *next;
 * };
 */

/**
 * 
 * @param head ListNode类 
 * @return bool布尔型
 */

/*
   a: 起点到环入口
   b: 快慢指针相遇地方
   c: 相遇地方距入口距离

   快慢指针公式： 快 = 2*慢
                 a + b + c + b = 2 * (a+b)
   化简得：       c = a
   即：          相遇地方距入口距离 = 起点到环入口



   思路： 快慢指针判断是否有环   相遇后一新节点从起始点走  慢指针继续从相遇节点走 
          慢指针和新节点相遇 即为环入口节点
*/
#include <stdbool.h>
bool hasCycle(struct ListNode* head ) {
    // write code here
    if (head == NULL) {
        return false;
    }
    
    struct ListNode *fastNode = head, *slowNode = head;
    
    while(fastNode != NULL && fastNode->next != NULL) {
        fastNode = fastNode->next->next;
        slowNode = slowNode->next;
        
        //相遇
        if (fastNode == slowNode) {
            struct ListNode *startNode = head;
            while(slowNode != startNode) {
                startNode = startNode->next;
                slowNode  = slowNode->next;
            }
            return startNode;        
        }
    }
    
    return false;
}