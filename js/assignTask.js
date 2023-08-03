$(document).ready(function () {
    $("#addtask").click(function () {
        var taskname = $("#ta_name").val().trim();
        var due = $("#ta_duedate").val().trim();
        var des = $("#ta_des").val().trim();
        var cuid = $("#ta_cuid").val().trim();
        if (taskname != "" && due != "" && des != "") {
            $.ajax({
                url: '../php/assignTask.php',
                type: 'post',
                data: { taskname: taskname, due: due, des: des, cuid: cuid },
                success: function (response) {
                    var msg = "";
                    console.log(response)
                    if (response == 1) {
                        location.reload();
                    }

                    else {
                        showNotification("alert-danger", "Failed", "bottom", "right", "", "");
                    }

                }
            });
        }
    });
});


$(document).on('click', '#updateassbtn', function () {

    var t_id = $(this).data("id1");
    var name = $(this).data("id2");
    var duedate = $(this).data("id4");
    var t_des = $(this).data("id3");

    document.getElementById("tu_id").value = t_id;
    document.getElementById("tu_name").value = name;
    document.getElementById("tu_duedate").value = duedate;
    document.getElementById("tu_des").value = t_des;

});
//confirm update btn
$("#confirmupdateassignment").click(function () {
    var assid = document.getElementById("tu_id").value;
    var assname = document.getElementById("tu_name").value;
    var assduedate = document.getElementById("tu_duedate").value;
    var des = document.getElementById("tu_des").value;

    //debugger
    $.ajax({
        url: '../php/updatetask.php',
        data: { assid: assid, assname: assname, assduedate: assduedate, des: des },
        type: 'post',
        success: function (response) {
            if (response == 1) {
                location.reload();
            }
            else {
                showNotification("alert-danger", "Failed", "bottom", "right", "", "");
            }

        }
    });
});

$("#delassignmentconfirm").click(function () {
    var delid = document.getElementById("ass_id").value;

    //debugger
    $.ajax({
        url: '../php/deletetask.php',
        type: 'post',
        data: { id: delid },
        success: function (response) {
            console.log(response);

            if (response == 1) {
                location.reload();

            }
            else {
                showNotification("alert-error", "failed", "bottom", "right", "", "")
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        }
    });

});


$(document).on('click', '#delbtn', function () {
    var a_id = $(this).data("id1");
    document.getElementById("ass_id").value = a_id;
});