<?php
session_start();
if($_SESSION['role'] == 2) {
} else {
  ?>
  <script> alert('관리자만 접근가능합니다.'); location.href="./index.php"; </script>
  <?php
}

$id_num = $_SESSION['id_num'];
$title=$_POST['title'];
$writer=$_POST['writer'];
$password = md5($_POST["password"]);
var_dump($password);
$description = $_POST['description'];

// 관리자 계정의 비밀번호가 일치한지 확인
$con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
$query = "select * from users where id_num='".$id_num."' and password='".$password."'";
$result = $con->query($query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if($row != null) {
  $query = "insert into notice (title, writer, description) values('".$title."', '".$writer."','".$description."')";
  $resut=mysqli_query($con,$query);
  ?>
      <script> alert('공지사항을 등록하였습니다.'); location.href="./list.php"; </script>
  <?php
} else {
  ?>
      <script> alert('관리자 비밀번호가 일치하지 않습니다.'); history.back(); </script>
  <?php
}
