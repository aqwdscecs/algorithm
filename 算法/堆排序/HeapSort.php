<?php

class Heap 
{

	private function heapSwap(&$var1, &$var2)
	{
		$temp = $var1;
		$var1 = $var2;
		$var2 = $temp;

	}
	//堆向下调整  POPK之后最后一个节点变为第一个  需要向下调整堆
	public function heapAdjustDown(&$tree, $indexNode, $len = null)
	{
		
		$len = (null === $len) ? count($tree) : $len;;
		if ($len <= $indexNode) return $tree;

		$leftChilden = $indexNode * 2 + 1;
		$rightChilden = $indexNode * 2 + 2;
		$max = $tree[$indexNode];

		if ($len > $leftChilden && $tree[$indexNode] < $tree[$leftChilden]) {
			$max = $tree[$leftChilden];
			$this->heapSwap($tree[$indexNode], $tree[$leftChilden]);
		}
		if ($len > $rightChilden && $max < $tree[$rightChilden]) {
			$max = $tree[$rightChilden];
			$this->heapSwap($tree[$indexNode], $tree[$rightChilden]);
		}
		$this->heapAdjustDown($tree,$leftChilden, $len);
		$this->heapAdjustDown($tree,$rightChilden, $len);

	}
	//建堆 || 插入新节点  需要向上调整
	public function heapAdjustUp(&$tree)
	{
		$len = count($tree);
		$endNode = $len - 1;
		$parent = ($endNode - 1) / 2;
		$indexNode = $parent;

		while ($indexNode >= 0) {
			$this->heapAdjustDown($tree, $indexNode);
			$indexNode--;
		}		
	}

	//堆排序 | PopK  将最大|最小(第一个节点)和最后一个子节点交换
	//并删除尾节点  获取最大|最小值
	public function heapSort(&$tree, $popK)
	{
		$treeLen = count($tree);
		//当前获取的第几大|小 元素
		$getPopK = $popK;

		//首先进来进行建堆 |  后期可以优化 通过传入参数 如果已是有序堆 则不用重建
		$this->heapAdjustUp($tree);

		$retArr = array();
		while( $getPopK ) {
			//将顶堆和尾节点交换
			$this->heapSwap($tree[0], $tree[$treeLen-1]);

			//除尾节点的元素进行向下调整  如果第getPopK小 那么 除(尾节点+getPopK)进行调整
			$this->heapAdjustDown($tree, 0, $treeLen-2);

			//并将每次的尾节点赋给retArr进行返回
			$retArr[] = $tree[$treeLen - 1];
			//每popK 交换一次  需要调整的整个树长度减1 
			$treeLen --;
			//需要pop的个数也减1
			$getPopK--;
		}

		return $retArr;
	}
}
$test = new TestController();

$arr = array(2, 5, 3, 1, 10, 4);
$len = count($arr);
// $test->heapAdjustDown($arr, 0);
// $test->heapAdjustUp($arr);
$pop1 = $test->heapSort($arr, $len);
// print_r($arr);
// print_r($pop1);