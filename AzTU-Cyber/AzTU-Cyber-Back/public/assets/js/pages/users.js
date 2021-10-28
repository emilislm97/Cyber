var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
let modal = document.getElementsByClassName('modal-content')[0];

function Status(id,status) {
    $.ajax({
        type: "POST",
        url: "/istifadeciler/siyahi/status",
        data: {
            _token: CSRF_TOKEN,
            id,
            status,
        },
        success: function (data) {
            if (data === '1') {
                swal({
                    title: "Status vəziyyəti uğurla dəyişdirildi",
                    text: ' ',
                    icon: "success",
                    button: "Bağla!",
                    timer: 1000
                });
            }else {
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
}

function Delete(id) {
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
                    url: "/istifadeciler/siyahi/delete",
                    data: {
                        _token: CSRF_TOKEN, id: id,
                    },
                    success: function (data) {
                        if (data === '1') {
                            swal({
                                title: "Xəbər uğurla silinmişdir",
                                text: ' ',
                                icon: "success",
                                button: "Bağla!",
                                closeOnClickOutside: false
                            });
                            document.getElementsByClassName('swal-button swal-button--confirm')[0].onclick = function () {
                                location.reload();
                            }
                        } else if (data === '2') {
                            swal({
                                title: "Xəta baş verdi!",
                                text: 'Silmək üçün icazəniz yoxdur',
                                icon: "warning",
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






