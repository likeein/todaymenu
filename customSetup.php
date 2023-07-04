<?php
session_start();
$id_num = $_SESSION['id_num'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
$query = "update users set height=".$height.", weight=".$weight." where id_num=".$id_num;
$result = $con->query($query);
?>
    <script> alert('기초대사량을 계산해 맞춤반찬을 추천해드리겠습니다.'); location.href="./custom.php"; </script>
<?php
