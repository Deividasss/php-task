<?php
function printAssociativeArrayAsTable($array)
{
    $columnWidths = array();
    foreach ($array as $item) {
        foreach ($item as $key => $value) {
            $columnWidths[$key] = max(strlen($key), isset($columnWidths[$key]) ? $columnWidths[$key] : 0, strlen($value));
        }
    }

    printTableRow(array_keys(reset($array)), $columnWidths);

    printTableSeparator($columnWidths);

    foreach ($array as $item) {
        printTableRow($item, $columnWidths);
    }
}

function printTableRow($row, $columnWidths)
{
    $rowString = "|";
    foreach ($row as $key => $value) {
        $width = isset($columnWidths[$key]) ? $columnWidths[$key] : 0;
        $rowString .= " " . str_pad($value, $width) . " |";
    }
    echo $rowString . "<br>";
}

function printTableSeparator($columnWidths)
{
    $separator = "+";
    foreach ($columnWidths as $columnWidth) {
        $separator .= str_repeat("-", $columnWidth + 2) . "+";
    }
    echo $separator . "<br>";
}

$array = array(
    array(
        'Name' => 'Trikse',
        'Color' => 'Green',
        'Element' => 'Earth',
        'Likes' => 'Flowers'
    ),
    array(
        'Name' => 'Vardenis',
        'Element' => 'Air',
        'Likes' => 'Singing',
        'Color' => 'Blue'
    ),
    array(
        'Element' => 'Water',
        'Likes' => 'Dancing',
        'Name' => 'Jonas',
        'Color' => 'Pink'
    )
);

printAssociativeArrayAsTable($array);
