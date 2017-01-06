<?php

$id=$_GET["id"];

$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn,"root","");
$db->exec("set names utf8");
$sql="delete from t_class where id=?";
$pre=$db->prepare($sql);
$pre->bindValue(1,$id);
$count=$pre->execute();
header("refresh:2;url=listclass.php");
if($count==1){
	echo "删除成功";
}else{
	echo "删除失败";
}

?>