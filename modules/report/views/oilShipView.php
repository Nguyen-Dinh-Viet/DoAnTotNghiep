<?php
get_header();
?>
<?php get_sidebar(); ?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Báo cáo</h5>
                        <p class="m-b-0">Báo cáo nhập dầu</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Báo cáo</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Báo cáo nhập dầu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Hover table card start -->
                            <div class="card">
                                <div class="card-header">
                                    <!-- <a class ="add-button" href="?mod=account&action=addAccount">Thêm tài khoản ngân hàng mới</a> -->
                                    <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                            <li><i class="fa fa-trash close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block table-border-style">
                                    <form method="POST">
                                        <div class="d-flex mb-3">
                                            <div class="form-inline" style="margin-right: 30%">
                                                <label for="from_date" class="mr-2">Từ</label>
                                                <input class="form-control" type="date" name="from_date" id="from_date_oil" value="<?php echo set_value('from') ?>">
                                            </div>
                                            <div class="form-inline mr-5">
                                                <label for="to_date" class="mr-2">Đến</label>
                                                <input class="form-control" type="date" name="to_date" id="to_date_oil" value="<?php echo set_value('to') ?>">
                                            </div>

                                            <?php echo form_error('date') ?>
                                            <button type="submit" name="btn-search-report" id="btn-search-report" class="btn btn-success">Tìm kiếm</button>
                                        </div>
                                    </form>
                               
                                    <!-- <?php
                                            //  show_array($data);
                                            ?> -->
                                    <p style="font-size: 18px;color: #077091;font-weight: 600;">Nhập dầu tiền Việt Nam đồng (VNĐ)</p>
                                    <?php 
                                    if(count($data['data_vnd'])>0)
                                    {
                                        ?>               
                                        <button   class="btn btn-info mb-3" name ="btnExport"  onclick="btn_export_vnd()">Xuất file </button>
                                        <?php
                                    }
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id ="table-oil-vnd">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên tàu</th>
                                                    <th>Nhập</th>
                                                    <th class="text-center">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $i = 1;
                                                foreach ($data['data_vnd'] as $item) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $i ?></th>
                                                        <td><?php echo ($item['name']) ?></td>
                                                        <td><?php echo (number_format($item['Tong_tien_vnd'], 2, ',', ' ')) ?></td>
                                                        <td class="text-center">
                                                            <span class="watch_detail_oil" data-name="<?php echo($item['name']) ?>" style="cursor: pointer" data-curr ="<?php echo($item['currency']); ?>"  data-id="<?php echo $item['id'] ?>" class="mr-2 change_revenue" title="Chi tiết" ><i class="fa fa-eye" aria-hidden="true"></i></span>

                                                        </td>
                                                    </tr>
                                                <?php
                                                    $i = $i + 1;
                                                }
                                                ?>
                                                <tr style="color: #000;font-size:18px;font-weight:600;">
                                                    <td colspan="2">Tổng tiền</td>
                                                    <td><?php echo (number_format($sum_vnd, 2, ',', ' ')) ?></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- doanh thu đô la -->
                                    <p style="font-size: 18px;color: #176184;font-weight: 600;">Nhập dầu tiền Đô la Mỹ (USD)</p>
                                    <?php 
                                    if(count($data['data_usd'])>0)
                                    {
                                        ?>               
                                        <button   class="btn btn-info mb-3" name ="btnExport" id="btnExport_index" onclick="btn_export_usd()">Xuất file </button>
                                        <?php
                                    }
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id ="table-oil-usd">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên tàu</th>
                                                    <th>Nhập dầu</th>
                                                    <th class="text-center">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $i = 1;
                                                foreach ($data['data_usd'] as $item) {
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $i ?></th>
                                                        <td><?php echo ($item['name']) ?></td>
                                                        <td><?php echo (number_format($item['Tong_tien_usd'], 2, ',', ' ')) ?></td>
                                                        <td class="text-center">
                                                            <span class="watch_detail_oil" style="cursor: pointer" data-name="<?php echo($item['name']) ?>" data-curr ="<?php echo($item['currency']); ?>" data-id="<?php echo $item['id'] ?>" class="mr-2 change_revenue" title="Chi tiết" ><i class="fa fa-eye" aria-hidden="true"></i></span>

                                                        </td>
                                                    </tr>
                                                <?php
                                                    $i = $i + 1;
                                                }
                                                ?>
                                                <tr  style="color: #000;font-size:18px;font-weight:600;">
                                                    <td colspan="2">Tổng tiền</td>
                                                    <td><?php echo (number_format($sum_usd, 2, ',', ' ')) ?></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Hover table card end -->
                            <!-- Cấu trưc modal -->
                            <div class="modal fade" id="modal-watch-detail-oil">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">

                                            </h5>
                                            <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <!-- and modal-header	 -->
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Thời gian</th>
                                                                    <th>Số tiền</th>
                                                                    <th>Tài khoản</th>
                                                                    <th>Mô tả</th>
                                                                </tr>

                                                            </thead>
                                                            <tbody id="t-body-oil">

                                                            </tbody>
                                                        </table>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal-body -->
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end-modal -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<script>
    function btn_export_vnd() {
        
        var from =$("input#from_date_oil").val();
         var to =$("input#to_date_oil").val();
        
        var table1 = document.querySelector("#table-oil-vnd");
        var opt = {
            rowIndex: 4
        }; //开头空4行
        var sheet = XLSX2.utils.table_to_sheet(table1, opt);
        sheet["B1"] = {
            t: "s",
            v: 'Thống kê nhập dầu VND' 
        }; //给A1单元格赋值
        sheet["B4"] = {
            t: "s",
            v: 'Từ ngày ' + formatDateInJS(from) + ' đến ngày ' + formatDateInJS(to) 
        };
        sheet["B4"].s = {
            font: {
                name: 'Times New Roman',
                sz: 14,
                bold: true,
            },
            alignment: {
                horizontal: "center",
                vertical: "center",
                wrap_text: true
            },
        };
        sheet["B1"].s = {
            font: {
                name: 'Times New Roman',
                sz: 24,
                bold: true,
                underline: true,
                color: {
                    rgb: "FFFFAA00"
                }
            },
            alignment: {
                horizontal: "center",
                vertical: "center",
                wrap_text: true
            },
        };
        //["!merges"]这个属性是专门用来进行单元格合并的 
        sheet["!merges"].push({ //如果不为空push 为空 = 赋值
            //合并单元格 index都从0开始
            s: { //s开始
                c: 1, //开始列
                r: 0 //开始行
            },
            e: { //e结束
                c: 4, //结束列
                r: 2 //结束行
            }
        });
        sheet["!merges"].push({ //如果不为空push 为空 = 赋值
            //合并单元格 index都从0开始
            s: { //s开始
                c: 1, //开始列
                r: 3 //开始行
            },
            e: { //e结束
                c: 4, //结束列
                r: 3 //结束行
            }
        });
        sheet["!cols"] = [{
            wpx: 70
        }, {
            wpx: 150
        }, {
            wpx: 200
        }, {
            wpx: 150
        }, {
            wpx: 150
        }]; //单元格列宽
        sheet["A5"].s = { //样式
            font: {
                sz: 13,
                bold: true,
            },
            alignment: {
                // horizontal: "center",
                vertical: "center",
                wrap_text: true
            }
        };
        sheet["B5"].s = { //样式
            font: {
                sz: 13,
                bold: true,
            },
            alignment: {
                // horizontal: "center",
                vertical: "center",
                wrap_text: true
            }
        };
        sheet["C5"].s = { //样式
            font: {
                sz: 13,
                bold: true,
            },
            alignment: {
                // horizontal: "center",
                vertical: "center",
                wrap_text: true
            }
        };
        
        
        openDownloadDialog(sheet2blob(sheet), 'Bao_cao_nhap_dau_vnd.xlsx');
    };
    function btn_export_usd() {
        var from =$("input#from_date_oil").val();
         var to =$("input#to_date_oil").val();
        var table1 = document.querySelector("#table-oil-usd");
        var opt = {
            rowIndex: 4
        }; //开头空4行
        var sheet = XLSX2.utils.table_to_sheet(table1, opt);
        sheet["B1"] = {
            t: "s",
            v: 'Báo cáo nhập dầu USD' 
        }; //给A1单元格赋值
        sheet["B4"] = {
            t: "s",
            v: 'Từ ngày ' + formatDateInJS(from) + ' đến ngày ' + formatDateInJS(to) 
        };
        sheet["B4"].s = {
            font: {
                name: 'Times New Roman',
                sz: 14,
                bold: true,
            },
            alignment: {
                horizontal: "center",
                vertical: "center",
                wrap_text: true
            },
        };
        sheet["B1"].s = {
            font: {
                name: 'Times New Roman',
                sz: 24,
                bold: true,
                underline: true,
                color: {
                    rgb: "FFFFAA00"
                }
            },
            alignment: {
                horizontal: "center",
                vertical: "center",
                wrap_text: true
            },
        };
        //["!merges"]这个属性是专门用来进行单元格合并的 
        sheet["!merges"].push({ //如果不为空push 为空 = 赋值
            //合并单元格 index都从0开始
            s: { //s开始
                c: 1, //开始列
                r: 0 //开始行
            },
            e: { //e结束
                c: 4, //结束列
                r: 2 //结束行
            }
        });
        sheet["!merges"].push({ //如果不为空push 为空 = 赋值
            //合并单元格 index都从0开始
            s: { //s开始
                c: 1, //开始列
                r: 3 //开始行
            },
            e: { //e结束
                c: 4, //结束列
                r: 3 //结束行
            }
        });
        sheet["!cols"] = [{
            wpx: 70
        }, {
            wpx: 150
        }, {
            wpx: 200
        }, {
            wpx: 150
        }, {
            wpx: 150
        }]; //单元格列宽
        sheet["A5"].s = { //样式
            font: {
                sz: 13,
                bold: true,
            },
            alignment: {
                // horizontal: "center",
                vertical: "center",
                wrap_text: true
            }
        };
        sheet["B5"].s = { //样式
            font: {
                sz: 13,
                bold: true,
            },
            alignment: {
                // horizontal: "center",
                vertical: "center",
                wrap_text: true
            }
        };
        sheet["C5"].s = { //样式
            font: {
                sz: 13,
                bold: true,
            },
            alignment: {
                // horizontal: "center",
                vertical: "center",
                wrap_text: true
            }
        };
       
        openDownloadDialog(sheet2blob(sheet), 'Bao_cao_nhap_dau_usd.xlsx');
    }
</script>

<?php get_footer(); ?>