
<?php

//1. 用map数组统计  如果某个数字次数超过一半  直接返回

function MoreThanHalfNum_Solution($numbers)
{
    // write code here
    $len = count($numbers);
    if ($len < 1) return $numbers;
    
    $arrMap = []; 
    
    for($i = 0; $i < $len; $i++) {
        $arrMap[$numbers[$i]] += 1;
        if ($arrMap[$numbers[$i]] > intval($len/2) ) return $numbers[$i]; 
    }
    return 0;
}

// 2.使用php封装函数array_count_values
function MoreThanHalfNum_Solution($numbers)
{
    $count = floor(count($numbers) / 2);
    $numbers = array_count_values($numbers);
    foreach ($numbers as $key => $number) {
        if ($number >= $count + 1) {
            return $key;
        }
    }
    return 0;
}

//3. 如果有符合条件的数字，则它出现的次数比其他所有数字出现的次数和还要多。
// 在遍历数组时保存两个值：一是数组中一个数字，一是次数。遍历下一个数字时，若它与之前保存的数字相同，则次数加1，否则次数减1；若次数为0，则保存下一个数字，并将次数置为1。遍历结束后，所保存的数字即为所求。然后再判断它是否符合条件即可。

链接：https://www.nowcoder.com/questionTerminal/e8a1b01a2df14cb2b228b30ee6a92163?f=discussion
来源：牛客网

class Solution {
public:
    int MoreThanHalfNum_Solution(vector<int> numbers)
    {
        if(numbers.empty()) return 0;
         
        // 遍历每个元素，并记录次数；若与前一个元素相同，则次数加1，否则次数减1
        int result = numbers[0];
        int times = 1; // 次数
         
        for(int i=1;i<numbers.size();++i)
        {
            if(times == 0)
            {
                // 更新result的值为当前元素，并置次数为1
                result = numbers[i];
                times = 1;
            }
            else if(numbers[i] == result)
            {
                ++times; // 相同则加1
            }
            else
            {
                --times; // 不同则减1               
            }
        }
         
        // 判断result是否符合条件，即出现次数大于数组长度的一半
        times = 0;
        for(int i=0;i<numbers.size();++i)
        {
            if(numbers[i] == result) ++times;
        }
         
        return (times > numbers.size()/2) ? result : 0;
    }
};