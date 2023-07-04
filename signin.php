<?php
$email=$_POST['email'];
$password = md5($_POST["password"]);
var_dump($password);

$con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
$query = "select * from users where email='".$email."' and password='".$password."'";
$result = $con->query($query);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if ($row != null) {
    session_start();
    $_SESSION['id_num'] = $row['id_num'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['contact'] = $row['contact'];
    $_SESSION['age'] = $row['age'];
    ?>
        <script> alert('로그인이 완료되었습니다.'); location.href="./index.php"; </script>
    <?php
} else {?>
    <script> alert('아이디나 비밀번호가 틀립니다.\n다시 시도해 주세요.'); location.href="./signin-up.php"; </script>
<?php } ?>
