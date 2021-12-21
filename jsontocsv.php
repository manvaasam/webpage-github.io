<?php
header("Access-Control-Allow-Origin: *");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $csv = "makaan.csv";
    $file_pointer = fopen($csv, 'w');
    $keys = array_keys($data[0]);
    fputcsv($file_pointer, $keys);
    foreach ($data as $row) {
        fputcsv($file_pointer, $row);
    }
    fclose($file_pointer);
    echo "done";
}
