const { trim } = require("lodash");

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
})

$(document).on('click', '.EditBtn', function() {
    // let parent = $(this).parents('.device-card');
    let parent = $(this).parents('.table-content-item');
    let NamaDevice = trim(parent.find('.DeviceName').text());
    let html = `<input class="head-table-text table-input NameInput" type="text" placeholder="Nama Device" style="width: 100%">`
    console.log(parent)
    parent.find('.DeviceName').html('');
    parent.find('.DeviceName').html(html);
    parent.find('.NameInput').val(NamaDevice);
    parent.find('.OriginalBtnGroup').hide()
    parent.find('.EditBtnGroup').show()
})

$(document).on('click', '.UpdateDevice', function() {
    let parent = $(this).parents('.table-content-item');
    // let parent = $(this).parents('.device-card');
    let _token = $('input[name="_token"]').val();
    $.ajax({
        type: 'post',
        url: `/device/edit/${parent.data('deviceid')}`,
        data: {
            DeviceName: parent.find('.NameInput').val(),
            _token: _token
        },
        success: function(response) {
            let data = JSON.parse(response)
            parent.find('.DeviceName').html(data['DeviceName']);
            // $('.CancelUpdateDevice').trigger('click');

            if (data['DeviceName'] != '') {
                window.location.reload();
            }
        }
    })
})

$(document).on('click', '.CancelUpdateDevice', function() {
    let parent = $(this).parents('.table-content-item');
    // let parent = $(this).parents('.device-card');
    let deviceNameColumn = parent.find('.DeviceName');
    deviceNameColumn.html('');
    deviceNameColumn.text(deviceNameColumn.data('name'));
    parent.find('.OriginalBtnGroup').show()
    parent.find('.EditBtnGroup').hide()
})

$(document).on('click', '.DeleteBtn', function() {
    let parent = $(this).parents('.table-content-item');
    // let parent = $(this).parents('.device-card');
    let deviceName = parent.find('.DeviceName').data('name');
    console.log(parent.find('.DeviceName'));
    $('#modalConfirmDelete').modal('show');
    $('#modalConfirmDelete .DeviceName').text(deviceName);
    $('#DeleteDevice').removeAttr('data-id-device').attr(`data-id-device`, `${parent.data('deviceid')}`);
})

$(document).on('click', '#DeleteDevice', function() {
    let _token = $('input[name="_token"]').val();
    $.ajax({
        type: 'post',
        url: `/device/delete/${$(this).data('id-device')}`,
        data: {
            _token: _token
        },
        success: function(response) {
            let data = JSON.parse(response)
            if (data['status']) {
                window.location.reload();
            }
        }
    })
})

$(document).on('click', '.DetailBtn', function() {
    let parent = $(this).parents('.device-card');
    if (!parent.hasClass('expanded')) {
        $('.device-card.expanded').find('.DetailBtn').trigger('click');
    }
    parent.toggleClass('expanded');
    parent.find('.device-detail').slideToggle()
    parent.find('.ActionButtonGroup').slideToggle();
})

document.addEventListener('click', function(e) {
    if (!$(e.target).is('.device-card.expanded *')) {
        $('.device-card.expanded').find('.DetailBtn').trigger('click');
    }
})