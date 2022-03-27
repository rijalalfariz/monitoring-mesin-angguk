<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=100vw, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle??'Title' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .sidebar {
            width: 18.75vw;
            min-width: 18.75vw;
            height: 100vh;
            display: inline;
            box-shadow: 4px 4px 16px rgba(0,0,0,0.25)
        }

        .company-title {
            width: 100%;
            height: 18%;
            background-color: #30475e;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .pages {
            display: flex;
            flex-direction: column;
            margin-top: 36px;
        }

        .page-text {
            height: 64px;
            padding: 0px 0px 0px 48px;
            font-size: 18px;
            color: #121212;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .page-text.active {
            background-color: #f05454;
            color: white;
        }

        .main-content {
            display: flex;
            width: 100%;
            flex-basis: 0;
            flex-grow: 1;
        }

        .navbar {
            width: 100%;
            height: 64px;
            padding: 0px 64px 0px 48px;
            align-items: center;
            justify-content: space-between;
            box-shadow: 4px 4px 16px rgba(0,0,0,0.25);
            background-color: white;
        }

        .page-now {
            font-size: 18px;
        }

        .user-group {
            display: flex;
            align-items: center;
        }

        .user-image {
            width: 48px;
            height: 48px;
            border-radius: 48px;
            margin-right: 18px;
            background-color: #f05454;
        }

        .user-name {
            font-size: 18px;
        }

        .content {
            display: block;
            overflow: auto;
        }

        .device-table {
            border-radius: 8px;
            box-shadow: 4px 4px 16px rgba(0,0,0,0.25);
            margin: 64px;
            padding: 0px 0px 45px;
            /* width: 100%; */
        }

        .head-table {
            height: 48px;
            padding: 0px 0px 0px 48px;
            display: flex;
            align-items: center;
            border-bottom: 4px solid #30475e;
        }

        .head-table-text {
            margin-right: 48px;
            font-size: 18px;
            /* text-align: center; */
        }

        .table-content {
            min-height: 48px;
        }

        .table-content-item {
            height: 48px;
            padding: 0px 0px 0px 48px;
            display: flex;
            align-items: center;
        }

        .table-content-item.odd {
            background-color: #eef2f6;
        }

        .aksi-button {
            height: 32px;
            width: 32px;
            border-radius: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 2px 2px 4px rgba(0,0,0,0.25);
            border: none;
            justify-content: center
        }

        .bg-f0 {
            background-color: #f05454;
        }
        .bg-ee {
            background-color: #eef2f6;
        }
        .bg-30 {
            background-color: #30475e;
        }
        .bg-ff {
            background-color: white;
        }
        .bg-54 {
            background-color: #54F076;
        }

        .shadow-small {
            box-shadow: 2px 2px 4px rgba(0,0,0,0.25);
        }
        .shadow-big {
            box-shadow: 4px 4px 16px rgba(0,0,0,0.25);
        }

        .mb36 {
            margin-bottom: 36px;
        }
        .mb18 {
            margin-bottom: 18px;
        }
        .mr36 {
            margin-right: 36px;
        }
        .mt10v {
            margin-top: 10vh;
        }

        .p64{
            padding: 64px;
        }
        .pb36 {
            padding-bottom: 36px;
        }
        .pt36 {
            padding-top: 36px;
        }

        .btn {
            border: none;
            border-radius: 1000px;
            height: 48px;
            color: #f05454;
        }
        .btn.bg-f0 {
            color: white;
        }
        .btn.fix {
            width: 120px;
        }

        .div-grow {
            flex-basis: 0;
            flex-grow: 1;
        }
    </style>
    <style>
        .h-screen {
            height: 100vh;
        }

        .company-logo {
            height: 120px;
        }

        .form-container-1 {
            height: 600px;
            width: 480px;
            border-radius: 24px;
        }

        .sub-form-container-1 {
            height: 480px;
            width: 480px;
            border-radius: 24px;
            background-color: white;
            padding: 64px;
        }
        
        .form-text-small {
            font-size: 12px;
        }

        .form-input {
            height: 48px;
            background-color: #eef2f6;
            border-radius: 1000px;
            border: none;
            padding: 0px 24px;
            display: flex;
            align-items: center;
        }
        .form-input:focus {
            border: none;
            outline: none;
        }
        .form-input:disabled {
            background-color: #FBF4D0;
        }

        .table-input {
            border-radius: 8px;
            border: 1px solid #30475e4f;
            font-size: 16px;
            padding: 4px  12px;
        }
        .table-input:focus {
            outline: 1px solid #30475e;
        }
        button:focus {
            outline: none;
            box-shadow: none;
        }

        .status0 {
            color: #F05454;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif
        }

        a{
            color: unset;
        }
        a:hover{
            color: unset;
            text-decoration: none;
        }
    </style>
    <style>
        .profile-card {
            height: fit-content;
            min-height: 312px;
            width: fit-content;
            min-width: 720px;
            background-color: white;
            border-radius: 8px;
        }

        .foto-profil-container {
            width: 240px;
            height: 240px;
            border-radius: 300px;
        }
    </style>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ url('js/app.js') }}"></script>
    <script>
        $(function(){
            const Echo = window.Echo;
    
            console.log('tes')
            let deviceChannel = Echo.channel('device-status');
    
            deviceChannel.listen('DeviceStatusUpdate', function(event) {
                console.log('listen');
                console.log(event);
                if (event.status!='' && (event.status==1 || event.status==0)) {
                    let status = event.status==1?'Berjalan':'Berhenti';
                    if (event.status==1){
                        $(`.table-content-item[data-id-device="${event.deviceID}"]`).find('.DeviceStatus').removeClass('status0')
                    } else {
                        $(`.table-content-item[data-id-device="${event.deviceID}"]`).find('.DeviceStatus').addClass('status0')
                    }
                    $(`.table-content-item[data-id-device="${event.deviceID}"]`).find('.DeviceStatus').text(status)
                }
                if (event.quota!='') {
                    $(`.table-content-item[data-id-device="${event.deviceID}"]`).find('.DeviceQuota').text(event.quota+' MB')
                }
                if (event.battery!='') {
                    $(`.table-content-item[data-id-device="${event.deviceID}"]`).find('.DeviceBattery').text(event.battery)
                }
            });
        })
    </script>

    @yield('content')

</body>
</html>