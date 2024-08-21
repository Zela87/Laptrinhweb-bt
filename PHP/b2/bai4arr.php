<?php
function findMax($arr) {
    return max($arr);
}

function findMin($arr) {
    return min($arr);
}

function calculateSum($arr) {
    return array_sum($arr);
}

function sortArray(&$arr) {
    sort($arr);
}

// function checkElementExists($arr, $element) {
//     return in_array($element, $arr);
// }

function isPrime($num) {
    if ($num < 2) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function isEven($num) {
    return $num % 2 == 0;
}
?>
