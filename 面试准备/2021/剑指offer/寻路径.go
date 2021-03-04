/*

请设计一个函数，用来判断在一个矩阵中是否存在一条包含某字符串所有字符的路径。路径可以从矩阵中的任意一格开始，每一步可以在矩阵中向左、右、上、下移动一格。如果一条路径经过了矩阵的某一格，那么该路径不能再次进入该格子。例如，在下面的3×4的矩阵中包含一条字符串“bfce”的路径（路径中的字母用加粗标出）。
[["a","b","c","e"],
["s","f","c","s"],
["a","d","e","e"]]
但矩阵中不包含字符串“abfb”的路径，因为字符串的第一个字符b占据了矩阵中的第一行第二个格子之后，路径不能再次进入这个格子。

示例 1：
输入：board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "ABCCED"
输出：true

示例 2：
输入：board = [["a","b"],["c","d"]], word = "abcd"
输出：false

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/ju-zhen-zhong-de-lu-jing-lcof
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
*/


/*
### 解题思路
1. 遍历所有元素为入口点, 若查找中匹配到路径终止
2. 判断当前元素是否和当前查找路径相同(第k个路径站点 和 当前元素值 是否相同)
    1. 如果相同**将当前元素值更新为已访问的标识**分别匹配当前元素的上下左右相邻元素是否和下一路径站点匹配(**深度优先递归**第k+1个路径站点 和 上/下/左/右元素值 相同)
    2. 如果不相同 则当前路径查找失败** 将当前节点恢复到未访问之前值 **向上弹出(**回溯** 因为递归结束 依次弹出栈 相当于有记忆功能)
3. 如果当前访问的k值比搜索路径长度长  那么表示路径匹配成功  返回成功

**递归的栈弹出可以实现恢复现场(重置访问路径)**
### 代码
*/

func exist(board [][]byte, word string) bool {
    //逐个比较入口元素
    for row:=0; row<len(board); row++ {
        for col:=0; col<len(board[0]); col++ {
            if dfs(board, row, col, word, 0) {
                return true
            }  
        }
    } 

    return false
}


func dfs(board [][]byte, row int, col int, word string, wordIndex int) bool {
    //入口元素wordIndex为0  如果wordIndex为寻找路径长度 那么已经匹配到 返回true即可
    if ( wordIndex == len(word)) {
        return true
    }

    //行列元素防止越界  在上一元素的上下左右元素越界判断                               
    if (row > (len(board)-1) || col > (len(board[0])-1) || col < 0 || row < 0 || 
        //当前元素值是否和当前查找字符相同
        board[row][col] != word[wordIndex]) { 
        return false
    }

    //临时保存当前元素值  再更新当前访问元素值为空(即已访问过)
    tmp := board[row][col]
    board[row][col] = ' '

    //继续向当前元素上下左右搜索 匹配下一路径是否存在
    if dfs(board, row-1, col, word, wordIndex+1) ||  //上 
       dfs(board, row+1, col, word, wordIndex+1) ||  //下
       dfs(board, row, col-1, word, wordIndex+1) ||  //左
       dfs(board, row, col+1, word, wordIndex+1) {//右 
        return true //存在返回
    } 

    //未匹配到 
    board[row][col] = tmp  //不存在先将当前访问元素值恢复原值（当前路径匹配失败  将访问过元素恢复原值）
    return false
}