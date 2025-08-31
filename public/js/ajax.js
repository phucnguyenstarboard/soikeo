var blockElement = $('.load_spinner');

function searchData(form, callback) {
    startSpinner(blockElement);

    $form = $(form);

    $.ajax({
        url: $form.attr('action'),
        type: $form.attr('method'),
        data: $form.serialize(),
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    }).done(function (result) {
        if (callback) {
            callback(result);
        }
    }).fail(function ($xhr) {
        // if (reloadByCode($xhr)){
        //     return;
        // }
        var data = $xhr.responseJSON;
        showResultMessage(data.message, false);
    }).always(function () {
        // spinner stop
        stopSpinner(blockElement);
    });
}
function searchModalData(form, blockTarget, callback) {
    startSpinner(blockTarget);

    $form = $(form);
    let data = $form.serializeArray();

    let applied_date = $('#estimated_date').val();
    if (applied_date != undefined && applied_date != null) {
        data = $.merge($.merge([], data), [
            { "name": "s-applied_date", "value": applied_date },
        ]);
    }

    $.ajax({
        url: $form.attr('action'),
        type: $form.attr('method'),
        data: data,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    }).done(function (result) {
        if (callback) {
            callback(result);
        }
    }).fail(function ($xhr) {
        // if (reloadByCode($xhr)){
        //     return;
        // }
        var data = $xhr.responseJSON;
        showResultMessage(data.message, false);
    }).always(function () {
        // spinner stop
        stopSpinner(blockTarget);
    });
}

function updateData(form, isFormBack, doneFunc) {
    startSpinner(blockElement);

    $form = $(form);

    $.ajax({
        url: $form.attr('action'),
        type: $form.attr('method'),
        data: $form.serialize(),
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    }).done(function (result) {
        if (doneFunc) {
            doneFunc(result);
        }
        else {
             console.log(result);
            showResultMessage(result.message, isFormBack);
        }
    }).fail(function ($xhr) {
        // if (reloadByCode($xhr)){
        //     return;
        // }
        var data = $xhr.responseJSON;
        console.log(data);
        showResultMessage(data.message, false);
    }).always(function () {
        // spinner stop
        stopSpinner(blockElement);
    });
}

function updateDataFile(form, isFormBack, doneFunc) {
    startSpinner(blockElement);

    var formdata = false;
    if (window.FormData) {
        formdata = new FormData(form[0]);
    }

    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: formdata ? formdata : form.serialize(),
        processData: false,
        contentType: false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    }).done(function (result) {
        if (doneFunc) {
            doneFunc(result);
        }
        else {
            showResultMessage(result.message, isFormBack);
        }
    }).fail(function ($xhr) {
        // if (reloadByCode($xhr)){
        //     return;
        // }
        var data = $xhr.responseJSON;
        showResultMessage(data.message, false);
    }).always(function () {
        // spinner stop
        stopSpinner(blockElement);
    });
}

function updateDataWithCustomData(form, data_item, block, isFormBack, doneFunc) {
    startSpinner(block);
    $('.submit-bd_sidebar').prop('disabled', true);

    $form = $(form);

    $.ajax({
        url: $form.attr('action'),
        type: $form.attr('method'),
        data: data_item,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    }).done(function (result) {
        if (doneFunc) {
            doneFunc(result);
        }
        else {
            showResultMessage(result.message, isFormBack);
        }
    }).fail(function ($xhr) {
        // if (reloadByCode($xhr)){
        //     return;
        // }
        var data = $xhr.responseJSON;
        showResultMessage(data.message, false);
    }).always(function () {
        // spinner stop
        stopSpinner(block);
        $('.submit-bd_sidebar').prop('disabled', false);
    });
}

/**
 * Action on error HTTP response (ajax)
 * @param $xhr
 * @returns
 */
function reloadByCode($xhr) {
    if ($xhr.status == 401) {
        swalErrorAuthenticate();
        return true;
    }
    if ($xhr.status == 401
        || $xhr.status == 403
        || $xhr.status == 404) {
        location.reload();
        return true;
    }
    return false;
}

