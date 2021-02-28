/**设 数组左右两端下标分别为 left、right, 中间元素下标为mid

有：
    `num[mid] > num[right] 我们可以确定mid在左侧数组中`
    `num[mid] < num[right] 我们可以确定mid在右侧数组中`
    `num[mid] = num[right] 这时我们无法确定在哪一侧  我们从右向左收缩范围，即right--，因为这个数还在搜索范围中 num[mid]`

若我们和left相比较
有： 
    `num[mid] > num[left] 此时无法判断mid处于哪一侧数组中,[1,2,3]时处于右侧  [4,5,6,1,2]时处于左侧`
    `num[mid] < num[left] [4,5,1,2,3]此时mid处于[4,5,1,2,3]时处于右侧` 
    `num[mid] = num[left] [4,4,4,0,1]此时处于左侧数组  [4,0,4,4,4]此时处于右侧`

如上分析 得出我们缩小范围的参考值应该是mid 和 right 不断缩小范围来查找
代码如下:
**/
func minArray(numbers []int) int {
    left := 0
    right := len(numbers)-1

    for left < right {
        mid := left + (right - left) / 2
        if (numbers[mid] > numbers[right]) { //最小值在右侧
            left = mid + 1
        } else if (numbers[mid] < numbers[right]) { //最小值在左侧
            right = mid 
        } else {
            right --
        }
    }

    return numbers[left]
}
