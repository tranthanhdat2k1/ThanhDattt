<?php
include 'connect.php';
$error = [];
if (isset($_POST['register'])) {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['password']);
    $cfm_pass = htmlspecialchars($_POST['confirmpassword']);
    $phone = htmlspecialchars($_POST['phone']);
    $name = htmlspecialchars($_POST['name']);
    if (empty($username)) {
        $error['name'] = "Bạn chưa nhập username";
    }
    if (empty($email)) {
        $error['email'] = "Bạn chưa nhập email";
    }
    if (empty($pass)) {
        $error['pass'] = "Bạn chưa nhập pass";
    }
    if (empty($cfm_pass)) {
        $error['cfm_pass'] = "Bạn chưa nhập cfm_pass";
    }
    if (empty($phone)) {
        $error['phone'] = "Bạn chưa nhập phone";
    }
    if ($pass != $cfm_pass) {
        $error['check'] = "Xác nhận mật khẩu không đúng";
    }
    if (strlen($pass) < 4 || strlen($pass) > 20) {
        $error['password_len'] = 'Password must be between 4 and 20 characters';
    }
    if (strlen($username) < 4 || strlen($username) > 20) {
        $error['password_len'] = 'Username must be between 4 and 20 characters';
    }
    preg_match("/^[0-9]{10}$/", $phone, $matchh);
    if (!$matchh) {
        $error['phonee'] = "Phone khong hop le";
    }
    $check = strpos($username, ' ', 0);
    if ($check != false) {
        $error['check'] = "Username không được có khoảng trắng";
    } 

    // $passs = sha1($pass);
    // $cfm_passs = sha1($cfm_pass);
    $user = mysqli_query($conn, "SELECT * from user");
    foreach ($user as $key => $value) {
        if ($username == $value['username']) {
            $error['namee'] = "USER NAME ALREDY EXISTS";
        }
    }
    if (count($error) == 0) {

        $sql = "INSERT INTO `user` (`userid`, `username`, `password`, `cfm_password`, `ten_dang_nhap`, `phone`, `email`) VALUES (NULL, '$username', sha1($pass) , sha1($cfm_pass) , '$name', '$phone', '$email')";
        $result = $conn->query($sql);
        header('Location: login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>


    <div class="register">
        <form action="" method="post">
            <div class="vh-100" style="background-color: #eee;">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-12 col-xl-11">
                            <div class="card text-black" style="border-radius: 25px;">
                                <div class="card-body p-md-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>

                                            <form class="mx-1 mx-md-4">

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" name="username" id="form3Example1c" class="form-control" placeholder="username" required />
                                                    </div>
                                                    <div id="content">

                                                    </div>
                                                          <div id="usernamee">

                                                          </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="email" id="form3Example3c" name="email" class="form-control" placeholder="Your Email" required />
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="form3Example4c" class="form-control" placeholder="Phone" name="phone" required />
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="form3Example3c" name="name" class="form-control" placeholder="HỌ VÀ TÊN" required />
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="form3Example4c" class="form-control" placeholder="Password" name="password" required />
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="form3Example4cd" class="form-control" placeholder="Confirm Password" name="confirmpassword" required />
                                                    </div>
                                                </div>

                                                <div class="form-check d-flex mb-5">
                                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" required />
                                                    <label class="form-check-label check" for="form2Example3">
                                                        I agree all statements in <a href="#!" class="terms">Terms of service</a>
                                                    </label>
                                                </div>

                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <button type="submit" class="btn btn-primary btn-lg" name="register">Register</button>
                                                </div>
                                                <span>You have account?</span><a href="login.php">Login</a>
                                                <?php
                                                foreach ($error as $key => $value) {
                                                    echo '<p class="text-danger">' . $value . '</p>';
                                                }
                                                ?>
                                            </form>

                                        </div>
                                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                            <img src="../admin/uploads/register.png" class="img-fluid" alt="Sample image">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
</body>
<script>
    $(document).ready(function() {
        $("#form3Example1c").blur(function() {
            var username = $(this).val();
            $.get("check-username.php", {
                username: username
            }, function(data) {
                if (data == 0) {
                   
                } else {
                    $("#usernamee").html("USER NAME ALREADY EXISTS");
                    $("#usernamee").css("color", "red");
                }
            })
        })
    })
    $("#form3Example1c").keyup(function() {
        console.log($(this).val())
        var usr = $(this).val()
        var check = usr.search(' ')
        if (check != -1) {
            $("#content")[0].innerText = "Không hợp lệ vì chứa kí tự cách"
        } 
    })
</script>

</html>