<?php
$name=$_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$age=$_POST['age'];
$password = md5($_POST["password"]);
var_dump($password);

$con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
$query = "insert into users (role, name, email, password, contact, age) values('1', '".$name."', '".$email."', '".$password."', '".$contact."', '".$age."')";
$result=mysqli_query($con,$query);

?>
    <script> alert('회원가입이 완료되었습니다.'); location.href="./signin-up.php"; </script>
<?php
?>
