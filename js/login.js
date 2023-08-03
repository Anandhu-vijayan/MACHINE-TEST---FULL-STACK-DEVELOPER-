$(document).ready(function () {
    $("#submit").click(function () {
        var username = $("#email").val().trim();
        var password = $("#pwd").val().trim();
        if (username != "" && password != "") {
            $.ajax({
                url: '../php/login.php',
                type: 'post',
                data: { username: username, password: password },
                success: function (response) {
                    var msg = "";
                    console.log(response)
                    if (response == 1) {
                        showNotification("alert-success", "Redirecting to dashbord", "bottom", "right", "", "");
                       window.location = "../pages/index.php";
                    }
                    
                    else{
                        showNotification("alert-danger", "Invalid login! Check login credentials", "bottom", "right", "", "");
                    }
                    
                }
            });
        }
    });
});