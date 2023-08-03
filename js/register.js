$(document).ready(function () {

  $("#register").click(function () {
    var name = $("#name").val().trim();
    var email = $("#email").val().trim();
    var pwd = $("#pwd").val().trim();

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if (name == '' || email == '' || pwd == '') {
      showNotification("alert-danger", "All fields are mandatory", "bottom", "right", "", "");
      return false;
    }

    if (!name?.match(/^[A-Za-z\s]*$/)) {
      showNotification("alert-danger", "Name should contain only alphabets", "bottom", "right", "", "");
      return false;
    }


    if (name != '' & email != '' & pwd != '') {
      $.ajax({
        url: '../php/register.php',
        type: 'post',
        data: { email: email, pwd: pwd, name: name},
        success: function (response) {

          if (response == 1) {
            showNotification("alert-success", "User registered successfully", "bottom", "right", "", "")
          }
          else {
            showerror("Sorry", "Something Wrong", "error", "#");
          }
        },
        error: function (xhr, ajaxOptions, thrownError) {
          console.log(xhr.status);
          console.log(thrownError);
        }
      });
    }
    else {
      showNotification("alert-danger", "All fields are mandatory", "bottom", "right", "", "");
    }

  });
});