<?php get_header(); ?>
<?php get_sidebar(); ?>
<script>
var vidElement = null;

function start() {
    var camAvailable = navigator.mediaDevices && navigator.mediaDevices.getUserMedia;
    if (camAvailable) {
        vidElement = document.getElementById("videoElement");
        navigator.mediaDevices.getUserMedia({
            video: true
        }).then(function(stream) {
            vidElement.srcObject = stream;
            vidElement.play();
        });
    }
}

function stop() {
    // vidElement.pause();
    var stream = vidElement.srcObject;
    var tracks = stream.getTracks();

    for (var i = 0; i < tracks.length; i++) {
        var track = tracks[i];
        track.stop();
    }

    vidElement.srcObject = null;
}
</script>
<style>
#videoElement {
    width: 500px;
    height: 375px;
    background-color: #666;
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
            <div class="page-wrapper">
                <!-- Page-body start -->
                <div class="page-body" style="width:100%">
                    <div class="row">
                        <video autoplay="true" id="videoElement">
                        </video>
                        <div>
                            <button onclick="start();">Start</button>
                            <button onclick="stop();">Stop</button>
                        </div>
                    </div>
                </div>
                <!-- Page-body end -->
            </div>
            <div id="styleSelector"> </div>
        </div>
    </div>
</div>
<script>
// var video = document.querySelector("#videoElement");

// if (navigator.mediaDevices.getUserMedia) {
//     navigator.mediaDevices.getUserMedia({
//             video: true
//         })
//         .then(function(stream) {
//             video.srcObject = stream;
//         })
//         .catch(function(err0r) {
//             console.log("Something went wrong!");
//         });
// } else {
//     console.log("getUserMedia not supported!");
// }


// cameraService(cameraStop) {
//     var front = false;
//     var constraints = {
//         video: {
//             facingMode: (front ? "user" : "environment")
//         }
//     };

//     function handleSuccess(stream) {
//         const video = document.querySelector('#video');
//         video.srcObject = stream;
//         if (cameraStop == true) {
//             video.play();
//             console.log("On Stream");
//         } else {
//             stopStream(stream);
//             console.log("Off Stream");
//         }
//     }

//     function showVideo() {
//         this.video.classList.add("visible");
//     }

//     function handleError(error) {
//         console.log('getUserMedia error: ', error);
//     }

//     navigator.mediaDevices.getUserMedia(constraints).
//     then(handleSuccess).catch(handleError);

//     function stopStream(stream) {

//         for (let track of stream.getTracks()) {
//             track.stop()
//         }
//     }
// }
</script>
<?php get_footer(); ?>