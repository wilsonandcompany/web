$(document).on("click", ".registerWithBrand", function() {

    var brand_id = $('#brand_id').val();
    var first_name = $('#first_name').val();
    var last_name = $('#last_name').val();
    var email = $('#email').val();
    var confirm_email = $('#confirm_email').val();
    var address1 = $('#address1').val();
    var city = $('#city').val();
    var province = $('#province').val();
    var postal_code = $('#postal_code').val();
    var password = $('#password').val();

    var request = $.ajax({
      method: "POST",
      url: '/signup-brand',
      dataType: 'json',
      data: {
          brand_id: brand_id,
          first_name: first_name,
          last_name: last_name,
          email: email,
          confirm_email: confirm_email,
          address1: address1,
          city: city,
          province: province,
          postal_code: postal_code,
          password: password
      },
      statusCode: {
         200: function (response) {
            swal("Welcome!", "Thanks for registering! You will recieve an email shortly with links to the app store and more information.", "success")
            .then((value) => {
              window.location.href = "/";
            });
         },

         400: function (response) {
            console.log(response.responseJSON);
            errorStr ="";
            $.each(response.responseJSON.errors, function(index, item) {
                errorStr += item[0] + "\n";
            });
            console.log(errorStr);

            swal("Oops!", errorStr, "error");
         }
      }
    });



});


