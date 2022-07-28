<?php
// Lấy dữ liệu thống kê thu chi của các tháng trong năm
function get_all_data_collect_spent_vnd_on_months_in_year()
{
    $query = "SELECT  
    SUM(IF( MONTH(le.date) = '1',le.money, 0 )) as 'Tháng 1',
    SUM(IF( MONTH(le.date) = '2',le.money, 0 )) as 'Tháng 2',
    SUM(IF( MONTH(le.date) = '3',le.money, 0 )) as 'Tháng 3',
    SUM(IF( MONTH(le.date) = '4',le.money, 0 )) as 'Tháng 4',
    SUM(IF( MONTH(le.date) = '5',le.money, 0 )) as 'Tháng 5',
    SUM(IF( MONTH(le.date) = '6',le.money, 0 )) as 'Tháng 6',
    SUM(IF( MONTH(le.date) = '7',le.money, 0 )) as 'Tháng 7',
    SUM(IF( MONTH(le.date) = '8',le.money, 0 )) as 'Tháng 8',
    SUM(IF( MONTH(le.date) = '9',le.money, 0 )) as 'Tháng 9',
    SUM(IF( MONTH(le.date) = '10',le.money, 0 )) as 'Tháng 10',
    SUM(IF(MONTH(le.date) = '11',le.money, 0 )) as 'Tháng 11',
    SUM(IF(MONTH(le.date) = '12',le.money, 0 )) as 'Tháng 12'
    FROM `account` as ac, `ledgers` as le WHERE ac.id = le.account and YEAR(le.date) = YEAR(NOW())
    and MONTH(le.date) BETWEEN '1' and '12' and ac.currency ='1'
       GROUP by le.spend";
    $data = db_fetch_array($query);

    return $data;
}
// Lấy dữ liệu thống kê thu chi của các tháng trong năm
function get_all_data_collect_spent_usd_on_months_in_year()
{
    $query = "SELECT 
    SUM(IF( MONTH(le.date) = '1',le.money, 0 )) as 'Tháng 1',
    SUM(IF( MONTH(le.date) = '2',le.money, 0 )) as 'Tháng 2',
    SUM(IF( MONTH(le.date) = '3',le.money, 0 )) as 'Tháng 3',
    SUM(IF( MONTH(le.date) = '4',le.money, 0 )) as 'Tháng 4',
    SUM(IF( MONTH(le.date) = '5',le.money, 0 )) as 'Tháng 5',
    SUM(IF( MONTH(le.date) = '6',le.money, 0 )) as 'Tháng 6',
    SUM(IF( MONTH(le.date) = '7',le.money, 0 )) as 'Tháng 7',
    SUM(IF( MONTH(le.date) = '8',le.money, 0 )) as 'Tháng 8',
    SUM(IF( MONTH(le.date) = '9',le.money, 0 )) as 'Tháng 9',
    SUM(IF( MONTH(le.date) = '10',le.money, 0 )) as 'Tháng 10',
    SUM(IF(MONTH(le.date) = '11',le.money, 0 )) as 'Tháng 11',
    SUM(IF(MONTH(le.date) = '12',le.money, 0 )) as 'Tháng 12'
    FROM `account` as ac, `ledgers` as le WHERE ac.id = le.account and YEAR(le.date) = YEAR(NOW())
    and MONTH(le.date) BETWEEN '1' and '12' and ac.currency ='2'
       GROUP by le.spend";
    $data = db_fetch_array($query);

    return $data;
}