<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100vw, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle??'Title' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ url('js/app.js') }}"></script>
    <script>
        var SoundTimeOut;
        function playSoundAlert() {
            let alertAudioElement = document.getElementById("AlertAudio");
            let stopAlertElement = $('#StopAlert');

            stopAlertElement.show();

            // console.log(alertAudioElement)//
            // alertAudioElement.pause();
            // alertAudioElement.currentTime = 0;
            alertAudioElement.play()
            // alertAudioElement.loop = true;
            // SoundTimeOut = setTimeout(function(){
            //     playSoundAlert();
            // }, 1000);
        }

        function stopSoundAlert() {
            let stopAlertElement = $('#StopAlert');
            let alertAudioElement = document.getElementById("AlertAudio");

            alertAudioElement.pause();
            alertAudioElement.currentTime = 0;
            stopAlertElement.hide();
            clearTimeout(SoundTimeOut);
        }

        $(function(){
            const Echo = window.Echo;
    
            // console.log('tes')
            let deviceChannel = Echo.channel('device-status');

            // deviceChannel.listen('DeviceStatusUpdate', function(event) {
            //     console.log('listen');
            //     console.log(event);
            //     if (event.status!='' && (event.status==1 || event.status==0)) {
            //         let status = event.status==1?'Berjalan':'Berhenti';
            //         if (event.status==1){
            //             $(`.device-card[data-deviceid="${event.deviceID}"]`).find('.DeviceStatus').removeClass('status0')
            //         } else {
            //             $(`.device-card[data-deviceid="${event.deviceID}"]`).find('.DeviceStatus').addClass('status0')
            //         }
            //         $(`.device-card[data-deviceid="${event.deviceID}"]`).find('.DeviceStatus').text(status)
            //     }
            //     if (event.quota!='') {
            //         $(`.device-card[data-deviceid="${event.deviceID}"]`).find('.DeviceQuota').text(event.quota)
            //     }
            //     if (event.battery!='') {
            //         $(`.device-card[data-deviceid="${event.deviceID}"]`).find('.DeviceBattery').text(event.battery)
            //     }
            // });

            deviceChannel.listen('DeviceStatusUpdate', function(event) {
                // console.log('listennnn');
                // console.log(event);
                // console.log($(`.table-content-item[data-deviceid="${event.deviceID}"]`).find('.DeviceStatus'));
                if (event.status!='' && (event.status==1 || event.status==0)) {
                    let status = event.status==1?'Berjalan':'Berhenti';
                    if (event.status==1){
                        $(`.table-content-item[data-deviceid="${event.deviceID}"]`).find('.DeviceStatus').removeClass('status0')
                    } else {
                        playSoundAlert();
                        $(`.table-content-item[data-deviceid="${event.deviceID}"]`).find('.DeviceStatus').addClass('status0')
                    }
                    $(`.table-content-item[data-deviceid="${event.deviceID}"]`).find('.DeviceStatus').text(status)
                }
                if (event.quota!='') {
                    $(`.table-content-item[data-deviceid="${event.deviceID}"]`).find('.DeviceQuota').text(event.quota)
                }
                if (event.battery!='') {
                    $(`.table-content-item[data-deviceid="${event.deviceID}"]`).find('.DeviceBattery').text(event.battery)
                }
                if (event.ampere!='') {
                    $(`.table-content-item[data-deviceid="${event.deviceID}"]`).find('.DeviceAmpere').text(event.ampere)
                }
                if (event.tegangan!='') {
                    $(`.table-content-item[data-deviceid="${event.deviceID}"]`).find('.DeviceTegangan').text(event.tegangan)
                }
            });
        })

        $(document).on('click', '#StopAlert', function(){
            stopSoundAlert();
        })
    </script>

    <audio id="AlertAudio" loop>
        <source src="{{ asset("/storage/sound/Alert.mp3") }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

    @yield('content')

</body>
</html>