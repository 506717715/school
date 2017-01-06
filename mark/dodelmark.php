<?php


$id=$_GET["id"];

$dsn = "mysql:host=localhost;dbname=school";
$db = new PDO($dsn, "root","");
$sql = "delete from t_mark where id=?";
$pre = $db->prepare($sql);
$pre->bindValue(1, $id);
$pre->execute();
header("refresh:0;url=listmark.php");



?>