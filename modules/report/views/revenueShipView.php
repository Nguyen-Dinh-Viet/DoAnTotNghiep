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
                        <p class="m-b-0">Báo cáo doanh thu tàu</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Báo cáo</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Báo cáo doanh thu</a>
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
                                                <input class="form-control" type="date" name="from_date" id="from_date_revenue" value="<?php echo set_value('from') ?>">
                                            </div>
                                            <div class="form-inline mr-5">
                                                <label for="to_date" class="mr-2">Đến</label>
                                                <input class="form-control" type="date" name="to_date" id="to_date_revenue" value="<?php echo set_value('to') ?>">
                                            </div>

                                            <?php echo form_error('date') ?>
                                            <button type="submit" name="btn-search-report" id="btn-search-report" class="btn btn-success">Tìm kiếm</button>
                                        </div>
                                    </form>
                                    <!-- <?php
                                            //  show_array($data);
                                            ?> -->
                                    <p style="font-size: 18px;color: #077091;font-weight: 600;">Doanh thu tiền Việt Nam đồng (VNĐ)</p>
                                    <?php 
                                    if(count($data['data_vnd'])>0)
                                    {
                                        ?>               
                                        <button   class="btn btn-info mb-3" name ="btnExport"  onclick="btn_export_vnd()">Xuất file </button>
                                        <?php
                                    }
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id ="table-revenue-vnd">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên tàu</th>
                                                    <th>Tổng thu</th>
                                                    <th>Tổng chi</th>
                                                    <th>Doanh thu</th>
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
                                                        <td class="style-spend"><?php echo (number_format($item['Tong_thu_vnd'], 2, ',', ' ')) ?></td>
                                                        <td class="style-pay"><?php echo (number_format($item['Tong_chi_vnd'], 2, ',', ' ')) ?></td>
                                                        <td><?php echo (number_format($item['Tong_thu_vnd'] - $item['Tong_chi_vnd'], 2, ',', ' ')) ?></td>
                                                        <td class="text-center">
                                                            <span class="watch_detail_revenue" data-name="<?php echo ($item['name']) ?>" style="cursor: pointer" data-curr="<?php echo ($item['currency']); ?>" data-id="<?php echo $item['id'] ?>" class="mr-2 change_revenue" title="Chi tiết" data-id="<?php echo $item['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></span>

                                                        </td>
                                                    </tr>
                                                <?php
                                                    $i = $i + 1;
                                                }
                                                ?>
                                                <tr style="color: #000;font-size:18px;font-weight:600;">
                                                    <td colspan="2">Tổng tiền</td>
                                                    <td><?php echo (number_format($sum_collect_vnd, 2, ',', ' ')) ?></td>
                                                    <td><?php echo (number_format($sum_spend_vnd, 2, ',', ' ')) ?></td>
                                                    <td><?php echo (number_format($sum_collect_vnd - $sum_spend_vnd, 2, ',', ' ')) ?></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- doanh thu đô la -->
                                    <p style="font-size: 18px;color: #176184;font-weight: 600;">Doanh thu tiền Đô la Mỹ (USD)</p>
                                    <?php 
                                    if(count($data['data_usd'])>0)
                                    {
                                        ?>               
                                        <button   class="btn btn-info mb-3" name ="btnExport" onclick="btn_export_usd()">Xuất file </button>
                                        <?php
                                    }
                                    ?>
                                    <div class="table-responsive">
                                        <table class="table table-hover" id ="table-revenue-usd">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên tàu</th>
                                                    <th>Tổng thu</th>
                                                    <th>Tổng chi</th>
                                                    <th>Doanh thu</th>
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
                                                        <td class="style-spend"><?php echo (number_format($item['Tong_thu_usd'], 2, ',', ' ')) ?></td>
                                                        <td class="style-pay"><?php echo (number_format($item['Tong_chi_usd'], 2, ',', ' ')) ?></td>
                                                        <td><?php echo (number_format($item['Tong_thu_usd'] - $item['Tong_chi_usd'], 2, ',', ' ')) ?></td>
                                                        <td class="text-center">
                                                            <span class="watch_detail_revenue" style="cursor: pointer" data-name="<?php echo ($item['name']) ?>" data-curr="<?php echo ($item['currency']); ?>" data-id="<?php echo $item['id'] ?>" class="mr-2 change_revenue" title="Chi tiết" data-id="<?php echo $item['id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></span>

                                                        </td>
                                                    </tr>
                                                <?php
                                                    $i = $i + 1;
                                                }
                                                ?>
                                                <tr  style="color: #000;font-size:18px;font-weight:600;">
                                                    <td colspan="2">Tổng tiền</td>
                                                    <td><?php echo (number_format($sum_collect_usd, 2, ',', ' ')) ?></td>
                                                    <td><?php echo (number_format($sum_spend_usd, 2, ',', ' ')) ?></td>
                                                    <td><?php echo (number_format($sum_collect_usd - $sum_spend_usd, 2, ',', ' ')) ?></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Hover table card end -->
                            <!-- Cấu trưc modal -->
                            <div class="modal fade" id="modal-watch-detail-revenue">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"></h5>
                                            <button class="btn btn-info ml-3" onclick="btn_export_detail()" >Xuất file</button>
                                            <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <!-- and modal-header	 -->
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-hover" id ="detail-revenue-ship">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th style ="width:100px">Thời gian</th>
                                                                    <th>Loại thu/chi</th>
                                                                    <th>Thu</th>
                                                                    <th>Chi</th>
                                                                    <th>Tài khoản</th>
                                                                    <th>Mô tả</th>
                                                                </tr>

                                                            </thead>
                                                            <tbody id="t-body-revenue">

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
        var from =$("input#from_date_revenue").val();
         var to =$("input#to_date_revenue").val();
        var table1 = document.querySelector("#table-revenue-vnd");
        var opt = {
            rowIndex: 4
        }; //开头空4行
        var sheet = XLSX2.utils.table_to_sheet(table1, opt);
        sheet["B1"] = {
            t: "s",
            v: 'Thống kê doanh thu tàu VND' 
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
        sheet["D5"].s = { //样式
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
        sheet["E5"].s = { //样式
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
        openDownloadDialog(sheet2blob(sheet), 'Bao_cao_doanh_thu_tau_vnd.xlsx');
    };
    function btn_export_usd() {
        var from =$("input#from_date_revenue").val();
         var to =$("input#to_date_revenue").val();
        var table1 = document.querySelector("#table-revenue-usd");
        var opt = {
            rowIndex: 4
        }; //开头空4行
        var sheet = XLSX2.utils.table_to_sheet(table1, opt);
        sheet["B1"] = {
            t: "s",
            v: 'Thống kê doanh thu tàu USD' 
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
        sheet["D5"].s = { //样式
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
        sheet["E5"].s = { //样式
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
        openDownloadDialog(sheet2blob(sheet), 'Bao_cao_doanh_thu_tau_usd.xlsx');
    };
    function btn_export_detail() {
        var from =$("input#from_date_revenue").val();
         var to =$("input#to_date_revenue").val();
        var table1 = document.querySelector("#detail-revenue-ship");
        var title = $("#modal-watch-detail-revenue h5.modal-title").text();
        var nameShip= title.slice(37);
        var nameFile = "Bao_cao_doanh_thu_chi_tiet_"+nameShip+".xlsx";
        var opt = {
            rowIndex: 4
        }; //开头空4行
        var sheet = XLSX2.utils.table_to_sheet(table1, opt);
        sheet["B1"] = {
            t: "s",
            v: title, 
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
        }, {
            wpx: 150
        }, {
            wpx: 300
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
        sheet["D5"].s = { //样式
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
        sheet["E5"].s = { //样式
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
        sheet["F5"].s = { //样式
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
        sheet["G5"].s = { //样式
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
        openDownloadDialog(sheet2blob(sheet), nameFile);
    };
</script>
<?php get_footer(); ?>