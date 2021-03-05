/*
输入一个整数数组，实现一个函数来调整该数组中数字的顺序，使得所有奇数位于数组的前半部分，所有偶数位于数组的后半部分。

示例：
输入：nums = [1,2,3,4]
输出：[1,3,2,4] 
注：[3,1,2,4] 也是正确的答案之一。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/diao-zheng-shu-zu-shun-xu-shi-qi-shu-wei-yu-ou-shu-qian-mian-lcof
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/


/*
奇偶指针  奇指针遇见偶数停下   偶指针遇见奇数停下  交换  继续 直到两指针相遇
时空复杂度O(n) O(1)
*/
func exchange(nums []int) []int {
    left := 0
    right := len(nums)-1

    for left < right {
        for (nums[left] &1 == 1)&& (left<right) {
            left++
        } 
        for (nums[right]&1 == 0) && left < right  {
            right--
        }
        nums[left], nums[right] = nums[right],nums[left]
    } 

    return nums
}