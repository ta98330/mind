<?php

$csv_header = array(
    'rep' => $rep,'datetime' => $datetime,'bfaf' => $bfaf,'ang' => $ang,'sad' => $sad,'anxiety' => $anxiety,'joy' => $joy,'stress' => $stress
  );

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=data.csv');

    $stream = fopen('php://output', 'w');
    fputcsv($stream, $csv_header);

    foreach($assoc_data as $key => $assoc_row){
        $numeric_row = array();
        foreach ($csv_header as $header_name) {
            mb_convert_variables('SJIS-win', 'UTF-8', $assoc_row[$header_name]);
            $numeric_row[] = $assoc_row[$header_name];
        }
        fputcsv($stream, $numeric_row);
    }