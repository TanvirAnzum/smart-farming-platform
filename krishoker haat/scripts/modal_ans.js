
$(document).ready(function() {
    $("#submit").on("click",function() {
      var id = $("#defaultForm-qid").val();
      var ans = $("#defaultForm-ans").val();

        $.ajax(
          {
            url:'backends/query_server.php',
            method: 'POST',
            data: {
              flag: 1,
              id: id,
              ans: ans
            },
            success: function (response) {
              if(response=='successfully submitted.') {
                $('#modal_ans').modal('hide');
                location.reload();
              }
              else {
                alert(response);
              }
            }
          }
        );
    });
});
