<?php get_header(); ?>
<?php get_sidebar(); ?>
<style>
.video video {
    width: 15rem;
    height: 10.5rem;
    background-color: #f3f3f3;
}

#videoElement1 {
    background-image: url(./assets/images/Cong_Do_Xe.png);
    background-size: cover;
}

#videoElement2 {
    background-image: url(./assets/images/KimDami.jpg);
    background-size: cover;
}

.image canvas {
    width: 100%;
    height: 100%;
}

.btn-video .button-3 {
    appearance: none;
    background-color: #2ea44f;
    border: 1px solid rgba(27, 31, 35, .15);
    border-radius: 6px;
    box-shadow: rgba(27, 31, 35, .1) 0 1px 0;
    box-sizing: border-box;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-family: -apple-system, system-ui, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
    font-size: 14px;
    font-weight: 600;
    line-height: 20px;
    padding: 6px 16px;
    position: relative;
    text-align: center;
    text-decoration: none;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    vertical-align: middle;
    white-space: nowrap;
}

.button-3:focus:not(:focus-visible):not(.focus-visible) {
    box-shadow: none;
    outline: none;
}

.button-3:hover {
    background-color: #2c974b;
}

.button-3:focus {
    box-shadow: rgba(46, 164, 79, .4) 0 0 0 3px;
    outline: none;
}

.button-3:disabled {
    background-color: #94d3a2;
    border-color: rgba(27, 31, 35, .1);
    color: rgba(255, 255, 255, .8);
    cursor: default;
}

.button-3:active {
    background-color: #298e46;
    box-shadow: rgba(20, 70, 32, .2) 0 1px 0 inset;
}

.control-label {
    text-align: center;
    background-color: #2ea44f;
    padding: 0.5em 0.5em 0.5em;
    border-radius: 0.5em;
    color: #f3f3f3;
    font-weight: 600;
    text-transform: uppercase;
    margin-left: 0.4rem;
    margin-top: 0.4em;
    /* margin-left: 33rem; */
}
</style>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Hệ thống bãi đỗ xe có xác thực đa cấp</h5>
                        <p class="m-b-0">Trang chủ</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="?mod=home"> <i class="fa fa-home"></i> </a>
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
            <div class="page-wrapper" style="padding-top:0rem;">
                <!-- Page-body start -->
                <div class="page-body" style="width:100%">
                    <div class="row">
                        <div class="col-md-1" style="padding:0em;">
                            <label class="control-label">Cổng vào</label>
                        </div>
                        <div class="col-md-8">
                            <!-- video 1 -->
                            <div class="row" style="margin-bottom:1rem; ">
                                <div class="col-md-4 video" style="text-align: center;">
                                    <label class="">Camera biển số xe</label>
                                    <video autoplay="true" id="videoElement1" class="">
                                    </video>
                                </div>
                                <div class="btn-video col-md-4" style="margin-top: 2em;text-align: center;">
                                    <select name="VideoDeviceID" id="VideoDeviceID1" class="form-control">
                                        <option value="0">Chọn thiết bị</option>
                                    </select>
                                    <!-- <button class="btn btn-default" id="" onclick="getDevicesInfo()">Devices</button> -->
                                    <button class="button-3" id="startCamera1"
                                        style="margin-bottom:1rem;margin-top:1rem;" role="button"
                                        onclick="doStartCamera(this)">Bật Camera</button>
                                    <button class="button-3" id="stopCamera1" style="background-color: red"
                                        role="button" onclick="doStopCamera(this);">Tắt Camera</button>
                                </div>
                                <div class="col-md-4 image" style="text-align: center;padding-left:0em">
                                    <label class="">Ảnh biển số xe</label>
                                    <div class="" style="background-color:antiquewhite; height:12em">
                                        <canvas id="canvas_video1"
                                            value="<?php echo set_value('ImageLicensePlates') ?>"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- Video 2 -->
                            <div class="row" style="margin-bottom:1rem; ">
                                <div class="col-md-4 video" style="text-align: center;">
                                    <label class="">Camera khuôn mặt</label>
                                    <video autoplay="true" id="videoElement2" class="">
                                    </video>
                                </div>
                                <div class="btn-video col-md-4" style="margin-top: 2em;text-align: center;">
                                    <select name="VideoDeviceID" id="VideoDeviceID2" class="form-control">
                                        <option value="0">Chọn thiết bị</option>
                                    </select>
                                    <button class="button-3" id="startCamera2"
                                        style="margin-bottom:1rem;margin-top:1rem;" role="button"
                                        onclick="doStartCamera(this)">Bật Camera</button>
                                    <button class="button-3" id="stopCamera2" style="background-color: red"
                                        role="button" onclick="doStopCamera(this);">Tắt Camera</button>
                                </div>
                                <div class="col-md-4 image" style="text-align: center;padding-left:0em">
                                    <label class="">Ảnh khuôn mặt</label>
                                    <div class="" style="background-color:antiquewhite; height:12em">
                                        <canvas id="canvas_video2"
                                            value="<?php echo set_value('ImageFace') ?>"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-block" id="CarCheckIn">
                                <!-- Mã thẻ RFID -->
                                <div class="form-group">
                                    <label for="RFIDcode">Mã thẻ RFID</label>
                                    <input id="RFIDcode" type="text" name="RFIDcode"
                                        value="<?php echo set_value('RFIDcode') ?>" class="form-control"
                                        placeholder="Mã thẻ RFID" autofocus autocomplete="off">
                                    <?php echo form_error('Name') ?>
                                </div>
                                <!-- Biển số xe -->
                                <div class="form-group">
                                    <label for="license_plates">Biển số xe</label>
                                    <input id="license_plates" type="text" name="license_plates"
                                        value="<?php echo set_value('license_plates') ?>" class="form-control"
                                        placeholder="Biển số xe" autocomplete="off">
                                    <?php echo form_error('Age') ?>
                                </div>
                                <!-- Thời gian vào -->
                                <div class="form-group">
                                    <label for="TimeIn">Thời gian vào</label>
                                    <input id="TimeIn" type="text" name="TimeIn"
                                        value="<?php echo set_value('TimeIn') ?>" class="form-control"
                                        placeholder="Thời gian vào">
                                    <?php echo form_error('TimeIn') ?>
                                </div>
                                <div hidden>
                                    <!--Url Hình ảnh -->
                                    <div class="form-group">
                                        <label for="Image_License_Plate_Base64">Ảnh Biển số xe</label>
                                        <input id="Image_License_Plate_Base64" type="text"
                                            name="Image_License_Plate_Base64"
                                            value="<?php echo set_value('Image_License_Plate_Base64') ?>"
                                            class="form-control" placeholder="Ảnh Biển số xe">
                                        <?php echo form_error('Image_License_Plate_Base64') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="Image_Face_Base64">Ảnh Khuôn mặt</label>
                                        <input id="Image_Face_Base64" type="text" name="Image_Face_Base64"
                                            value="<?php echo set_value('Image_Face_Base64') ?>" class="form-control"
                                            placeholder="Ảnh khuôn mặt">
                                        <?php echo form_error('Image_Face_Base64') ?>
                                    </div>
                                </div>
                                <!-- Button thêm mới -->
                                <?php echo form_error('homes') ?>
                                <button type="submit" class="btn btn-success" name="btn-submit"
                                    id="btn_addCarCheckIn">Thêm
                                    mới
                                    <!-- <a href="?mod=homes&action=addCar"></a> -->
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
            <div id=" styleSelector">
            </div>
        </div>
    </div>
</div>

<script>
const myVideoInputs = [];
var vidElement1 = null;
var vidElement2 = null;
window.onload = async () => {
    await navigator.mediaDevices.enumerateDevices()
        .then(results => {
            //console.log(results);
            results.forEach(result => {
                if (result.kind === 'videoinput') {
                    // console.log(result);
                    myVideoInputs.push(result);
                    // console.log(myVideoInputs);
                    // console.log(myVideoInputs.length);
                    loopArray();
                }
            })
        })
        .catch(error => {
            console.log(error);
        });
}

function loopArray() {
    for (let i = 0; i < myVideoInputs.length; i++) {
        $('#VideoDeviceID1').append($('<option>', {
            value: myVideoInputs[i].deviceId,
            text: myVideoInputs[i].label
        }));
        $('#VideoDeviceID2').append($('<option>', {
            value: myVideoInputs[i].deviceId,
            text: myVideoInputs[i].label
        }));
    }
}

const doStartCamera = (button) => {
    const id = button.id;
    switch (id) {
        case 'startCamera1':
            startCamera($('#VideoDeviceID1').val(), videoElement1);
            break;
        case 'startCamera2':
            startCamera($('#VideoDeviceID2').val(), videoElement2);
            break;
    }
}

const startCamera = async (myVideoInputID, whichCamera) => {
    if (myVideoInputID == 0) {
        alert("ERROR: Bạn cần chọn thiết bị Camera!!!");
        console.log('myVideoInput is undefined');
        return;
    }
    await navigator.mediaDevices.getUserMedia({
            video: {
                deviceId: myVideoInputID,
            }
        })
        .then(stream => {
            whichCamera.srcObject = stream;
        })
        .catch(error => {
            console.log(error);
        });
}

const doStopCamera = (button) => {
    const id = button.id;
    switch (id) {
        case 'stopCamera1':
            cleanUp(videoElement1);
            break;
        case 'stopCamera2':
            cleanUp(videoElement2);
            break;
    }
}

const cleanUp = (whichCamera) => {
    try {
        const stream = whichCamera.srcObject;
        const tracks = stream.getTracks();
        tracks.forEach(track => track.stop());
        whichCamera.srcObject = null;
    } catch (error) {
        console.log(error);
    }
}

function getTimeFormated() {
    let date = new Date();
    let strDate =
        ("00" + date.getHours()).slice(-2) + ":" + ("00" + date.getMinutes()).slice(-2) + ":" + ("00" + date
            .getSeconds()).slice(-2) + " " +
        ("00" + (date.getMonth() + 1)).slice(-2) + "/" + ("00" + date.getDate()).slice(-2) + "/" + date.getFullYear();
    return strDate;
}

var RFIDinput = document.getElementById("RFIDcode");
let canvas1 = document.querySelector("#canvas_video1");
let canvas2 = document.querySelector("#canvas_video2");
// Execute a function when the user presses a key on the keyboard
RFIDinput.addEventListener("keypress", function(event) {
    // If the user presses the "Enter" key on the keyboard
    if (event.key === "Enter") {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        if (videoElement1.srcObject == null) {
            alert("ERROR: Camera Biển số xe chưa được bật!!!");
            $("#RFIDcode").val("");
        } else if (videoElement2.srcObject == null) {
            alert("ERROR: Camera Khuôn mặt chưa được bật!!!");
            $("#RFIDcode").val("");
        } else {
            canvas1.getContext('2d').drawImage(videoElement1, 0, 0, canvas1.width, canvas1
                .height);
            canvas2.getContext('2d').drawImage(videoElement2, 0, 0, canvas2.width, canvas2
                .height);
            $("#license_plates").val("34A-00028");
            let timeCheckIn = getTimeFormated();
            // timeCheckIn = date('ss:mm:HH d/m/Y');
            $('#TimeIn').val(timeCheckIn);
            //btnSubmit.disabled = false;
            let image_data_url_1 = canvas1.toDataURL('image/jpeg');
            let image_data_url_2 = canvas2.toDataURL('image/jpeg');
            $('#Image_License_Plate_Base64').val(image_data_url_1);
            $('#Image_Face_Base64').val(image_data_url_2);
        }
    }
});



// var vidElement1 = null;

// function startVideo1() {
//     var camAvailable = navigator.mediaDevices && navigator.mediaDevices.getUserMedia;
//     if (camAvailable) {
//         vidElement1 = document.getElementById("videoElement1");
//         navigator.mediaDevices.getUserMedia({
//             video: true
//         }).then(function(stream) {
//             vidElement1.srcObject = stream;
//             vidElement1.play();
//         });
//     }
// }

// function stopVideo1() {
//     var stream = vidElement1.srcObject;
//     var tracks = stream.getTracks();

//     for (var i = 0; i < tracks.length; i++) {
//         var track = tracks[i];
//         track.stop();
//     }

//     vidElement1.srcObject = null;
// }

// var vidElement2 = null;

// function startVideo2() {
//     var camAvailable = navigator.mediaDevices && navigator.mediaDevices.getUserMedia;
//     if (camAvailable) {
//         vidElement2 = document.getElementById("videoElement2");
//         navigator.mediaDevices.getUserMedia({
//             video: true
//         }).then(function(stream) {
//             vidElement2.srcObject = stream;
//             vidElement2.play();
//         });
//     }
// }

// function stopVideo2() {
//     var stream = vidElement2.srcObject;
//     var tracks = stream.getTracks();

//     for (var i = 0; i < tracks.length; i++) {
//         var track = tracks[i];
//         track.stop();
//     }

//     vidElement2.srcObject = null;
// }
</script>
<?php get_footer(); ?>