function addTopLevel() {
    console.log("berhasil");
    var idTopLevel = $("#tblInputTopLevel tbody").find("tr").length + 1;

    $("#tblInputTopLevel")
        .find("tbody")
        .append(
            "<tr id=row-" +
                idTopLevel +
                ">" +
                "<td> " +
                '<x-input label="" name="topLevel[data][' +
                idTopLevel +
                '][name]" labelClass="col-sm-1" fieldClass="col-sm-11" />' +
                "</td>" +
                "<td>" +
                '<x-input label="" name="topLevel[data][' +
                idTopLevel +
                '][country]" labelClass="col-sm-1" fieldClass="col-sm-11" />' +
                "</td>" +
                "<td>" +
                '<x-input label="" name="topLevel[data][' +
                idTopLevel +
                '][position]" labelClass="col-sm-1" fieldClass="col-sm-11" />' +
                "</td>" +
                "<td>" +
                '<x-input label="" name="topLevel[data][' +
                idTopLevel +
                '][len_service]" labelClass="col-sm-1" fieldClass="col-sm-11" type="number" /> ' +
                "</td>" +
                "<td>" +
                '<x-input label="" name="topLevel[data][' +
                idTopLevel +
                '][share_amount]" labelClass="col-sm-1" fieldClass="col-sm-11" type="number" />' +
                "</td>" +
                "<td>" +
                '<a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="removeTopLevel(' +
                idTopLevel +
                ')">' +
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
