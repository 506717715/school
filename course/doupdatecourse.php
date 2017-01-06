<?php

$id=$_POST["id"];
$coursename=$_POST["coursename"];


$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn,"root","");
$db->exec("set names utf8");
$sql="update t_course ".
	 " set coursename=?".
	 " where id=?";
$pre=$db->prepare($sql);
$pre->bindValue(1, $coursename);
$pre->bindValue(2, $id);
$count=$pre->execute();

if($count==1){
	echo "修改成功";
}else{
	echo "修改失败";
}
header("refresh:2;url=listcourse.php");


?>