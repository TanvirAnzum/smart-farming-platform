
$(document).ready(function() {
    $("#login").on("click",function() {
      var username = $("#defaultForm-user").val();
      var password = $("#defaultForm-pass").val();

      if (username == "" || password == "") alert("Check your inputs");
      else {
        $.ajax(
          {
            url:'backends/reg_server.php',
            method: 'POST',
            data: {
              login_user: 1,
              username: username,
              password: password
            },
            success: function (response) {
              if(response=='successfully logged in.') {
                $('#modalLoginForm').modal('hide');
                location.reload();
              }
              else {
                alert(response);
              }

            }

          }

        );
      }

    });
});
