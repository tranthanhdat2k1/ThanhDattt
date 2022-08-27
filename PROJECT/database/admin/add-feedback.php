<?php
 include 'connect.php';
 if(isset($_POST['submit'])){
    $sql = "SELECT * FROM product";
    $id = mysqli_insert_id($conn);
    $feed = htmlspecialchars($_POST['feed']);
    mysqli_query($conn, "INSERT INTO feedback(productid,feedback) values('$id','$feed') ");
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Feedback <input type="text" name="feed">
        <input type="submit" value="Thêm feedback" name="submit">
    </form>
</body>
</html>