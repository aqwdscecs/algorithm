<?php

//题目描述
// 链接：https://www.nowcoder.com/questionTerminal/c61c6999eecb4b8f88a98f66b273a3cc?f=discussion
// 来源：牛客网

// 请设计一个函数，用来判断在一个矩阵中是否存在一条包含某字符串所有字符的路径。路径可以从矩阵中的任意一个格子开始，每一步可以在矩阵中向左，向右，向上，向下移动一个格子。如果一条路径经过了矩阵中的某一个格子，则该路径不能再进入该格子。 例如
//     [['A','B','C','E'],
//      ['S','F','C','S'],
//      ['A','D','E','E']];

//    矩阵中包含一条字符串"bcced"的路径，但是矩阵中不包含"abcb"路径，因为字符串的第一个字符b占据了矩阵中的第一行第二个格子之后，路径不能再次进入该格子。


//时间复杂度O(nm) 空间复杂度O(m+n)
function hasPath($matrix, $rows, $cols, $path)
{
    // write code here
    $pathLen = strlen($path);
    if (!$path) return true;

    //这行是因为用例传入的一维 需要转换为二维
    $matrix = array_chunk(str_split($matrix), $cols);
    
    $usedMap = array_fill(0, $rows, array_fill(0, $cols, 0));

    for($i=0; $i < $rows; $i++) {
        for ($j=0; $j < $cols; $j++) {
            if ($path[0] == $matrix[$i][$j]) {

                //找到首元素匹配字符
                $boolFind = getChildPath($matrix, $i, $j, $path, $usedMap);
                //返回为真直接跳出，否则继续找
                if ($boolFind) return true;
                
                continue;
            }
        }
    }
    return false;
} 

function getChildPath(&$matrix, $rowIndex, $colIndex, $str, $usedMap)
{
    if ( !isset($matrix[$rowIndex][$colIndex])      //越界
         || $matrix[$rowIndex][$colIndex] != $str[0] //不相等
         || $usedMap[$rowIndex][$colIndex] == 1     //已访问
       )
        return false;

    if (strlen($str) == 1) 
        return true;    
    
    //到这里肯定为在界内，并且当前值相等, 并且没有访问过
    $usedMap[$rowIndex][$colIndex] = 1;
    $subStr = substr($str, 1);

    //上
    $boolUp    = getChildPath($matrix, $rowIndex-1, $colIndex,  $subStr, $usedMap);
    //下
    $boolDown  = getChildPath($matrix, $rowIndex+1, $colIndex,  $subStr, $usedMap);
    //左
    $boolLeft  = getChildPath($matrix, $rowIndex,   $colIndex-1, $subStr, $usedMap);
    //右
    $boolRight = getChildPath($matrix, $rowIndex,   $colIndex+1, $subStr, $usedMap);
    
    return ($boolUp || $boolDown || $boolLeft || $boolRight);
}

$arr = [
    ['A','B','C','E'],
    ['S','F','C','S'],
    ['A','D','E','E'],
];

$path = "ABCB";

print(hasPath($arr, 3, 4, $path));