function startSpinner(blockTarget) {
    var block = '<div class="d-flex justify-content-center">'
        + '<div class="spinner-border text-success" role="status">'
        + '<span class="sr-only">Loading...</span>'
        + '</div>'
        + '</div>';
    // Block Element
    blockTarget.block({
        message: block,
        overlayCSS: {
            backgroundColor: '#FFF',
            opacity: 0.8,
            cursor: 'wait',
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        }
    });

    $(':input[type="submit"]').prop('disabled', true);
}

function stopSpinner(blockTarget) {
    blockTarget.unblock();
    $(':input[type="submit"]').prop('disabled', false);
}

function showResultMessage(message, isFormBack) {
    Swal.fire({
        title: (message.title) ? message.title : '',
        text: (message.text) ? message.text : message,
        type: (message.type) ? message.type : 'error',
        showCancelButton: false,
    }).then(function (result) {
        if (message.type == 'success') {
            window.onbeforeunload = null;
            if (isFormBack) {
                if (message.active_back) {
                    $('#form_back').attr('action', message.active_back);
                }
                $form = $('#form_back');
                $form.submit();
            }
            else {
                $form = $('#form_reload');
                $form.submit();
            }
        }
    });
}

function loadModalDetail(url, callback) {
    $.ajax({
        type: "get",
        url: url
    }).done(function (result) {
        if (callback) {
            callback(result);
        }
    }).fail(function ($xhr) {
        var json = $xhr.responseJSON;
        swal({
            title: "エラー",
            text: "処理権限がありません。",
            icon: 'error',
        })
    }).always(function () {
    });
}

function postStandard(url, data, callback) {
    $.ajax({
        type: "post",
        url: url,
        data: data,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    }).done(function (result) {
        if (callback) {
            callback(result);
        }
    }).fail(function ($xhr) {
        var json = $xhr.responseJSON;
        showResultMessage(json.message, false);
    }).always(function () {
    });
}

function postCommon(url, data, callback) {
    $.ajax({
        type: "post",
        url: url,
        data: data,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    }).done(function (result) {
        if (callback) {
            callback(result);
        }
    }).fail(function ($xhr) {
        var json = $xhr.responseJSON;
        showResultMessage(json.message, false);
    }).always(function () {
    });
}


function postCommonWithSpinner(url, data, callback) {
    startSpinner(blockElement);
    $.ajax({
        type: "post",
        url: url,
        data: data,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    }).done(function (result) {
        if (callback) {
            callback(result);
        }
    }).fail(function ($xhr) {
        var json = $xhr.responseJSON;
        showResultMessage(json.message, false);
    }).always(function () {
        stopSpinner(blockElement);
    });
}

function postCommonWithSpinnerBlock(url, data, block, callback) {
    startSpinner(block);
    $.ajax({
        type: "post",
        url: url,
        data: data,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
    }).done(function (result) {
        if (callback) {
            callback(result);
        }
    }).fail(function ($xhr) {
        var json = $xhr.responseJSON;
        showResultMessage(json.message, false);
    }).always(function () {
        stopSpinner(block);
    });
}

function showResultMessageAndCloseModal(message, isFormBack, modalName) {
    Swal.fire({
        title: (message.title) ? message.title : '',
        html: (message.text) ? message.text : message,
        type: (message.type) ? message.type : 'error',
        showCancelButton: false,
    }).then(function (result) {
        if (message.type == 'success' && result.value) {
            setTimeout(function () {
                modalName.modal('hide');
                window.onbeforeunload = null;
                if (isFormBack) {
                    if (message.active_back) {
                        $('#form_back').attr('action', message.active_back);
                    }
                    $form = $('#form_back');
                    $form.submit();
                }
                else {
                    $form = $('#form-search');
                    $form.submit();
                }
            }, 500);
        }
    });
}
