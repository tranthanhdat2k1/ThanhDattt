<?php
include 'connect.php';
//id-feedback
$id = $_GET['feedbackid'];
//
$userid = $_GET['userid'];
var_dump($id);
var_dump($userid);

$cmt = mysqli_query($conn,"SELECT feedback.feedback, user.username,feedback.productid FROM `feedback` INNER JOIN user on user.userid = feedback.userid WHERE feedback.id = $id and feedback.userid = $userid");
$row = mysqli_fetch_assoc($cmt);
echo "<pre>";
var_dump($row);
if(isset($_POST['submit'])){
    $feed = htmlspecialchars($_POST['cmt']);
    $sql = mysqli_query($conn,"UPDATE `feedback` SET `feedback` = '$feed' WHERE `feedback`.`id` = $id;");

    header("location: sanphamchitiet1.php?id=$row[productid]&&userid=$userid");
}
?>
<form action="" method="post">
    <!-- Hiện feedback     -->
 
    <!--  -->
      <div>
        <label for="">Comment</label>
        <textarea name="cmt" id="" cols="30" rows="10"><?php echo $row['feedback'] ?></textarea>
      </div>
      <input type="submit" value="ADD-FEEDBACK" name="submit">
  </form>          