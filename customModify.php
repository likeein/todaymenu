<?php
session_start();
$id_num = $_SESSION['id_num'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$age = $_POST['age'];
$contact = $_POST['contact'];

$con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
$query = "update users set height=".$height.", weight=".$weight.", age=".$age.", contact='".$contact."' where id_num=".$id_num;
$result = $con->query($query);
?>
    <script> alert('개인정보가 수정되었습니다.'); location.href="./userinfo.php"; </script>
<?php
