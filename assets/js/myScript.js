function formatDateInJS(date) {
    var day = date.substr(8,2);
    var month =date.substr(5,2);
    var year =date.substr(0,4);
    var date_new = day+'-'+month+'-'+year;
    return date_new;
}
function formatMoneyInJS(money) {
    let dollarUSLocale = Intl.NumberFormat('en-US', {
        currency: `USD`,
        style: 'currency',
    });
    var money_temp=dollarUSLocale.format(money);
    var money_1 =money_temp.replace('$','');
    var money_2 =money_1.replace(',',' ');
   // var money_3 =money_2.replace('.',',');
    var money_new =money_2;
    return money_new;
}
$(document).ready(function () {
    var role_id = $("#role").find(":selected").val();
    if (role_id == 2) {
        $(".sub-role").css('display', 'block');
    } else {
        $(".sub-role").css('display', 'none');
    }
    $("#role").change(function () {
        var role_id = $("#role").find(":selected").val();
        if (role_id == 2) {
            $(".sub-role").css('display', 'block');
        } else {
            $(".sub-role").css('display', 'none');
        }
    });
    // Sự kiện modal đóng thì các giá trị trở về ban đầu
    $("#modal-info-ledger").on('hidden.bs.modal', function () {
    
        $('input#change_des').val("");
        $("input#change_date").val("");
        $('#change_cat_id option:selected').removeAttr('selected');
        $('#change_ship_id option:selected').removeAttr('selected');
        $('#change_shareholder_id option:selected').removeAttr('selected');
        $('input#change_money').val("");
     //   $('input#change_money_1').val("");
        $('input#change_id').val("");
        $("p#error_money").text("");   
    })
    // modal để thay đổi thông tin ledger
    $("span.change_ledger").click(function () {
        var id = $(this).attr("data-id");
        var data = {
            id: id
        };
        $.ajax({
            url: '?mod=ledgers&action=update_ajax', //Trang xử lý, mặc định trang hiện tại
            method: 'POST', //post hoặc get, mặc định là get
            data: data, // dữ liệu truyền lên server
            dataType: 'json', // html ,text,script hoặc json
            success: function (data) {
                //xử lí dữ liệu trả về  
                //   alert(data)
                $('input#change_id').val(data['info']['id']);
                $('input#change_des').val(data['info']['des']);
                $("input#change_date").val(data['info']['date']);
                $("#change_cat_id option[value='" + data['info']['cat_id'] + "']").attr('selected', 'selected');
                $('input#change_money').val(data['info']['money']);
                // if (data['info']['spend'] == '1') {
                //     $('input#change_money_2').val(data['info']['money']);
                // } else {
                //     $('input#change_money_1').val(data['info']['money']);
                // };
                $("#change_ship_id option[value='" + data['info']['ship_id'] + "']").attr('selected', 'selected');
                // $("#change_shareholder_id option[value='" + data['user_id'] + "']").attr('selected', 'selected');
                $(".change-input-ajax #change_shareholder_id").html(data['data']);
            },
            error: function (xhr, ajaxOptions, thrownError) //
            {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }

        });
        $("#modal-info-ledger").modal();
        return false;
    });
    //kết thúc thay đổi thông tin ledger

    // sự kiện Lưu dữ liệu legder
    $("#modal-info-ledger button.btn-save").click(function () {

        if ($('input#change_money').val() == 0 ) {
            $("p#error_money").text("Vui lòng nhập số tiền");
            return;
        }
        var data = {
            id: $('input#change_id').val(),
            date: $('input#change_date').val(),
            money: $('input#change_money').val(),
            //money_2: $('input#change_money_2').val(),
            des: $('input#change_des').val(),
            cat_id: $("#change_cat_id").find(":selected").val(),
            ship_id: $("#change_ship_id").find(":selected").val(),
            shareholder_id: $("#change_shareholder_id").find(":selected").val()
        }
        $.ajax({
            url: '?mod=ledgers&action=update_Ledger_ajax', //Trang xử lý, mặc định trang hiện tại
            method: 'POST', //post hoặc get, mặc định là get
            data: data, // dữ liệu truyền lên server
            dataType: 'json', // html ,text,script hoặc json

            success: function (data) {
                //xử lí dữ liệu trả về  
                //   alert(data)
                if (data['status']) {
                    alert('Chỉnh sửa thành công');
                    location.reload();
                } else {
                    alert("Có lỗi xảy ra!");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) //
            {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }

        });

    })

    // ======================== Ajax của thay đổi cổ đông ================
    // Sự kiện modal đóng thì các giá trị trở về ban đầu
    $("#modal-info-shareholder").on('hidden.bs.modal', function () {
        $('input#change_id').val("");
        $("input#change_ratio").val("");
        $("input#change_info").val("");
        $('#change_shareholder_id option:selected').removeAttr('selected');
        $("p#error_ratio").text("");
    })
    // modal để thay đổi thông tin cổ đông
    $("span.change_shareholder").click(function () {
        var idHolder = $(this).attr("data-id");
        var idShip = $(this).attr("data-id-ship");
        var data = {
            idHolder: idHolder,
            idShip: idShip,
        };

        $.ajax({
            url: '?mod=ship&action=update_ajax', //Trang xử lý, mặc định trang hiện tại
            method: 'POST', //post hoặc get, mặc định là get
            data: data, // dữ liệu truyền lên server
            dataType: 'json', // html ,text,script hoặc json
            success: function (data) {
                //xử lí dữ liệu trả về  
                //   alert(data)
                $('input#change_id').val(data['idShip']);
                $("input#change_ratio").val(data['ratio']);
                $("input#change_info").val(data['info']);
                $("#change_shareholder_id option[value='" + data['idHolder'] + "']").attr('selected', 'selected');
                
            },
            error: function (xhr, ajaxOptions, thrownError) //
            {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }

        });
        $("#modal-info-shareholder").modal();
        return false;
    });
    //kết thúc thay đổi thông tin ledger

    // sự kiện Lưu dữ liệu legder
    $("#modal-info-shareholder button.btn-save").click(function () {

        if ($('input#change_ratio').val() == 0) {
            $("p#error_ratio").text("Vui lòng nhập phần trăm cổ phần!");
            return;

        }
        var data = {
            idShip: $('input#change_id').val(),
            ratio: $('input#change_ratio').val(),
            info: $('input#change_info').val(),
            idHolder: $("#change_shareholder_id").find(":selected").val(),
        }
        $.ajax({
            url: '?mod=ship&action=update_shareholder_ajax', //Trang xử lý, mặc định trang hiện tại
            method: 'POST', //post hoặc get, mặc định là get
            data: data, // dữ liệu truyền lên server
            dataType: 'json', // html ,text,script hoặc json

            success: function (data) {
                //xử lí dữ liệu trả về  
                //   alert(data)
                if (data['status']) {
                    alert('Chỉnh sửa thành công');
                    location.reload();
                } else {
                    alert("Có lỗi xảy ra!");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) //
            {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }

        });

    })

    // Kết thúc sự kiện lưu dữ liệu ledgers

    //Sự kiện thay đổi tàu thì chỉ chọn cổ đông của tàu ý thôi
    $(".change-input-ajax #ship_id").change(function () {  
                
        var val_ship_id = $("#ship_id").find(":selected").val();
        var data = { val_ship_id: val_ship_id };
        $.ajax({
            url: "?mod=ledgers&action=changeShipId_ajax",
            method: "POST",
            dataType: "json",
            data: data,
            success: function (data) {
                 $(".change-input-ajax #shareholder_id").html(data['data']);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }
        })
    });
    // hết ở chọn cổ đông

     //Sự kiện thay đổi tàu thì chỉ chọn cổ đông của tàu ý thôi bên modal
     $(".change-input-ajax #change_ship_id").change(function () {  
                
        var val_ship_id = $("#change_ship_id").find(":selected").val();
        var data = { val_ship_id: val_ship_id };
        $.ajax({
            url: "?mod=ledgers&action=changeShipId_ajax",
            method: "POST",
            dataType: "json",
            data: data,
            success: function (data) {
                 $(".change-input-ajax #change_shareholder_id").html(data['data']);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }
        })
    });
    // hết ở chọn cổ đông

    // Sự kiện modal đóng thì các giá trị trở về ban đầu
    $("#modal-watch-detail").on('hidden.bs.modal', function () {
        $("#t-body").html("");
    })

 // ======================== Ajax của thay đổi chuyến vận chuyển ================
    // Sự kiện modal đóng thì các giá trị trở về ban đầu
    $("#modal-info-transport").on('hidden.bs.modal', function () {
        $('input#change_date').val("");
        $("input#change_from_port").val("");
        $("input#change_to_port").val("");
        $('#change_ship_id option:selected').removeAttr('selected');
        $('input#change_transport_company').val("");
        $("input#change_goods").val("");
        $("input#change_quantity").val("");
        $('input#change_price').val("");
        $("input#change_money").val("");
        $("input#change_note").val("");
        $('#change_currency option:selected').removeAttr('selected');
        // $("p#error_ratio").text("");
    })
    // modal để thay đổi thông tin cổ đông
    $("span.change_transport").click(function () {
        var id = $(this).attr("data-id");
        var data = {
            id: id
        };

        $.ajax({
            url: '?mod=ship&action=get_manage_ship_ajax', //Trang xử lý, mặc định trang hiện tại
            method: 'POST', //post hoặc get, mặc định là get
            data: data, // dữ liệu truyền lên server
            dataType: 'json', // html ,text,script hoặc json
            success: function (data) {
                //xử lí dữ liệu trả về  
                //   alert(data)
                $('input#change_id').val(data['id']);
                $("input#change_date").val(data['date']);
                $("input#change_from_port").val(data['fromPort']);
                $('input#change_to_port').val(data['toPort']);
                $("input#change_transport_company").val(data['transportCompany']);
                $("input#change_goods").val(data['goods']);
                $('input#change_quantity').val(data['quantity']);
                $("input#change_price").val(data['price']);
                $("input#change_money").val(data['money']);
                $("input#change_note").val(data['note']);
                $("#change_ship_id option[value='" + data['idShip'] + "']").attr('selected', 'selected');
                $("#change_currency option[value='" + data['currency_id'] + "']").attr('selected', 'selected');
                
            },
            error: function (xhr, ajaxOptions, thrownError) //
            {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }

        });
        $("#modal-info-transport").modal();
        return false;
    });
    //kết thúc thay đổi thông tin chuyến tàu

    // sự kiện Lưu dữ liệu chuyến tàu
    $("#modal-info-transport button.btn-save").click(function () {

        if ($('input#change_date').val() == "" || $('input#change_from_port').val() == "" || $('input#change_to_port').val() == "" ||
        $('input#change_transport_company').val() == "" || $('input#change_goods').val() == "" || $('input#change_quantity').val() == ""
        ) {
            $("p#error_manage").text("Bạn nhập sai thông tin!");
            return;
        }
        // if($('input#change_price').val() !="" && $('input#change_quantity').val() !="" && $('input#change_money').val() !="")
        // {
        //     $("p#error_manage").text("Bạn nhập sai thông tin!");
        //     return;
        // }
        var data = {
            id: $('input#change_id').val(),
            date: $('input#change_date').val(),
            from_port: $('input#change_from_port').val(),
            to_port: $('input#change_to_port').val(),
            ship_id: $("#change_ship_id").find(":selected").val(),
            transport_company: $('input#change_transport_company').val(),
            goods: $('input#change_goods').val(),
            quantity: $('input#change_quantity').val(),
            price: $('input#change_price').val(),
            money: $('input#change_money').val(),
            note: $('input#change_note').val(),
            currency_id: $("#change_currency").find(":selected").val(),
            
        }
        $.ajax({
            url: '?mod=ship&action=update_manage_ship_ajax', //Trang xử lý, mặc định trang hiện tại
            method: 'POST', //post hoặc get, mặc định là get
            data: data, // dữ liệu truyền lên server
            dataType: 'json', // html ,text,script hoặc json

            success: function (data) {
                //xử lí dữ liệu trả về  
                //   alert(data)
                if (data['status']) {
                    alert('Chỉnh sửa thành công');
                    location.reload();
                } else {
                    alert("Có lỗi xảy ra!");
                }
            },
            error: function (xhr, ajaxOptions, thrownError) //
            {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }

        });

    })

// ////////////////////// BÁO CÁO    ///////////////////////////////////////////////
    //Xem chi tiết chuyển khoản từ ngày này đến ngày này
    $("span.watch_detail").click(function () {  
        var id = $(this).attr("data-id");
        var from =$("input#from_date").val();
        var to =$("input#to_date").val();
        var data = { id: id,
            from: from,
            to: to
        };
        
        // alert(from);
        $.ajax({
            url: "?mod=report&action=watch_detail_ajax",
            method: "POST",
            dataType: "json",
            data: data,

            success: function (data) {
                var info = "";
                var stt =1;
                var title = "Thông tin chi tiết chi cho cổ đông: "+data[0]['user_lname']+" "+data[0]['user_mname']+" "+data[0]['user_fname'];
                data.forEach(item => {
                    var temp = "<tr><td>"+stt+"</td><td>"+formatDateInJS(item['date'])+"</td><td>"+item['cate_name']+"</td><td>"+formatMoneyInJS(item['money'])+"</td><td>"+item['currency_name']+"</td><td>"+item['account_name']+"</td><td>"+item['des']+"</td><tr>";
                    info =info +temp;
                    stt = stt +1;
                });
                // $('#myTable').append('<tr><td>my data</td><td>more data</td></tr>');
                // $("#modal-watch-detail > tbody:first").append(info);
                $("#t-body").append(info);
                $("#modal-watch-detail h5.modal-title").html(title);
                //   var all = all_amount + 7000;
                // $(".all").text(all);
               //  $(".change-input-ajax #change_shareholder_id").html(data['data']);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }
        });
        $("#modal-watch-detail").modal();
        return false;
    });

     //Xem chi tiết doanh thu của tàu từ ngày này đến ngày này
     $("span.watch_detail_revenue").click(function () {  
        var id = $(this).attr("data-id");
        var curr = $(this).attr("data-curr");
        var name =$(this).attr("data-name");
        var from =$("input#from_date_revenue").val();
        var to =$("input#to_date_revenue").val();
       
        var data = { id: id,
            curr: curr,
            from: from,
            to: to
        };
        console.log(data);
        // alert(from);
        $.ajax({
            url: "?mod=report&action=watch_revenue_ajax",
            method: "POST",
            dataType: "json",
            data: data,
            
            success: function (data) {
                var info = "";
                var stt =1;
                var sum_collect =0;
                var sum_spend =0;
                var title = "Thống kê doanh thu chi tiết của tàu: "+name ;
                data.forEach(item => {
                    if(item['spend'] == 0)
                    {
                        sum_collect=sum_collect+parseFloat(item['money']);
                        var temp = "<tr><td>"+stt+"</td><td>"+formatDateInJS(item['date'])+"</td><td>"+item['cate_name']+"</td><td>"+formatMoneyInJS(item['money'])+"</td><td></td><td>"+item['name']+"</td><td>"+item['des']+"</td></tr>";  
                    }
                    else{
                        sum_spend=sum_spend+parseFloat(item['money']);
                        var temp = "<tr><td>"+stt+"</td><td>"+formatDateInJS(item['date'])+"</td><td>"+item['cate_name']+"</td><td></td><td>"+formatMoneyInJS(item['money'])+"</td><td>"+item['name']+"</td><td>"+item['des']+"</td></tr>";
                    }
                    info =info +temp;
                    stt = stt +1;
                });
                var sum ="<tr  style='color: #000;font-size:16px;font-weight:600;'><td colspan='3'>Tổng tiền</td><td>"+formatMoneyInJS(sum_collect.toString())+"</td><td>"+formatMoneyInJS(sum_spend.toString())+"</td><td></td><td></td></tr>";
                info=info+sum;
                // $('#myTable').append('<tr><td>my data</td><td>more data</td></tr>');
                // $("#modal-watch-detail > tbody:first").append(info);
                $("#t-body-revenue").append(info);
                $("#modal-watch-detail-revenue h5.modal-title").html(title);
                //   var all = all_amount + 7000;
                // $(".all").text(all);
               //  $(".change-input-ajax #change_shareholder_id").html(data['data']);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }
        });
        $("#modal-watch-detail-revenue").modal();
        return false;
    });

    // Sự kiện modal đóng thì các giá trị trở về ban đầu
    $("#modal-watch-detail-revenue").on('hidden.bs.modal', function () {
        $("#t-body-revenue").html("");
    })

     //Xem chi tiết chi dầu của tàu từ ngày này đến ngày này
     $("span.watch_detail_oil").click(function () {  
        var id = $(this).attr("data-id");
        var curr = $(this).attr("data-curr");
        var name =$(this).attr("data-name");
        var from =$("input#from_date_oil").val();
        var to =$("input#to_date_oil").val();
       
        var data = { id: id,
            curr: curr,
            from: from,
            to: to
        };
        console.log(data);
        // alert(from);
        $.ajax({
            url: "?mod=report&action=watch_oil_ajax",
            method: "POST",
            dataType: "json",
            data: data,
            
            success: function (data) {
                var info = "";
                var stt =1;
                var title = "Thông tin chi dầu của tàu: "+name;
                var sum_money=0;
                data.forEach(item => {
                    sum_money=sum_money+parseFloat(item['money']);
                    var temp = "<tr><td>"+stt+"</td><td>"+formatDateInJS(item['date'])+"</td><td>"+formatMoneyInJS(item['money'])+"</td><td>"+item['acc_name']+"</td><td>"+item['des']+"</td><tr>";
                    info =info +temp;
                    stt = stt +1;
                });
                var sum ="<tr style='color: #000;font-size:18px;font-weight:600;'><td colspan='2'>Tổng tiền</td><td>"+formatMoneyInJS(sum_money)+"</td><td></td><td></td></tr>";
                info =info+sum;
                $("#t-body-oil").append(info);
                $("#modal-watch-detail-oil h5.modal-title").html(title);
                //   var all = all_amount + 7000;
                // $(".all").text(all);
               //  $(".change-input-ajax #change_shareholder_id").html(data['data']);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }
        });
        $("#modal-watch-detail-oil").modal();
        return false;
    });

    // Sự kiện modal đóng thì các giá trị trở về ban đầu
    $("#modal-watch-detail-oil").on('hidden.bs.modal', function () {
        $("#t-body-oil").html("");
    })
   
     //Xem chi tiết chi lương cho cổ đông từ ngày này đến ngày này
     $("span.watch_detail_salary").click(function () {  
        var id = $(this).attr("data-id");
        var curr = $(this).attr("data-curr");
        var from =$("input#from_date_salary").val();
        var to =$("input#to_date_salary").val();
       
        var data = { id: id,
            curr: curr,
            from: from,
            to: to
        };
        console.log(data);
        // alert(from);
        $.ajax({
            url: "?mod=report&action=watch_salary_ajax",
            method: "POST",
            dataType: "json",
            data: data,
            
            success: function (data) {
                var info = "";
                var stt =1;
                var sum_money=0;
                var title = "Thông tin chi lương cho : "+data[0]['user_lname']+" "+data[0]['user_mname']+" "+data[0]['user_fname'];
                data.forEach(item => {
                    sum_money=sum_money+parseFloat(item['money']);
                    var temp = "<tr><td>"+stt+"</td><td>"+formatDateInJS(item['date'])+"</td><td>"+formatMoneyInJS(item['money'])+"</td><td>"+item['acc_name']+"</td><td>"+item['ship_name']+"</td><td>" +item['des']+"</td><tr>";
                    info =info +temp;
                    stt = stt +1;
                });
                var sum ="<tr style='color: #000;font-size:18px;font-weight:600;'><td colspan='2'>Tổng tiền</td><td>"+formatMoneyInJS(sum_money)+"</td><td></td><td></td></tr>";
                info =info+sum;
                $("#t-body-salary").append(info);
                $("#modal-watch-detail-salary h5.modal-title").html(title);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }
        });
        $("#modal-watch-detail-salary").modal();
        return false;
    });

    // Sự kiện modal đóng thì các giá trị trở về ban đầu
    $("#modal-watch-detail-salary").on('hidden.bs.modal', function () {
        $("#t-body-salary").html("");
    })

    //Xem chi tiết chi tiền lãi cho cổ đông từ ngày này đến ngày này
    $("span.watch_detail_interest").click(function () {  
        var id = $(this).attr("data-id");
        var curr = $(this).attr("data-curr");
        var from =$("input#from_date_interest").val();
        var to =$("input#to_date_interest").val();
       
        var data = { id: id,
            curr: curr,
            from: from,
            to: to
        };
        console.log(data);
        // alert(from);
        $.ajax({
            url: "?mod=report&action=watch_interest_ajax",
            method: "POST",
            dataType: "json",
            data: data,
            
            success: function (data) {
                var info = "";
                var stt =1;
                var sum_money=0;
                var title = "Thông tin chi tiền lãi cho : "+data[0]['user_lname']+" "+data[0]['user_mname']+" "+data[0]['user_fname'];
                data.forEach(item => {
                    sum_money=sum_money+parseFloat(item['money']);
                    var temp = "<tr><td>"+stt+"</td><td>"+formatDateInJS(item['date'])+"</td><td>"+formatMoneyInJS(item['money'])+"</td><td>"+item['acc_name']+"</td><td>"+item['ship_name']+"</td><td>" +item['des']+"</td><tr>";
                    info =info +temp;
                    stt = stt +1;
                });
                var sum ="<tr style='color: #000;font-size:18px;font-weight:600;'><td colspan='2'>Tổng tiền</td><td>"+formatMoneyInJS(sum_money)+"</td><td></td><td></td></tr>";
                info =info+sum;
                $("#t-body-interest").append(info);
                $("#modal-watch-detail-interest h5.modal-title").html(title);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert("loi");
                alert(xhr.status);
                alert(thrownError);
            }
        });
        $("#modal-watch-detail-interest").modal();
        return false;
    });

    // Sự kiện modal đóng thì các giá trị trở về ban đầu
    $("#modal-watch-detail-interest").on('hidden.bs.modal', function () {
        $("#t-body-interest").html("");
    })

    // INITIALIZE DATEPICKER PLUGIN
    $('.datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy"
    });


    // FOR DEMO PURPOSE
    $('#reservationDate').on('change', function () {
        var pickedDate = $('input').val();
        $('#pickedDate').html(pickedDate);
    });
    ///==============XUẤT FILE BÁO CÁO================
    // $("button#btnExport_index").click(function () {
    //     var from =$("input#from_date").val();
    //     var to =$("input#to_date").val();
    //     var data = { 
    //         from: from,
    //         to: to
    //     };
    //     console.log(data);
    //     $.ajax({
    //         url: "?mod=report&action=createFileExcel",
    //         method: "POST",
    //         dataType: "json",
    //         data: data,
            
    //         success: function (data) {
    //           // alert("Ok");
    //         },
    //         error: function (xhr, ajaxOptions, thrownError) {
    //             alert("loi");
    //             alert(xhr.status);
    //             alert(thrownError);
    //         }
    //     });
    // });
});