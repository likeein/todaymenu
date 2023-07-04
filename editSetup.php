<?php
session_start();
if($_SESSION['role'] == 2) {
} else {
  ?>
  <script> alert('관리자만 접근가능합니다.'); location.href="./index.php"; </script>
  <?php
}

$id = $_SESSION['id_num'];
$id_num = $_POST['id_num'];
$title=$_POST['title'];
$writer=$_POST['writer'];
$password = md5($_POST["password"]);
var_dump($password);
$description = $_POST['description'];

// 관리자 계정의 비밀번호가 일치한지 확인
$con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
$query = "select * from users where id_num='".$id."' and password='".$password."'";
$result = $con->query($query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if($row != null) {
  $query = "update notice set title='".$title."', writer='".$writer."', description='".$description."' where id_num=".$id_num."";
  $resut=mysqli_query($con,$query);
  ?>
      <script> alert('공지사항을 수정하였습니다.'); location.href="./view.php?id_num=<?php echo $id_num; ?>"; </script>
  <?php
} else {
  ?>
      <script> alert('관리자 비밀번호가 일치하지 않습니다.'); history.back(); </script>
  <?php
}
