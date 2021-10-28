let random = document.getElementById('random');
let password = document.getElementById('password');

jQuery.extend(jQuery.validator.messages, {
    required: "Xanaları boş buraxmaq olmaz!",
    email: "Zəhmət olmasa elektron poçt ünvanı daxil edin!",
});

var v = $("#form").validate({
    rules: {
        name_surname:{
            required:true
        },
        password: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        roles:{
            required:true
        }
    },
    errorElement: "p",
    errorClass: "error",
    errorPlacement: function (error, element) {
        error.insertAfter(element);
        $(".submit").removeClass("loading");
    }
});
random.onclick = function () {
    password.value = Math.random().toString(36).substr(2, 8);
}
