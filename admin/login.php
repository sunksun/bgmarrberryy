<?php
session_start();
include_once 'db_connect.php';

$session_id = session_id();

if (isset($_POST['login'])) {

    $sql = "SELECT * FROM `tblclient` WHERE `useremail` = ? AND `pass_word` = ?";
    $uemail = $_POST['useremail'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $uemail, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($row > 0) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['useremail'] = $row['useremail'];
        $_SESSION['user_status'] = $row['user_status'];
        session_write_close();

        if ($_SESSION["user_status"] == "C") { //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
            $sql = "SELECT * FROM `id_order` WHERE `session_user_id` = ?";
            $user_id = $_SESSION['user_id'];

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $session_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            $sql = "UPDATE `id_order` SET `user_id` = '$user_id'
                    WHERE `id_order`.`session_user_id` = '$session_id'";
            $result = mysqli_query($conn, $sql);

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
                  title: "Success!",
                  text: "Go To MainPage",
                  type: "success",
                  icon: "success"
                });';
            echo '}, 500 );</script>';

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                      window.location.href = "../client/index.php";';
            echo '}, 3000 );</script>';
        } else if ($_SESSION["user_status"] == "A") { //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
                  title: "Success!",
                  text: "Go To DashBoard",
                  type: "success",
                  icon: "success"
                });';
            echo '}, 500 );</script>';

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                      window.location.href = "dashboard.php";';
            echo '}, 3000 );</script>';
        }
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
                  title: "Error!",
                  text: "Please Try Again!",
                  type: "warning",
                  icon: "error"
              });';
        echo '}, 500);</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
              window.location.href = "login.php";';
        echo '}, 3000 );</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login // BGMarrBerryy</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- sweetalert2 -->
    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Sign In</h1>
                                    </div>
                                    <form class="user" name="myForm" method="post">
                                        <div class="form-group">
                                            <input type="email" name="useremail" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email" required>
                                        </div>
                                        <div class="form-inline">
                                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password" required>
                                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                                        <!--
                                        <hr>
                                        <a href="index.php" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                        -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password? Reset Password!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Sign Up</a>
                                    </div>

                                </div>
                                <!-- <div class="text-right" style="margin-right: 10px;">
                                        <a class="small" href="register.php">เข้าสู่ระบบผู้ดูแล</a>
                                </div> -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('bi-eye');
        });

        // prevent form submit
        /*const form = document.querySelector("form");
        form.addEventListener('submit', function(e) {
            e.preventDefault();
        }); */
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>