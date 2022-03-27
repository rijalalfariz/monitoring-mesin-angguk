$('.EditBtn').on('click', function() {
    $('.DeviceName').each(function(elem) {
        if ($(this).find('input').length > 0) {
            $(this).html('')
            $(this).text($(this).data('name'))
        }
    })

    let parent = $(this).parents('.table-content-item');
    let NamaDevice = $(this).parents('.table-content-item').find('.DeviceName').text();
    let html = `<input class="head-table-text table-input NameInput" type="text" placeholder="Nama Device" style="width: 240px">`
    parent.find('.DeviceName').html('');
    parent.find('.DeviceName').html(html);
    parent.find('.NameInput').val(NamaDevice);
    parent.find('.OriginalBtnGroup').hide()
    parent.find('.EditBtnGroup').show()

    // $(this).parents('.table-content-item').find('.DeviceName').remove();
})

$('.UpdateDevice').on('click', function() {
    let parent = $(this).parents('.table-content-item');
    let _token = $('input[name="_token"]').val();
    $.ajax({
        type: 'post',
        url: `/device/edit/${parent.data('id-device')}`,
        data: {
            DeviceName: parent.find('.NameInput').val(),
            _token: _token
        },
        success: function(response) {
            let data = JSON.parse(response)
            $('.CancelUpdateDevice').trigger('click');
            console.log(data['DeviceName']);
            console.log(data.DeviceName);
            if (data['DeviceName'] != '') {
                parent.find('.DeviceName').text(data['DeviceName'])
            }
        }
    })
})

$('.CancelUpdateDevice').on('click', function() {
    let parent = $(this).parents('.table-content-item');
    let deviceNameColumn = parent.find('.DeviceName');
    deviceNameColumn.html('');
    deviceNameColumn.text(deviceNameColumn.data('name'));
    parent.find('.OriginalBtnGroup').show()
    parent.find('.EditBtnGroup').hide()
})

$('.DeleteBtn').on('click', function() {
    let parent = $(this).parents('.table-content-item');
    let deviceName = parent.find('.DeviceName').data('name');
    $('#modalConfirmDelete').modal('show');
    $('#modalConfirmDelete .DeviceName').text(deviceName);
    $('#DeleteDevice').removeAttr('data-id-device').attr(`data-id-device`, `${parent.data('id-device')}`);
})

$('#DeleteDevice').on('click', function() {
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