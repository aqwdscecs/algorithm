<?php
declare(strict_types=1);
function sum($a, $b): int {
    return $a + $b;
}

// Note that a float will be returned.
var_dump(sum(1.2, 2.3));
?>