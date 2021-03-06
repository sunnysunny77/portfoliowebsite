const options_1 = {
    beforeSubmit: showRequest_1,
    success: showResponse_1,
    url: frontend_ajax_object.ajaxurl,
};

const options_2 = {
    beforeSubmit: showRequest_2,
    success: showResponse_2,
    url: frontend_ajax_object.ajaxurl,
};

const options_3 = {
    beforeSubmit: showRequest_3,
    success: showResponse_3,
    url: frontend_ajax_object.ajaxurl,
};

function showRequest_1(formData, jqForm, options) {
    $("#submit-1").prop("disabled", true);
}

function showResponse_1(responseText, statusText, xhr, $form) {
    const res = $("#response-1");
    const text = res.text();
    res.html(responseText);
    const sub = $("#submit-1");
    sub.val('Sent');
    setTimeout(function () {
        res.html(text);
        sub.prop("disabled", false);
        sub.val('Submit');
        $form.trigger("reset");
    }, 9000);
}

function showRequest_2(formData, jqForm, options) {
    $("#submit-2").prop("disabled", true);
}

function showResponse_2(responseText, statusText, xhr, $form) {
    const res = $("#response-2");
    const text = res.text();
    res.html(responseText);
    const sub = $("#submit-2");
    sub.val('Sent');
    setTimeout(function () {
        res.html(text);
        sub.prop("disabled", false);
        sub.val('Submit');
        $form.trigger("reset");
    }, 9000);
}

function showRequest_3(formData, jqForm, options) {
    $("#submit-3").prop("disabled", true);
}

function showResponse_3(responseText, statusText, xhr, $form) {
    const res = $("#response-3");
    const text = res.text();
    res.html(responseText);
    const sub = $("#submit-3");
    sub.val('Sent');
    setTimeout(function () {
        res.html(text);
        sub.prop("disabled", false);
        sub.val('Submit');
        $form.trigger("reset");
    }, 9000);
}

$(document).ready(function () {
    $('#form-1').ajaxForm(options_1);
    $('#form-2').ajaxForm(options_2);
    $('#form-3').ajaxForm(options_3);
}); 
