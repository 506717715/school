<?php

$id=$_POST["id"];
$studentid=$_POST["studentid"];
$courseid=$_POST["courseid"];

$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn,"root","");
$db->exec("set names utf8");
$sql="update t_mark ".
	 " set studentid=?,courseid=?".
	 " where id=?";
$pre=$db->prepare($sql);
$pre->bindValue(1, $studentid);
$pre->bindValue(2, $courseid);
$count=$pre->execute();

if($count==1){
	echo "修改成功";
}else{
	echo "修改失败";
}
header("refresh:2;url=listmark.php");


?>