jQuery.extend(jQuery.validator.messages, {
    required: "Xanaları boş buraxmaq olmaz!",
    email: "Zəhmət olmasa elektron poçt ünvanı daxil edin!",
});

var v = $("#form").validate({
    rules: {
        password: {
            required: true,
        },
        email: {
            required: true,
            email: true
        }
    },
    errorElement: "p",
    errorClass: "error",
    errorPlacement: function (error, element) {
        error.insertAfter(element);
        $(".submit").removeClass("loading");
    }
});

