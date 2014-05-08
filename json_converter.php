<?php

$file = 'OpenData_Miltieregisters_Gemeente_Ede_1812_1919_CSV_25022014_01.csv';

$data = array();
if (($handle = fopen($file, "r")) !== FALSE) {
    while (($line = fgetcsv($handle, 1000, "\t")) !== FALSE) {
		$data[] = $line;
    }
    fclose($handle);
}

$finaldata = array();
foreach ($data as $idx => $entry) {
    if ($idx) {
        $tmp = array();
        foreach ($entry as $i => $item) {
            if ($i > 2)
                $tmp[$data[0][$i]] = $item;
        }
        $finaldata[] = $tmp;
    }
}

file_put_contents($file.'.json', json_encode($finaldata));

print_r($finaldata);