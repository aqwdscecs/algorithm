<?php
global $hash;
//Init module if you need
function Init(){
    global $hash;
    $hash = [];
}
//Insert one char from stringstream
function Insert($ch)
{
    // write code here
    global $hash;
    if(isset($hash[$ch])){
        $hash[$ch] ++;
    }else{
        $hash[$ch] = 1;
    }
}
//return the first appearence once char in current stringstream
function FirstAppearingOnce()
{
    // write code here
    global $hash;
    foreach($hash as $k=>$v){
        if($v == 1){
            return $k;
        }
    }
    return "#";
}
