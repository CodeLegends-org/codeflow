<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <div>
        <?php       

        ?>
    </div>

    <div>
        <form action="registration.php" method="POST">
            <div class="container">

                <div class="row">
                    <div class="col-sm-3">
                        <h1>Registration</h1>
                        <hr class="mb-3">
                        <label for="firstname"><b>First Name</b></label>
                        <input class="form-control" id="firstname" type="text" name="firstname" required>

                        <label for="lastname"><b>Last Name</b></label>
                        <input class="form-control" id="lastname" type="text" name="lastname" required>

                        <label for="email"><b>Email</b></label>
                        <input class="form-control" id="email" type="email" name="email" required>

                        <label for="phonenumber"><b>Phone number</b></label>
                        <input class="form-control" id="phonenumber" type="text" name="phonenumber" required>

                        <label for="password"><b>Password</b></label>
                        <input class="form-control" id="password" type="password" name="password" required>
                        <hr class="mb-3">
                        <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function() {
            $('#register').click(function(e) {

                var valid = this.form.checkValidity();

                if (valid) {

                    var firstname = $('#firstname').val();
                    var lastname = $('#lastname').val();
                    var email = $('#email').val();
                    var phonenumber = $('#phonenumber').val();
                    var password = $('#password').val();

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {
                            firstname: firstname,
                            lastname: lastname,
                            email: email,
                            phonenumber: phonenumber,
                            password: password
                        },
                        success: function(data){
                            Swal.fire({
                                'title': 'Success',
                                'text': data ,
                                'type': 'success'
                            })
                        },
                        error: function(data){
                            Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors while registering',
                                'type': 'error'
                            })
                        }
                    });

                } else {
                   
                }


            });
        });
    </script>
</body>

</html>