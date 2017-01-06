<?php

$id=$_POST["id"];
$name=$_POST["name"];
$sex=$_POST["sex"];
$age=$_POST["age"];
$address=$_POST["address"];
$phone=$_POST["phone"];
$number=$_POST["number"];

$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn,"root","");
$db->exec("set names utf8");
$sql="update t_student set name=?,age=?,sex=?,address=?,phone=?,number=? where id=?";
$pre=$db->prepare($sql);
$pre->bindValue(1, $name);
$pre->bindValue(2, $age);
$pre->bindValue(3, $sex);
$pre->bindValue(4, $address);
$pre->bindValue(5, $phone);
$pre->bindValue(6, $number);
$pre->bindValue(7, $id);
$pre->execute();
header("refresh:2;url=liststudent.php");
echo "修改成功,2秒后返回详细页";


?>