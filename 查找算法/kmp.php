<?php

class KMP {
    public function setPrefixTable($needle) 
    {
        $len = strlen($needle);
        
        $index = 1;
        $behIndex = 0;

        $prefix[0] = 0;
        while($index < $len) {
            if ($needle[$behIndex] == $needle[$index]) {
                $behIndex++;
                $prefix[$index] = $behIndex;
                $index++;
            } else {
                if ($behIndex > 0) {
                    $behIndex = $prefix[$behIndex-1]
                } else {
                    $behIndex = $prefix[$behIndex];
                    $index++;
                }
            }
        }
    }

    public function findIndex($text, $needle)
    {
        $textLen = strlen($text);
        $prefix = $this->setPrefixTable($needle);
        $needleLen = strlen($needle);
        $needleIndex = $textIndex = 0;
        while ($textIndex < $textLen) {
            if ($needleIndex == $needleLen-1 
                &&$text[$textIndex] == $needle[$needleIndex]) {
                return $textIndex - $needleIndex;
            }

            if ($needle[$needleIndex] == $text[$textIndex]) {
                $textIndex++;
                $needleIndex++;
            } else {
                if ($needleIndex == 0) {
                    $textIndex++;
                }else {
                    $textIndex = $prefix[$textIndex];
                }
            }
        }
        return -1;
    }
}
