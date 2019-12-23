<?php 

class Heap
{
	public $arr;
	public $flag;


	public function __construct($arr, $flag)
	{
		$this->arr = $arr;
		$this->flag = $flag;
	}

	public function main() 
	{
		switch ($this->flag) {
			case 'min':
				return $this->minHeap();
			case 'max':
				return $this->maxHeap();
		}
	}

	public function minHeap()
	{

	}


	public function maxHeap()
	{

	}
}