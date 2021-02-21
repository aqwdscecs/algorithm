<?php

class LRUCache {
    public $hashMap;
    public $k;
    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->k = $capacity;
        $this->hashMap = [];
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if (!isset($this->hashMap[$key])){
            return -1;
        }
        $getVal = $this->hashMap[$key];
        unset($this->hashMap[$key]);
        $this->hashMap = [$key => $getVal] + $this->hashMap;

        return $getVal;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        unset($this->hashMap[$key]);
        $addArr = [$key => $value];
        $this->hashMap = $addArr + $this->hashMap;
        // var_dump($this->hashMap);
        if (count($this->hashMap) > $this->k) {
            array_pop($this->hashMap);
            // var_dump($this->hashMap);
            // var_dump(1);exit;
        }
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */.