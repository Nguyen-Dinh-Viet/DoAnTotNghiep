<script>
// ========== CỔNG VÀO ==========
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
                    $("input#RFIDcode").val("");
                    $("input#license_plates").val("");
                    $("input#Image_License_Plate_Base64").val("");
                    $("input#Image_Face_Base64").val("");
                    $("input#RFIDcode_out").val("");
                    $("input#license_plates_out").val("");
                    $("input#Image_License_Plate_Base64_out").val("");
                    $("input#Image_Face_Base64_out").val("");
                    $("input#TimeOut").val("");
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
// Ví dụ
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
        $('#VideoDeviceID1_out').append($('<option>', {
            value: myVideoInputs[i].deviceId,
            text: myVideoInputs[i].label
        }));
        $('#VideoDeviceID2_out').append($('<option>', {
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
var license;
// Execute a function when the user presses a key on the keyboard
RFIDinput.addEventListener("keypress", async function(event) {
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
            let image_data_ALPR = canvas1.toDataURL('image/jpeg');
            let image_data_FACE = canvas2.toDataURL('image/jpeg');
            // console.log(image_data_FACE);


            // const responseALPR = await fetch('http://localhost:5000/lp_detect', {
            //     method: 'POST',
            //     body: JSON.stringify(data), // string or object
            //     headers: {
            //         'Content-Type': 'application/json'
            //     }
            // });
            //const myALPR = responseALPR.json(); //extract JSON from the http response
            // do something with myJson
            //console.log(responseALPR);

            // const responseFACE = await fetch('http://localhost:5001/face_register', {
            //     method: 'POST',
            //     body: JSON.stringify(data), // string or object
            //     headers: {
            //         'Content-Type': 'application/json'
            //     }
            // });
            //const myFACE = await responseFACE.json(); //extract JSON from the http response
            // do something with myJson
            // console.log(responseFACE);

            // const fetch = require("node-fetch");
            // const FormData = require("form-data");
            // const fs = require("fs");

            // let image_path = "/path/to/car.jpg";
            let body = new FormData();
            // body.append("upload", fs.createReadStream(image_path));
            body.append('upload', image_data_ALPR);
            body.append("regions", "vn"); // Change to your country
            const data_response = await fetch("http://localhost:5000/lp_detect", {
                method: "POST",
                body: body,
            }).then(response => response.json());

            // data_response.then(function(getData) {
            //     metaData = getData;
            // });
            // console.log(data_response.results);
            // console.log(data_response.then(function(result)
            // const reponseALPR = await data_response.json();
            // console.log(reponseALPR);
            // const response_ALPR = data_response?.json()?.results[0];

            if (data_response.results.length != 0) {
                const plate = data_response.results[0].plate;
                $("#license_plates").val(plate);
                let timeCheckIn = getTimeFormated();
                // timeCheckIn = date('ss:mm:HH d/m/Y');
                $('#TimeIn').val(timeCheckIn);
                //btnSubmit.disabled = false;
                $('#Image_License_Plate_Base64').val(image_data_ALPR);
                $('#Image_Face_Base64').val(image_data_FACE);

                var license = $("#license_plates").val();
                // console.log(license);
                var data = {
                    RFIDcode: RFIDinput.value,
                    Image_License_Plate_Base64: image_data_ALPR,
                    LicensePlates: license,
                    Image_Face_Base64: image_data_FACE,
                };
                const responseFACE = await fetch('http://localhost:5001/face_register', {
                    method: 'POST',
                    body: JSON.stringify(data), // string or object
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(response => response.json());
                // // const myFACE = await responseFACE.json(); //extract JSON from the http response
                // // do something with myJson
                console.log(responseFACE.status);
                if (responseFACE.status == "true") {
                    $('#btn_addCarCheckIn').removeAttr('disabled');
                } else {
                    alert('ERROR: Không nhận diện được khuôn mặt!!!');
                }
            } else {
                alert("ERROR: Không nhận dạng được biển số!");
                $("#RFIDcode").val("");
            }
        }
    }
});

// ========== CỔNG RA ==========
// const myVideoInputs_out = [];
var vidElement1_out = null;
var vidElement2_out = null;


const doStartCamera_out = (button) => {
    const id = button.id;
    switch (id) {
        case 'startCamera1_out':
            startCamera($('#VideoDeviceID1_out').val(), videoElement1_out);
            break;
        case 'startCamera2_out':
            startCamera($('#VideoDeviceID2_out').val(), videoElement2_out);
            break;
    }
}

const doStopCamera_out = (button) => {
    const id = button.id;
    switch (id) {
        case 'stopCamera1_out':
            cleanUp(videoElement1_out);
            break;
        case 'stopCamera2_out':
            cleanUp(videoElement2_out);
            break;
    }
}

var RFIDinput_out = document.getElementById("RFIDcode_out");
let canvas1_out = document.querySelector("#canvas_video1_out");
let canvas2_out = document.querySelector("#canvas_video2_out");
// Execute a function when the user presses a key on the keyboard
RFIDinput_out.addEventListener("keypress", async function(event) {
    // If the user presses the "Enter" key on the keyboard
    if (event.key === "Enter") {
        // Cancel the default action, if needed
        event.preventDefault();
        // Trigger the button element with a click
        if (videoElement1_out.srcObject == null) {
            alert("ERROR: Camera Biển số xe chưa được bật!!!");
            $("#RFIDcode_out").val("");
        } else if (videoElement2_out.srcObject == null) {
            alert("ERROR: Camera Khuôn mặt chưa được bật!!!");
            $("#RFIDcode_out").val("");
        } else {
            canvas1_out.getContext('2d').drawImage(videoElement1_out, 0, 0, canvas1.width, canvas1_out
                .height);
            canvas2_out.getContext('2d').drawImage(videoElement2_out, 0, 0, canvas2.width, canvas2_out
                .height);
            let image_data_ALPR_out = canvas1_out.toDataURL('image/jpeg');
            let image_data_FACE_out = canvas2_out.toDataURL('image/jpeg');

            let body = new FormData();
            // body.append("upload", fs.createReadStream(image_path));
            body.append('upload', image_data_ALPR_out);
            body.append("regions", "vn"); // Change to your country
            const data_response = await fetch("http://localhost:5000/lp_detect", {
                method: "POST",
                body: body,
            }).then(response => response.json());
            if (data_response.results.length != 0) {
                const plate = data_response.results[0].plate;
                $("#license_plates_out").val(plate);
                let timeCheckOut = getTimeFormated();
                // timeCheckIn = date('ss:mm:HH d/m/Y');
                $('#TimeOut').val(timeCheckOut);
                //btnSubmit.disabled = false;
                $('#Image_License_Plate_Base64_out').val(image_data_ALPR_out);
                $('#Image_Face_Base64_out').val(image_data_FACE_out);

                var license_out = $("#license_plates_out").val();
                // console.log(license_out);
                var data_out = {
                    RFIDcode: RFIDinput_out.value,
                    Image_License_Plate_Base64_out: image_data_ALPR_out,
                    LicensePlates_out: license_out,
                    Image_Face_Base64_out: image_data_FACE_out,
                };
                const responseFACE_out = await fetch('http://localhost:5001/face_checkFace', {
                    method: 'POST',
                    body: JSON.stringify(data_out), // string or object
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(response => response.json());


                if (responseFACE_out.status == license_out) {
                    $('#btn_addCarCheckOut').removeAttr('disabled');
                } else {
                    alert('ERROR: Không nhận dạng được khuôn mặt!!!');
                }
            } else {
                alert("ERROR: Không nhận diện được biển số!");
                $("#RFIDcode_out").val("");
            }
        }
    }
});
</script>