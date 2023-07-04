<?php
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$id_num=$_POST['user'];

$con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
$query = "update dish set recommend=recommend+1 where id_num='".$a."' or id_num='".$b."' or id_num='".$c."'";
$result=mysqli_query($con,$query);

$query = "insert into recommend (user_id, a, b, c) values('".$id_num."', '".$a."', '".$b."', '".$c."')";
$result=mysqli_query($con,$query);

?>
