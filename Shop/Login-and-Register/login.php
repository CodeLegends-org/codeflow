<?php 

	session_start();
	
	if(isset($_SESSION['userlogin'])){
		header("Location: index.php");
	}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login to your account</title>


</head>

<body>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="RC-Crest.png" class="brand_logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    
                    <form>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        </div>
                        <input type="text" name="username" id="username" class="form-control input_user" required>
                        </div>
                        <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        </div>
                        <input type="password" name="password" id="password" class="form-control input_pass" required>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember Me</label>
                            </div>
                        </div>
                   
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="button" name="button" id="login" class="btn login_btn">Login</button>
                </div>
                </form>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="registration.php" class="m1-2">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
	$(function(){
		$('#login').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){
				var username = $('#username').val();
				var password = $('#password').val();
			}

			e.preventDefault();

			$.ajax({
				type: 'POST',
				url: 'jslogin.php',
				data:  {username: username, password: password},
				success: function(data){
					alert(data);
					if($.trim(data) === "1"){
						setTimeout(' window.location.href =  "index.php"', 1000);
					}
				},
				error: function(data){
					alert('there were erros while doing the operation.');
				}
			});

		});
	});
</script>
</body>

</html>