<?php

$id=$_GET["id"];

$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn, "root","");
$sql="delete from t_student where id=?";
$pre=$db->prepare($sql);
$pre->bindValue(1, $id);
$pre->execute();

header("refresh:2;url=liststudent.php");
echo "删除成功,两秒后返回详细页";

?>