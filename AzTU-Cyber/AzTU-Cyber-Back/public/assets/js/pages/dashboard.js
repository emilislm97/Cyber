var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
let currentpassword = document.getElementById('current_password');
let newpassword = document.getElementById('new_password');
let newpassword_confirm = document.getElementById('new_password_confirm');
let show = document.getElementById('show');
let yenile = document.getElementsByClassName('yenile')[0];

newpassword.disabled = true;
newpassword_confirm.disabled = true;

currentpassword.onkeyup = function () {
    yenile.disabled = true;
    newpassword.disabled = true;
    newpassword_confirm.disabled = true;
    $.ajax({
        type: "POST",
        url: "/profilim/password-confirm",
        data: {_token: CSRF_TOKEN, currentpassword: currentpassword.value},
        success: function (data) {
            if (data === 1) {
                show.innerHTML = `
                <div class="alert alert-success" role="alert">
                    Cari şifrə doğrudur. Yeni şifrəni daxil edin!
                </div>
                `;
                newpassword.disabled = false;
            } else {
                show.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    Cari şifrə doğru deyil!
                </div>
                `;
                newpassword.value = '';
                newpassword_confirm.value = '';
                newpassword.disabled = true;
                newpassword_confirm.disabled = true;
                yenile.disabled = true;
                if (currentpassword.value === ''){
                    yenile.disabled = false;
                    show.innerHTML = ''
                }
            }
        },
        error: function () {
            alert('Xəta baş verdi...');
        }
    })
}

newpassword.onkeyup = function () {
    if (newpassword.value.length >= 8) {
        show.innerHTML = `
            <div class="alert alert-success" role="alert">
                Yeni şifrə güclüdür. Yeni şifrəni təkrar daxil edin!
            </div>
         `;
        newpassword_confirm.disabled = false
    } else {
        show.innerHTML = `
            <div class="alert alert-danger" role="alert">
                Yeni şifrə zəifdir. Şifrə minimum 8 simvoldan ibarət olmalıdır!
            </div>
         `;
        newpassword_confirm.value = '';
        newpassword_confirm.disabled = true;
        yenile.disabled = true;
    }
}

newpassword_confirm.onkeyup = function () {
    if (newpassword_confirm.value === newpassword.value) {
        show.innerHTML = `
            <div class="alert alert-success" role="alert">
                Yeni şifrə təkrarı yeni şifrə ilə eynidir!
            </div>
         `;
        yenile.disabled = false;
    } else {
        show.innerHTML = `
            <div class="alert alert-danger" role="alert">
                Yeni şifrə təkrarı yeni şifrə ilə eyni deyil!
            </div>
         `;
        yenile.disabled = true;
    }
}

//Profil silme
function Sil(id) {
    swal({
        title: "Əminsiz?",
        text: "Sildikdən sonra geri qaytarmaq mümkün deyil!",
        icon: "warning",
        buttons: ['İmtina', 'Bəli'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({
                    type: "POST",
                    url: "/user-delete",
                    data: {
                        _token: CSRF_TOKEN, id: id,
                    },
                    success: function (data) {
                        if (data === '1') {
                            swal({
                                title: "İstifadəçi uğurla silinmişdir",
                                text: ' ',
                                icon: "success",
                                button: "Bağla!",
                                closeOnClickOutside: false
                            });
                            document.getElementsByClassName('swal-button swal-button--confirm')[0].onclick = function () {
                                location.reload();
                            }
                        } else {
                            swal({
                                title: "Xəta baş verdi!",
                                text: "Yenidən cəhd edin",
                                icon: "warning",
                                button: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function () {
                        alert('Xəta baş verdi...');
                    }
                })

            } else {
                swal({
                    text: "İmtina edildi!",
                    button: "Bağla",
                    timer: 1000
                });
            }
        });
}








