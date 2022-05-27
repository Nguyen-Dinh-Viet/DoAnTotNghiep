<?php

function show_array($data) {
    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}
function get_first_key_of_array($arr) {
    foreach ($arr as $firstKey => $firstValue) {
        return $firstKey;
        break;
        
    }
}
// chuyển đổi ngày theo sql
function change_date_for_sql($date){
    $day = substr($date,0,2);
    $month = substr($date,3,2);
    $year = substr($date,6,4);
    return $year."-".$month."-".$day;
}
