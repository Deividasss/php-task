<?php
function splitIntoEqualSumGroups($arr)
{
    $n = count($arr);
    if ($n == 0) {
        return array();
    } elseif ($n == 1) {
        return array($arr);
    }

    $sum = array_sum($arr);
    $targetSum = $sum / 2;
    $currentSum = 0;
    $group = array();
    $result = array();

    foreach ($arr as $value) {
        $currentSum += $value;
        $group[] = $value;

        if ($currentSum == $targetSum) {
            $result[] = $group;
            $group = array();
        } elseif ($currentSum > $targetSum) {
            echo "Cannot split the array into groups with equal sums.";
            return;
        }
    }

    if (!empty($group)) {
        echo "Cannot split the array into groups with equal sums.";
        return;
    }

    return $result;
}

$arr = array(1, 2, 4, 7, 1, 6, 2, 8);
$groups = splitIntoEqualSumGroups($arr);

if (is_array($groups)) {
    foreach ($groups as $group) {
        echo implode(',', $group) . ' = ' . array_sum($group) . "\n";
    }
}
