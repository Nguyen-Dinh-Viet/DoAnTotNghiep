<?php
header('Content-type: application/vnd-ms-excel');
// Response.ContentType = "application/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
$filename = "Thong_ke_thu_chi.xls";
header("Content-Disposition:attachment; filename =\"$filename\"");
// require('libraries/Classes/PHPExcel.php');

// $from = $_POST['from'];
// $to =$_POST['to'];
// $data_all = get_list_shareholder($from,$to);
// $sum_usd=0;
// $sum_vnd=0;
// foreach ($data_all as $item) {
//     # code...
//     $sum_vnd= $sum_vnd + $item['tong_tien_vnd'];
//     $sum_usd= $sum_usd + $item['tong_tien_USD'];
// }

//   $data=array(
//         'status' => 'true'
//     );
//     die (json_encode($data)) ;
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th style="border: 1px solid black">STT</th>
            <th style="border: 1px solid black">Cổ đông</th>
            <th style="border: 1px solid black">Là cổ đông tàu</th>
            <th style="border: 1px solid black">Tổng tiền VNĐ</th>
            <th style="border: 1px solid black">Tổng tiền $</th>
        </tr>
    </thead>
    <tbody>
        <!-- <?php
        $i = 1;
        foreach ($data as $item) {
        ?>
            <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><?php echo ($item['user_lname'] . " " . $item['user_mname'] . " " . $item['user_fname']) ?></td>
                <td>
                    <?php
                    foreach ($item['ship'] as $item1) {
                        # code...
                        echo ($item1['name'] . ", ");
                    }
                    ?>
                </td>
                <td><?php echo (number_format($item['tong_tien_vnd'], 2, ',', ' ')) ?></td>
                <td><?php echo (number_format($item['tong_tien_USD'], 2, ',', ' ')) ?></td>
            </tr>
        <?php
            $i = $i + 1;
        }
        ?> -->
    </tbody>
</table>