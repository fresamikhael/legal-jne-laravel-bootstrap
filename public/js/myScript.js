function addTopLevel() {
    var idTopLevel = $("#tblInputTopLevel tbody").find("tr").length + 1;

    $("#tblInputTopLevel")
        .find("tbody")
        .append(
            '<tr id="' +
                "row-" +
                idTopLevel +
                '">' +
                "<td>" +
                '<div class="mb-3 row">' +
                '<div class="col-sm-12">' +
                ' <input type="text" class="form-control"' +
                'name="topLevel[' +
                idTopLevel +
                '][name]" />' +
                "</div>" +
                "</td>" +
                "<td>" +
                '<div class="mb-3 row">' +
                '<div class="col-sm-12">' +
                '<input type="text" class="form-control"' +
                'name="topLevel[' +
                idTopLevel +
                '][country]" />' +
                "</div>" +
                "</div>" +
                "</td>" +
                "<td>" +
                '<div class="mb-3 row">' +
                '<div class="col-sm-12">' +
                '<input type="text" class="form-control"' +
                'name="topLevel[' +
                idTopLevel +
                '][position]" />' +
                "</div>" +
                "</div>" +
                "</td>" +
                "<td>" +
                '<div class="mb-3 row">' +
                '<div class="col-sm-12">' +
                '<input type="number" class="form-control"' +
                'name="topLevel[' +
                idTopLevel +
                '][len_service]" />' +
                "</div>" +
                "</div>" +
                "</td>" +
                "<td>" +
                '<div class="mb-3 row">' +
                '<div class="col-sm-12">' +
                '<input type="number" class="form-control"' +
                'name="topLevel[' +
                idTopLevel +
                '][share_amount]" />' +
                "</div>" +
                "</div>" +
                "</td>" +
                "<td>" +
                '<a href="javascript:removeTopLevel(' +
                idTopLevel +
                ')" class="btn btn-danger btn-sm">' +
                '<i class="fa fa-trash"></i></a>' +
                "</td>" +
                "</tr>"
        );
}

function removeTopLevel(id) {
    $("#tblInputTopLevel tbody")
        .find("#row-" + id)
        .remove();
}

function removeTopLevelExist(id) {
    Swal.fire({
        title: "Kamu yakin akan menghapus ini?",
        text: "Kamu tidak dapat mengembalikan data ini",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax(
                location.origin + "/legal/database/delete-toplevel-legal/" + id,
                {
                    headers: {
                        "X-CSRF-Token": $('meta[name="_token"]').attr(
                            "content"
                        ),
                    },
                    dataType: "json",
                    type: "POST",
                    beforeSend: function (data) {
                        Swal.fire({
                            title: "Silahkan tunggu!",
                            timerProgressBar: true,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            },
                        });
                    },
                    success: function (data) {
                        swal.close();
                        if (data.status == "success") {
                            Swal.fire({
                                title: "Sukses",
                                text: "Data Sudah Dihapus",
                                icon: "success",
                                allowOutsideClick: false,
                            }).then((result) => {
                                if (result.value) {
                                    $("#tblInputTopLevel tbody")
                                        .find("#rowExist-" + id)
                                        .remove();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                text: "Koneksi ke server gagal!",
                                icon: "error",
                            });
                        }
                    },
                    error: function (data) {
                        swal.close();
                        Swal.fire({
                            title: "Gagal",
                            text: "Koneksi ke server gagal!",
                            icon: "error",
                        });
                    },
                }
            );
        }
    });
}

function removeFile(id) {
    Swal.fire({
        title: "Kamu yakin akan menghapus ini?",
        text: "Kamu tidak dapat mengembalikan data ini",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax(location.origin + "/legal/database/delete-file/" + id, {
                headers: {
                    "X-CSRF-Token": $('meta[name="_token"]').attr("content"),
                },
                dataType: "json",
                type: "POST",
                beforeSend: function (data) {
                    Swal.fire({
                        title: "Silahkan tunggu!",
                        timerProgressBar: true,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        },
                    });
                },
                success: function (data) {
                    swal.close();
                    if (data.status == "success") {
                        Swal.fire({
                            title: "Sukses",
                            text: "Data Sudah Dihapus",
                            icon: "success",
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.value) {
                                $("#file")
                                    .find("#rowFileExist-" + id)
                                    .remove();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: "Gagal",
                            text: "Koneksi ke server gagal!",
                            icon: "error",
                        });
                    }
                },
                error: function (data) {
                    swal.close();
                    Swal.fire({
                        title: "Gagal",
                        text: "Koneksi ke server gagal!",
                        icon: "error",
                    });
                },
            });
        }
    });
}
