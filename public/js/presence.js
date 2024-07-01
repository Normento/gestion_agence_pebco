

   $(document).on('click', '.btn-warning', function (e) {
         e.preventDefault();

        $(this).text('Sending..');

         /* var data = {
             'enfantech_id': $('.enfantech_id{{$enfantech->id}}').val(),
             'status': $('.status{{$enfantech->id}}').val(),
         } */
         var url =$('meta[name="csrf-token"]').attr('content');
         console.log(url);
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

        $.ajax({
            type: "POST",
            url: "/presence/store",
          /*   data: data,  */
            dataType: "json",

            success: function (response) {

                if (response.status == 400) {
                    $('#save_msgList').html("");
                   // $('#save_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#save_msgList').append('<li>' + err_value + '</li>');
                    });
                    $('.btn-success').text('Save');
                } else {
                    $('#save_msgList').html("");
                    swal("Bravo!", "Présence marquée avec succès", "success");
                    $('#success_message').text(response.message);

                }
            }
        });
        $(".modal-header button").click();
    });
