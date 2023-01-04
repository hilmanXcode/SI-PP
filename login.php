<?php
session_start();
include 'config/koneksi.php';
include 'includes/function.php';

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    message('error', 'Error!', 'Kamu sudah login sebelumnya');
    header("Location: dashboard.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | SI-PP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-image: url('./assets/img/bg-1.jpeg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
        .container {
            height: 90vh;
        }
        .wrap {
            width: 400px;
            box-shadow: 16px 20px 25px -4px rgba(0,0,0,0.75);
-webkit-box-shadow: 16px 20px 25px -4px rgba(0,0,0,0.75);
-moz-box-shadow: 16px 20px 25px -4px rgba(0,0,0,0.75);
            border-radius: 25px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="wrap p-5">
            <h1 class="text-center">Login SI-PP</h1>
            <form action="pLogin.php" method="post">
                <div class="form-floating mt-3 mb-3">
                    <input type="text" class="form-control" name="username" id="floatingPassword" placeholder="Password" />
                    <label for="floatingPassword">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" />
                    <label for="floatingPassword">Password</label>
                </div>
                <button type="submit" name="login_submit" class="btn btn-primary form-control mt-2">Submit</button>
            </form>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>