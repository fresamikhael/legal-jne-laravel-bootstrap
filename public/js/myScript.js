$(document).ready(function () {
    $(document).on("input", ".number-separator", function (e) {
        if (/^[0-9.,]+$/.test($(this).val())) {
            var mynumber = remove_thousandformat($(this).val());
            $(this).val(thousandformat(mynumber));
            // $(this).val(
            // 	parseFloat($(this).val().replace(/,/g, "")).toLocaleString("en")
            // );
        } else {
            $(this).val(
                $(this)
                    .val()
                    .substring(0, $(this).val().length - 1)
            );
        }
    });
});

function remove_thousandformat(value) {
    value = value.toString();
    return parseInt(value.replace(/[^,\d]/g, "").toString());
}

function thousandformat(angka) {
    if (angka != null) {
        var rev = Math.round(angka, 10).toString().split("").reverse().join("");
        var rev2 = "";
        for (var i = 0; i < rev.length; i++) {
            rev2 += rev[i];
            if ((i + 1) % 3 === 0 && i !== rev.length - 1) {
                rev2 += ".";
            }
        }
        return rev2.split("").reverse().join("") + "";
    } else {
        return 0;
    }
}

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
                '<input type="tel" class="form-control"' +
                'name="topLevel[' +
                idTopLevel +
                '][len_service]" />' +
                "</div>" +
                "</div>" +
                "</td>" +
                "<td>" +
                '<div class="mb-3 row">' +
                '<div class="col-sm-12">' +
                '<input type="tel" class="form-control"' +
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
