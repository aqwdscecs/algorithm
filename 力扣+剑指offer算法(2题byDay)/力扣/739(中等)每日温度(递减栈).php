<?php 

// 第一版  --------------------------和冒泡类似，在其基础上增加了当前结点和上一节点的判断优化
class Solution {

    /**
     * @param Integer[] $T
     * @return Integer[]
     */


    function dailyTemperatures($T) {


        $findIndex = 0;

        $len = count($T);

        for ($curIndex=0; $curIndex < $len; $curIndex++ ) {
            //第一个元素查找时
            if ($curIndex==0) {
                //返回找到大于当前元素位置和当前元素的距离
                $retLength = $this->findIndex($T, $curIndex,$len);
                $retArr[] = $retLength;
                        
                continue;
            }
            $preValue = $T[$curInde-1];
            //余下元素查找
            //当前元素小于上一元素
            if ($T[$curIndex] < $preValue) {
                //1.如果上一元素存在大于上一元素的值 
                //那么当前元素查找应该是从当前元素下一位置遍历到上一查找到的元素
                //如果期间不存在大于当前值的 返回上一查找到的元素
                //如果在这之前找到大于当前元素的则直接返回
                //2.而当没有大于上一元素的值时 那么需要从当前元素的下一位置遍历找大于当前元素的值
                //
                //两个情况结合起来就是从当前元素位置的下一位置遍历后面元素找其大于当前元素的值
                $retLength = $this->findIndex($T, $curIndex, $len);
                $retArr[] = $retLength;
                continue;
            }
            //当前元素等于上一元素
            if ($T[$curIndex] == $preValue){
                //1.将上一元素的等待天数-1放入返回数组
                //2.preValue不变
                
                //如果相同元素没有更大值 则插入0
                if ($retArr[$curIndex-1] == 0) $retArr[] = 0;
                else $retArr[] = $retArr[$curIndex-1] - 1;
                continue;
            } else {
            //当前元素大于上一元素
            //那么上一元素的统计天数一定为1
            //大于当前元素的值必须从 当前元素下一位置开始遍历找
                $retLength  = $this->findIndex($T, $curIndex, $len);
                $retArr[] = $retLength;
                continue;
            }
        }
        return $retArr;
    }
    
    //查找大于第一个元素的值逻辑和当前元素小于上一元素的情况查找逻辑相同
    //所以可以提取出来一个接口
    private function findIndex(&$T,$start,$end)
    {
        $findIndex = $start;
        $length = 1;
        for($index = $start+1; $index < $end; $index++) {
            if($T[$index] > $T[$findIndex]) {
                return $length;
            }
            $length++;
        }
        return 0;
    } 
}

//第二版  ----------------------------在其基础上增加了一些重复最大值判断(因为测试用例的40000个最大值导致代码执行超时)
//可以是最后40000个相同数字的测试用例 提交后提示超出输出限制   35/37

class Solution {

	/**
	 * @param Integer[] $T
	 * @return Integer[]
	 */


	function dailyTemperatures($T) {

		$retArr = [];

		$findIndex = 0;

		$len = count($T);
		$rememberNonePowerNumber = [];

		for ($curIndex=0; $curIndex < $len; $curIndex++ ) {

			if (in_array($T[$curIndex], $rememberNonePowerNumber,$true)) {
				$retArr[] = 0;
				continue;
			}
			if ($curIndex==0) {
				//返回找到大于当前元素位置和当前元素的距离
				$retLength = $this->findIndex($T, $curIndex,$len);
				if ($retLength === 0) {
					$rememberNonePowerNumber[] = $T[$curIndex];
				}
				$retArr[] = $retLength;
				continue;
			}
			//如果之前相同值已经找过一次  并且遍历后没有更大值  则直接插入0  进行下次循环

			$preValue = $T[$curIndex-1];
			//余下元素查找
			//当前元素小于上一元素
			if ($T[$curIndex] < $preValue) {
				//1.如果上一元素存在大于上一元素的值
				//那么当前元素查找应该是从当前元素下一位置遍历到上一查找到的元素
				//如果期间不存在大于当前值的 返回上一查找到的元素
				//如果在这之前找到大于当前元素的则直接返回
				//2.而当没有大于上一元素的值时 那么需要从当前元素的下一位置遍历找大于当前元素的值
				//
				//两个情况结合起来就是从当前元素位置的下一位置遍历后面元素找其大于当前元素的值
				 
				$retLength = $this->findIndex($T, $curIndex, $len);
				if ($retLength === 0 ) {
					$rememberNonePowerNumber[] = $T[$curIndex];
				}
				$retArr[] = $retLength;
				continue;
			}
			//当前元素等于上一元素
			if ($T[$curIndex] == $preValue){
				//1.将上一元素的等待天数-1放入返回数组
				//2.preValue不变

				//如果相同元素没有更大值 则插入0
				$retArr[] = $retArr[$curIndex-1] - 1;
				continue;
			} else {
				//当前元素大于上一元素
				//那么上一元素的统计天数一定为1
				//大于当前元素的值必须从 当前元素下一位置开始遍历找
				$retLength  = $this->findIndex($T, $curIndex, $len);
				if ($retLength === 0 ) {
					$rememberNonePowerNumber[] = $T[$curIndex];
				}
				$retArr[] = $retLength;
				continue;
			}
		}
		return $retArr;
	}

	//查找大于第一个元素的值逻辑和当前元素小于上一元素的情况查找逻辑相同
	//所以可以提取出来一个接口
	private function findIndex(&$T,$start,$end)
	{
		$findIndex = $start;
		$length = 1;
		for($index = $start+1; $index < $end; $index++) {
			if($T[$index] > $T[$findIndex]) {
				return $length;
			}
			$length++;
		}
		return 0;
	}
}

//到这里 我觉得是冒泡的优化吧  对于一些排序中的一些情况判断   
//于是到了解答区看了下思路
//发现偏的离谱了。。。

//   第三版             根据力扣题解   算是根据思路写了下来
//   思想就是递减的栈存储前面数据   
//        栈顶是最小值  如果后面遍历的元素值大于栈顶(最小值) 
//        就把之前的元素距离当前元素的距离放到返回数组中 
//        然后pop依次循环  再把当前元素push进去
//   如果比栈顶元素都小那么直接入栈 (新入栈的成为最小值)  同理  继续向后遍历  时间复杂度O（n）
class Solution {

	/**
	 * @param Integer[] $T
	 * @return Integer[]
	 */
	function dailyTemperatures($T) {

		$len = count($T);

		$stack = [];
		$retArr = array_fill(0, $len, 0);

		//遍历数组
		for ($index = 0; $index < $len; $index++) {
			//如果栈顶元素 小于 当前元素  则先将当前元素下标-栈顶元素下标的值 赋给 栈顶元素下标的返回数组
			while( $T[$index] > $T[end($stack)] && !empty($stack) ) {
				$endIndex = end($stack);
				$retArr[array_pop($stack)] = $index - $endIndex;
			}
			//如果栈顶元素 大于 当前元素 或者栈为空  则直接入栈
			$stack[] = $index;
		}
		return $retArr;
	}
} 