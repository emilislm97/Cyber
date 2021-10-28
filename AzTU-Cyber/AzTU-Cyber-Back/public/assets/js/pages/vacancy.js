var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
let modal = document.getElementsByClassName('modal-content')[0];

function Status(id,status) {
    $.ajax({
        type: "POST",
        url: "/vakansiyalar/siyahi/status",
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
                    url: "/vakansiyalar/siyahi/delete",
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

function Show(id) {

    $.ajax({
        type: "POST",
        url: "/vakansiyalar/siyahi/show",
        data: {
            _token: CSRF_TOKEN, id: id,
        },
        success: function (data) {
            if (data) {
                let vacancy = data[0];
                let content = vacancy.content.replace(/<[^>]+>/g, '');
                modal.innerHTML = `
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Vakansiya haqqında</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Ad</label>
                            <textarea class="form-control" style="height: 150px" disabled>${vacancy.title}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Məzmun</label>
                            <textarea class="form-control" style="height: 150px" disabled>${content}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Yaradılma tarixi</label>
                            <input type="text" class="form-control" value="${vacancy.created_at}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Redaktə tarixi</label>
                            <input type="text" class="form-control" value="${vacancy.updated_at == null ? "Redaktə edilməyib" : vacancy.updated_at}" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                    </div>
                `;

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

}





