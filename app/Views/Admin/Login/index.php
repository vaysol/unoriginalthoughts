<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo base_url('admin-assets/logo/logo.svg') ?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unoriginalthoughts</title>
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Bootstrap link -->
    <style>
        .admin-login_card {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) !important;
            max-width: 322px;
            width: 100%;
            box-shadow: 0 30px 60px 0 rgba(0, 0, 0, .3);
        }

        .admin-card-main {
            position: relative;
            height: 100vh;
        }

        .admin-submit {
            width: 100%;

        }

        .login_title {
            text-align: center;
        }

        .login-logo img {
            display: block;
            margin: auto;
        }
        .login-logo{
            background: white;
            width: 100%;
            padding-top: 10px;
            padding-bottom: 5px;
        }

        .login-form{
            padding: 20px;
        }
        .label{
            margin-bottom: 10px;
        }
        .admin-submit{
            background: #42A877;
            color: #fff;
            margin-top: 15px;
            height: 34px;
            border-radius: 5px;
        }

    </style>
</head>

<body>
    <div class="admin-card-main">
        <div class="admin-login_card">
            <div class="card-inner">
                <div class="login-logo">
                    <img src="<?php echo base_url('admin-assets/logo/favicon.png') ?>" alt="ami logo">
                </div>
                <hr style="margin-bottom: 0;"> 
                <form action="<?php echo base_url('/admin/login_check').'/' ?>" class="login-form"action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-3 mr-4">
                        <label for="username" class="label">Username:</label>
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Enter username">
                        <p style="color:red" id="user_name_validate"></p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="label">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                        <p style="color:red" id="password_validate"></p>
                    </div>
                    <button class="admin-submit mb-3" onclick="return login_validate()" type="submit" class="btn btn-primary">SUBMIT</button>
                    <p style="color:red"> <?php $msg = session()->getFlashdata('loginError');  if(!empty($msg)) { echo $msg ;}   ?> </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    function login_validate()
{  

    let username = document.getElementById('user_name').value;
    var password = document.getElementById('password').value;

    if(username == '')
    {
        var userNameValidate = document.getElementById('user_name_validate');
        userNameValidate.textContent = " User Name Can't Be Null ";

        var userNameInput = document.getElementById('user_name');
        userNameInput.style.borderColor = 'red';
        
        userNameInput.focus();
        return false ;
    }
    else 
    {
        var userNameInput = document.getElementById('user_name');
        userNameInput.style.borderColor = 'green';

        var userNameValidate = document.getElementById('user_name_validate');
        userNameValidate.textContent = '';
    }

    if (password == '') 
    {
        var passwordValidate = document.getElementById('password_validate');
        passwordValidate.textContent = "Password Can't Be Null";

        var passwordInput = document.getElementById('password');
        passwordInput.style.borderColor = 'red';

        passwordInput.focus();
        return false;
    } 
    else 
    {
        var passwordInput = document.getElementById('password');
        passwordInput.style.borderColor = 'green';

        var passwordValidate = document.getElementById('password_validate');
        passwordValidate.textContent = '';
    }


    
}

</script>