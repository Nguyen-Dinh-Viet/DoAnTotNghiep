<?php get_header(); ?>
<?php get_sidebar(); ?>
<script>
setTimeout(function() {
    // Morris bar chart
    Morris.Bar({
        element: 'chart-all-car',
        data: [{
            y: 'Thứ 2',
            a: <?php if (isset($data_carIn[1]['XeVao'])) echo $data_carIn[1]['XeVao'];
                    else  echo ("0") ?>,
            b: <?php if (isset($data_carOut[1]['XeRa'])) echo $data_carOut[1]['XeRa'];
                    else  echo ("0") ?>,
        }, {
            y: 'Thứ 3',
            a: <?php if (isset($data_carIn[2]['XeVao'])) echo $data_carIn[2]['XeVao'];
                    else  echo ("0") ?>,
            b: <?php if (isset($data_carOut[2]['XeRa'])) echo $data_carOut[2]['XeRa'];
                    else  echo ("0") ?>,
        }, {
            y: 'Thứ 4',
            a: <?php if (isset($data_carIn[3]['XeVao'])) echo $data_carIn[3]['XeVao'];
                    else  echo ("0") ?>,
            b: <?php if (isset($data_carOut[3]['XeRa'])) echo $data_carOut[3]['XeRa'];
                    else  echo ("0") ?>,
        }, {
            y: 'Thứ 5',
            a: <?php if (isset($data_carIn[4]['XeVao'])) echo $data_carIn[4]['XeVao'];
                    else  echo ("0") ?>,
            b: <?php if (isset($data_carOut[4]['XeRa'])) echo $data_carOut[4]['XeRa'];
                    else  echo ("0") ?>,
        }, {
            y: 'Thứ 6',
            a: <?php if (isset($data_carIn[5]['XeVao'])) echo $data_carIn[5]['XeVao'];
                    else  echo ("0") ?>,
            b: <?php if (isset($data_carOut[5]['XeRa'])) echo $data_carOut[5]['XeRa'];
                    else  echo ("0") ?>,
        }, {
            y: 'Thứ 7',
            a: <?php if (isset($data_carIn[6]['XeVao'])) echo $data_carIn[6]['XeVao'];
                    else  echo ("0") ?>,
            b: <?php if (isset($data_carOut[6]['XeRa'])) echo $data_carOut[6]['XeRa'];
                    else  echo ("0") ?>,
        }, {
            y: 'Chủ nhật',
            a: <?php if (isset($data_carIn[0]['XeVao'])) echo $data_carIn[0]['XeVao'];
                    else  echo ("0") ?>,
            b: <?php if (isset($data_carOut[0]['XeRa'])) echo $data_carOut[0]['XeRa'];
                    else  echo ("0") ?>,
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Vào', 'Ra'],
        barColors: ['#04cc13', '#fe2f43'],
        hideHover: 'auto',
        gridLineColor: '#eef0f2',
        resize: true
    });
})
</script>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <!-- <video autoplay loop muted plays-inline class="back-video">
                            <source src="assets/images/video.mp4" type="video/mp4">
                        </video> -->
                        <h5 class="m-b-10">Hệ thống bãi đỗ xe có xác thực đa cấp</h5>
                        <p class="m-b-0">Trang chủ</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=homes"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="?mod=home">Thống kê</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->

                <div class="page-body" style="width:100%">
                    <div class="row">

                        <!-- Bar Chart start -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="display: flex;">
                                    <div style="flex-grow: 9">
                                        <h5>Thống kê -- <?php echo sw_get_current_weekday() ?> </h5>
                                        <span>Lưu lượng xe theo các ngày trong tuần</span>
                                    </div>
                                    <div class="form-group style-datepicker">
                                        <div class="datepicker date input-group p-0 shadow-sm mr-3">
                                            <input type="text" name="dateSearch" value="<?php echo $dateSearch
                                                                                        ?>"
                                                placeholder="Choose a reservation date" class="form-control py-4 px-4"
                                                id="reservationDate">
                                            <div class="input-group-append">
                                                <span class="input-group-text px-4"><i class="fa fa-clock-o"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <input class="" type="date" name="to_date" id="to_date" value="<?php #echo set_value('to') 
                                                                                                        ?>"> -->
                                    <?php #echo form_error('date') 
                                    ?>
                                    <!-- <input id="today" type="date" style="flex-grow: 1"> -->
                                </div>
                                <!-- <div class="card-block" style="display: flex">
                                    <div id="chart-all-car"></div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <div id="chart-all-car"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Bar Chart Ends -->
                        <!-- Bar Chart start -->
                        <!-- <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Thống kê</h5>
                                    <span>Tổng thu chi tiền USĐ của công ty theo các tháng trong năm</span>
                                </div>
                                <div class="card-block">
                                    <div id="chart-all-usd"></div>
                                </div>
                            </div>
                        </div> -->
                        <!-- Bar Chart Ends -->

                    </div>
                </div>
                <!-- Page-body end -->
            </div>
            <div id="styleSelector"> </div>
        </div>
    </div>
</div>
<!-- <script>
let today = new Date().toISOString().substr(0, 10);
document.querySelector("#today").value = today;
</script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->

<?php get_footer(); ?>