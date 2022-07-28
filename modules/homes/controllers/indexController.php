<?php

function construct()
{
    load_model('index');
}
function indexAction()
{
    $data['data_vnd'] = get_all_data_collect_spent_vnd_on_months_in_year();
    $data['data_usd'] = get_all_data_collect_spent_usd_on_months_in_year();
    load_view('homes', $data);
}