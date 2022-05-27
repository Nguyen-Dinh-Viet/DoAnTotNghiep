$(document).ready(function(){
    $('#btn-import').click(function(){
        
    var selectedFile = $('#file_upload')[0].files[0];
    var reader = new FileReader();
    reader.onload = function(event) {
    var data = event.target.result;
    var workbook = XLSX.read(data, {
    type: 'binary'
    });
    workbook.SheetNames.forEach(function(sheetName) {
    var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
    var json_object = JSON.stringify(XL_row_object);
    console.log(sheetName);
    console.log(json_object);
    var data ={
        data: XL_row_object,
        sheet: sheetName
    }
    $.ajax({
    url: '?mod=ledgers&action=importExcel',
    type: 'POST',
    data:  data,
    dataType: 'json',
    success:function(data) {
        
        if(data['error'] == false)
        {
            alert("Thêm mới dữ liệu thành công!");
        }
        else{
            alert("Có lỗi xảy ra!");
        }
    
    location.reload();
    },
    error: function (e) {
    }
    });
    })
    };
    reader.onerror = function(event) {
    console.error("File could not be read! Code " + event.target.error.code);
    };
    reader.readAsBinaryString(selectedFile);
    });
    });