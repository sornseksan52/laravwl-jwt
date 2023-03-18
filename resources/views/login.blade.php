<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Form - Bootstrap 4</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4>Login Form</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Enter password">
                </div>
                <button type="button" class="btn btn-primary btn-block" onclick="check_login()">Login</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>


        async function check_login(){
            let email    = $("#email").val(),
                password = $("#password").val()

            let res = await ajax_post("{{ asset('api/auth/check-login') }}",{email : email , password : password})

            if(res){
                // console.log(res);
                window.location.href = "{{ asset('api/auth/user-manage') }}";
            }
        }


        async function ajax_post(path, data) {
            let result;
            try {
                result = await $.ajax({
                    type: "POST",
                    url:  path,
                    dataType: "json",
                    data: data,
                    beforeSend: function() {

                    },
                    success: function(data, textStatus, jqXHR) {

                        // console.log("Data : ",textStatus ,jqXHR.status);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {

                        // console.log('Error:', jqXHR.status, textStatus, errorThrown);
                        if(jqXHR.status == 422){
                            console.log(jqXHR.responseText);
                        }

                    }
                });

            } catch (error) {

                result = error;
            }
            return result;
        }


    </script>

  </body>
</html>
