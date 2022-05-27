<?php 
    get_header();
?>
<?php
    get_sidebar();
?>
<script>
    setTimeout(function(){
        // Morris bar chart
Morris.Bar({
    element: 'chart-all-vnd',
    data: [{
        y: 'Tháng 1',
        a:  <?php if(isset( $data_vnd[0]['Tháng 1'])) echo $data_vnd[0]['Tháng 1']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 1'])) echo $data_vnd[1]['Tháng 1']; else  echo("0") ?>,
    }, {
        y: 'Tháng 2',
        a:  <?php if(isset( $data_vnd[0]['Tháng 2'])) echo $data_vnd[0]['Tháng 2']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 2'])) echo $data_vnd[1]['Tháng 2']; else  echo("0") ?>,
    }, {
        y: 'Tháng 3',
        a:  <?php if(isset( $data_vnd[0]['Tháng 3'])) echo $data_vnd[0]['Tháng 3']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 3'])) echo $data_vnd[1]['Tháng 3']; else  echo("0") ?>,
    }, {
        y: 'Tháng 4',
        a:  <?php if(isset( $data_vnd[0]['Tháng 4'])) echo $data_vnd[0]['Tháng 4']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 4'])) echo $data_vnd[1]['Tháng 4']; else  echo("0") ?>,
    }, {
        y: 'Tháng 5',
        a:  <?php if(isset( $data_vnd[0]['Tháng 5'])) echo $data_vnd[0]['Tháng 5']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 5'])) echo $data_vnd[1]['Tháng 5']; else  echo("0") ?>,
    }, {
        y: 'Tháng 6',
        a:  <?php if(isset( $data_vnd[0]['Tháng 6'])) echo $data_vnd[0]['Tháng 6']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 6'])) echo $data_vnd[1]['Tháng 6']; else  echo("0") ?>,
    }, {
        y: 'Tháng 7',
        a:  <?php if(isset( $data_vnd[0]['Tháng 7'])) echo $data_vnd[0]['Tháng 7']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 7'])) echo $data_vnd[1]['Tháng 7']; else  echo("0") ?>,
    }, {
        y: 'Tháng 8',
        a:  <?php if(isset( $data_vnd[0]['Tháng 8'])) echo $data_vnd[0]['Tháng 8']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 8'])) echo $data_vnd[1]['Tháng 8']; else  echo("0") ?>,
    }, {
        y: 'Tháng 9',
        a:  <?php if(isset( $data_vnd[0]['Tháng 9'])) echo $data_vnd[0]['Tháng 9']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 9'])) echo $data_vnd[1]['Tháng 9']; else  echo("0") ?>,
    }, {
        y: 'Tháng 10',
        a:  <?php if(isset( $data_vnd[0]['Tháng 10'])) echo $data_vnd[0]['Tháng 10']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 10'])) echo $data_vnd[1]['Tháng 10']; else  echo("0") ?>,
    }, {
        y: 'Tháng 11',
        a:  <?php if(isset( $data_vnd[0]['Tháng 11'])) echo $data_vnd[0]['Tháng 11']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 11'])) echo $data_vnd[1]['Tháng 11']; else  echo("0") ?>,
    }, {
        y: 'Tháng 12',
        a:  <?php if(isset( $data_vnd[0]['Tháng 12'])) echo $data_vnd[0]['Tháng 12']; else  echo("0") ?>,
        b: <?php if(isset( $data_vnd[1]['Tháng 12'])) echo $data_vnd[1]['Tháng 12']; else  echo("0") ?>,
    }],
    xkey: 'y',
    ykeys: ['a', 'b' ],
    labels: ['Thu', 'Chi' ],
    barColors: ['#04cc13', '#fe2f43'],
    hideHover: 'auto',
    gridLineColor: '#eef0f2',
    resize: true
});

Morris.Bar({
    element: 'chart-all-usd',
    data: [{
        y: 'Tháng 1',
        a:  <?php if(isset( $data_usd[0]['Tháng 1'])) echo $data_usd[0]['Tháng 1']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 1'])) echo $data_usd[1]['Tháng 1']; else  echo("0") ?>,
    }, {
        y: 'Tháng 2',
        a:  <?php if(isset( $data_usd[0]['Tháng 2'])) echo $data_usd[0]['Tháng 2']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 2'])) echo $data_usd[1]['Tháng 2']; else  echo("0") ?>,
    }, {
        y: 'Tháng 3',
        a:  <?php if(isset( $data_usd[0]['Tháng 3'])) echo $data_usd[0]['Tháng 3']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 3'])) echo $data_usd[1]['Tháng 3']; else  echo("0") ?>,
    }, {
        y: 'Tháng 4',
        a:  <?php if(isset( $data_usd[0]['Tháng 4'])) echo $data_usd[0]['Tháng 4']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 4'])) echo $data_usd[1]['Tháng 4']; else  echo("0") ?>,
    }, {
        y: 'Tháng 5',
        a:  <?php if(isset( $data_usd[0]['Tháng 5'])) echo $data_usd[0]['Tháng 5']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 5'])) echo $data_usd[1]['Tháng 5']; else  echo("0") ?>,
    }, {
        y: 'Tháng 6',
        a:  <?php if(isset( $data_usd[0]['Tháng 6'])) echo $data_usd[0]['Tháng 6']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 6'])) echo $data_usd[1]['Tháng 6']; else  echo("0") ?>,
    }, {
        y: 'Tháng 7',
        a:  <?php if(isset( $data_usd[0]['Tháng 7'])) echo $data_usd[0]['Tháng 7']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 7'])) echo $data_usd[1]['Tháng 7']; else  echo("0") ?>,
    }, {
        y: 'Tháng 8',
        a:  <?php if(isset( $data_usd[0]['Tháng 8'])) echo $data_usd[0]['Tháng 8']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 8'])) echo $data_usd[1]['Tháng 8']; else  echo("0") ?>,
    }, {
        y: 'Tháng 9',
        a:  <?php if(isset( $data_usd[0]['Tháng 9'])) echo $data_usd[0]['Tháng 9']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 9'])) echo $data_usd[1]['Tháng 9']; else  echo("0") ?>,
    }, {
        y: 'Tháng 10',
        a:  <?php if(isset( $data_usd[0]['Tháng 10'])) echo $data_usd[0]['Tháng 10']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 10'])) echo $data_usd[1]['Tháng 10']; else  echo("0") ?>,
    }, {
        y: 'Tháng 11',
        a:  <?php if(isset( $data_usd[0]['Tháng 11'])) echo $data_usd[0]['Tháng 11']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 11'])) echo $data_usd[1]['Tháng 11']; else  echo("0") ?>,
    }, {
        y: 'Tháng 12',
        a:  <?php if(isset( $data_usd[0]['Tháng 12'])) echo $data_usd[0]['Tháng 12']; else  echo("0") ?>,
        b: <?php if(isset( $data_usd[1]['Tháng 12'])) echo $data_usd[1]['Tháng 12']; else  echo("0") ?>,
    }],
    xkey: 'y',
    ykeys: ['a', 'b' ],
    labels: ['Thu', 'Chi' ],
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
                                            <h5 class="m-b-10">Trang chủ</h5>
                                            <p class="m-b-0">Phần mềm kế toán</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Thống kê</a>
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
                                                    <div class="card-header">
                                                        <h5>Thống kê</h5>
                                                        <span>Tổng thu chi tiền VNĐ của công ty theo các tháng trong năm</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="chart-all-vnd"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Bar Chart Ends -->
                                            <!-- Bar Chart start -->
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Thống kê</h5>
                                                        <span>Tổng thu chi tiền USĐ của công ty theo các tháng trong năm</span>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="chart-all-usd"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Bar Chart Ends -->
                                           
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php   get_footer(); ?>