<?php
header('Content-type: application/vnd-ms-excel');
// Response.ContentType = "application/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
$filename = "Thong_ke_thu_chi.xls";
header("Content-Disposition:attachment; filename =\"$filename\"");
// require('libraries/Classes/PHPExcel.php');


?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style ="border: 1px solid black">STT</th>
            <th style ="border: 1px solid black">Ngày</th>
            <th style ="border: 1px solid black">Loại thu chi</th>
            <th style ="border: 1px solid black">Thu</th>
            <th style ="border: 1px solid black">Chi</th>
            <th style ="border: 1px solid black">Tàu</th>
            <th style ="border: 1px solid black">Cổ đông</th>
            <th style ="border: 1px solid black">Mô tả</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($data as $item) {
        ?>
            <tr>
                <th scope="row" style ="border: 1px solid black"><?php echo $i ?></th>
                <td style ="border: 1px solid black"><?php $date = date_create($item['date']);
                    echo date_format($date, 'd-m-Y',)  ?></td>
                <td style ="border: 1px solid black"><?php echo $item['cat_name'] ?></td>
                <td style ="border: 1px solid black"><?php if ($item['spend'] == '0') echo number_format($item['money'], 2, ',', ' ') ?></td>
                <td style ="border: 1px solid black"><?php if ($item['spend'] == '1') echo number_format($item['money'], 2, ',', ' ') ?></td>
                <td style ="border: 1px solid black"><?php if ($item['name_ship'] != null) echo $item['name_ship'] ?></td>
                <td style ="border: 1px solid black"><?php if ($item['user_fname'] != null) echo ($item['user_lname'] . " " . $item['user_mname'] . " " . $item['user_fname']) ?></td>
                <td style ="border: 1px solid black"><?php echo $item['des'] ?></td>
            </tr>
        <?php
            $i = $i + 1;
        }
        ?>
    </tbody>
</table>