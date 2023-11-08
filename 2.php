<?php
function calculateSum($arr) {
    $sum = 0;
    foreach ($arr as $num) {
        $sum += $num;
    }
    return $sum;
}

function findMax($arr) {
    $max = $arr[0];
    foreach ($arr as $num) {
        if ($num > $max) {
            $max = $num;
        }
    }
    return $max;
}

function findMin($arr) {
    $min = $arr[0];
    foreach ($arr as $num) {
        if ($num < $min) {
            $min = $num;
        }
    }
    return $min;
}

$numbers = [10, 5, 8, 14, 2, 7];

$sum = calculateSum($numbers);
echo "Sum of the numbers: $sum<br>";
$max = findMax($numbers);
echo "Maximum value: $max<br>";
$min = findMin($numbers);
echo "Minimum value: $min<br>";
?>
