<?php
$id_num=$_POST['id_num'];

$con = mysqli_connect("localhost","root","","todaymenu") or die ("Can't access DB");
// $query = "update dish set recommend=recommend-1 where id_num='".$a."' or id_num='".$b."' or id_num='".$c."'";
// $result=mysqli_query($con,$query);

$query = "delete from recommend where id_num=".$id_num;
$result=mysqli_query($con,$query);

?>
