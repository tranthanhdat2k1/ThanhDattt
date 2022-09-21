<?php
session_start();
include 'connect.php';

if(isset($_SESSION['userid'])){
    header('location:danhsachsanpham.php');
}
if(isset($_SESSION['user'])){
  // $object= $_SESSION['user']['id'];
  $object = json_decode(json_encode($_SESSION['user']['id']), FALSE);
  var_dump($object);
 
  header("location:../user/danhsachsanphamuser.php?userid=$object");
}
    //require_once 'connect.php';
    $errors = [];
    if(isset($_POST['login'])){
        $username = htmlspecialchars($_POST['username']);
        $conn->real_escape_string($username);
        $password = htmlspecialchars($_POST['password']);
        $conn->real_escape_string($password);
        if(empty($username)){
            $errors['username'] = 'Username is required';
        }
        if(empty($password)){
            $errors['password'] = 'Password is required';
        }
        
        // $pass = sha1($password);
        // var_dump($pass);
       
        if(count($errors) == 0){
            $sql = "SELECT * FROM user where username='$username' and password =sha1($password)";
            $result = $conn->query($sql);
            //$row = mysqli_fetch_assoc($result);
            // var_dump($row['userid']);
            // echo "<pre>";
            // var_dump($row);
            // die();
            if($result->num_rows > 0){
              if($username == 'admin'){
                $_SESSION['userid'] = $username;
               
                var_dump($_SESSION['userid']);
                header('location:danhsachsanpham.php');
              }else{
                $row = mysqli_fetch_assoc($result);
                $row = [
                  'id' => $row['userid'],
                  'username' => $row['username']
                ];
                var_dump($row);
                $_SESSION['user'] = $row;
                header("location:../user/danhsachsanphamuser.php?userid=$row[id]");
              }         
            }
            else{
                $errors['login'] = "Tên người dùng hoặc mật khẩu không hợp lệ";
            }
        }
    }
    $i = sha1(12345678);
    var_dump($i);
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
    <title>Document</title>
</head>
<body>
<div class="login">
    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-8 col-lg-7 col-xl-6">
            <img src="../admin/uploads/login.png"
              class="img-fluid" alt="Phone image">
          </div>
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 ">
            <form method="POST" class="login-form">
              <div class="form-login-container">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 ">Login </p>
                <div class="form-outline mb-4">
                  <input type="text" id="form1Example13" required name="username" placeholder="USERNAME"class="form-control form-control-lg" />
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="form1Example23" required name="password" placeholder="Password" class="form-control form-control-lg" />
                </div>
  
                <div class="d-flex justify-content-around align-items-center mb-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label label-checkbox" for="form1Example3"> Remember me </label>
                  </div>
                  <div class="forgot">
                    <a href="#!" >Forgot password?</a>
                  </div>
                </div>
                <div class = "d-flex align-items-center justify-content-center">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Sign in</button>
                </div>
             
                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                </div>
  
                <div class="d-flex align-items-center justify-content-center" >
                  <a class="btn btn-primary icon" style="background-color: #3b5998" href="#!"
                    role="button">
                    <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                  </a>
                  <a class="btn btn-primary icon"  style="background-color: #55acee" href="#!"
                    role="button">
                    <i class="fab fa-twitter me-2"></i>Continue with Twitter
                  </a>
                
                </div>

              </div>
              <span>you don't have account?</span> <a href="register.php">register</a>
              <?php
                                    foreach($errors as $key => $value){
                                        echo '<p class="text-danger">' . $value . '</p>';
                                              }
                                            ?>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
  </body>
</html>