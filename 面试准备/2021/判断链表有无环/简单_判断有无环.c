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
        
        if (fastNode == slowNode) {
            return true;
        }
    }
    
    return false;
}