<?php

$id=$_POST["id"];
$classname=$_POST["classname"];
$major=$_POST["major"];
$opendate=$_POST["opendate"];

$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn,"root","");
$db->exec("set names utf8");
$sql="update t_class ".
	 " set classname=?,major=?,opendate=?".
	 " where id=?";
$pre=$db->prepare($sql);
$pre->bindValue(1, $classname);
$pre->bindValue(2, $major);
$pre->bindValue(3, $opendate);
$pre->bindValue(4, $id);
$count=$pre->execute();

if($count==1){
	echo "修改成功";
}else{
	echo "修改失败";
}
header("refresh:2;url=listclass.php");


?>