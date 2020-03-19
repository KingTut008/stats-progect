<?php

function createDataRow($result) : Array {
    $getHour = date("H", strtotime($result['action_date']));
    $dateRow = array(
        'login' => $result['login'],
        '00' => '0', '01' => '0', '02' => '0', '03' => '0', '04' => '0', '05' => '0', '06' => '0', '07' => '0', '08' => '0', '09' => '0', '10' => '0', '11' => '0',
        '12' => '0', '13' => '0', '14' => '0', '15' => '0', '16' => '0', '17' => '0', '18' => '0', '19' => '0', '20' => '0', '21' => '0', '22' => '0', '23' => '0'
    );
    $dateRow[$getHour] = $dateRow[$getHour] + 1;
    return $dateRow;
}

function createDataArray ($dataQuery){
    $data = array();
    $item = 0;
    while($result = pg_fetch_assoc($dataQuery)) {
        if (isset($data[$item]) && $data[$item]['login'] != $result['login']){
            $item++;
        }
        if(!isset($data[$item])){
            array_push($data, createDataRow($result));        
        } else {
            $data[$item][date("H", strtotime($result['action_date']))]++;
        }
    }
    return $data;  
} 