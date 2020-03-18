<?php
//题目描述
//给定一个数组和滑动窗口的大小，找出所有滑动窗口里数值的最大值。
//  例如，如果输入数组{2,3,4,2,6,2,5,1}及滑动窗口的大小3，
//  那么一共存在6个滑动窗口，他们的最大值分别为{4,4,6,6,6,5}；
//      针对数组{2,3,4,2,6,2,5,1}的滑动窗口有以下6个： {[2,3,4],2,6,2,5,1}， {2,[3,4,2],6,2,5,1}， 
//      {2,3,[4,2,6],2,5,1}， {2,3,4,[2,6,2],5,1}， {2,3,4,2,[6,2,5],1}， {2,3,4,2,6,[2,5,1]}。


//暴力解法 
//时间复杂度O(mn) 空间复杂度O(n+m)
function maxInWindows($num, $size)
{
    // write code here
    if ($size <= 0) return [];
    $arrMaxWindows = [];
    
    $count = count($num);
    
    $temp = [];
    for($i=0; $i <= $count; $i++) {
        //如果窗口值没有满 则先插入
        if(count($temp) < $size) {
            $temp[] = $num[$i];
            continue;
        }

        //开始找当前窗口的最大值
        $max = $temp[0];
        for($getMaxIndex=0; $getMaxIndex<$size; $getMaxIndex++) {
            $max = ($max > $temp[$getMaxIndex]) ? $max : $temp[$getMaxIndex];
        }
        $arrMaxWindows[] = $max;
        array_shift($temp);
        $temp[] = $num[$i];
    }
    return $arrMaxWindows;
}


//可以用双端队列线性时间复杂度实现
function maxInWindows($num, $size)
{
    if ($size == 0)
        return [];
    $list = new \SplDoublyLinkedList();
    $result = [];
    $count = count($num);
    for ($i = 0; $i < $count; $i++) {
        if ($i >= $size && $list->count() > 0 &&  $list->bottom() == $num[$i - $size])
            $list->shift();
        while ($list->count() > 0 && $list->top() < $num[$i])
            $list->pop();
        $list->push($num[$i]);
        $result[] = $list->bottom();
    }
    return array_slice($result, $size - 1);
}

//伪代码
function maxInWindows($num, $size)
{
    if ($size <= 0) return [];

    $dequeue = new SplDequeue();

    $result = [];
    $count = count($num);

    for($i=0; $i<$count; $i++) {
        //从后面依次弹出队列中比当前num值小的元素
        //同时也能保证队列首元素为当前窗口最大值下标
        while (!empty($dequeue) 
             && $num[$dequeue->back] <= $num[$i]
         )
            $dequeue->pop_back();
        //队首元素坐标对应的num不在窗口中，需要弹出
        while (!empty($dequeue)
             && $dequeue->front() < ($i-size()+1)
        )
            $dequeue->pop_front();
        //把每次滑动的num下标加入队列
        $dequeue->push_back($i);
        //当滑动窗口首地址i大于等于size时才开始写入窗口最大值
        if ($i+1 >= $size)
            $result[] = $num[$dequeue->front()];
    }
}