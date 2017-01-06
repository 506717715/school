<?php

$name=$_POST["name"];
$sex=$_POST["sex"];
$age=$_POST["age"];
$number=$_POST["number"];
$phone=$_POST["phone"];
$address=$_POST["address"];
$classid=$_POST["select"];

if(empty($_POST["name"]) && empty($_POST["sex"]) && empty($_POST["age"]) && empty($_POST["number"]) && empty($_POST["phone"]) && empty($_POST["address"])){
	$sty = <<<eot
	<script>
	alert("不能为空");
	history.back();
	</script>
eot;
echo $sty;
}else{
	
$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn,"root","");
$db->exec("set names utf8");
$sql="insert into t_student(name,age,sex,address,phone,number,classid) ". 
		  "values(?,?,?,?,?,?,?)";
$pre=$db->prepare($sql);
$pre->bindValue(1, $name);
$pre->bindValue(2, $age);
$pre->bindValue(3, $sex);
$pre->bindValue(4, $address);
$pre->bindValue(5, $phone);
$pre->bindValue(6, $number);
$pre->bindValue(7, $classid);
$pre->execute();

header("refresh:2;url=addstudent.html");
$db=null;

}
?>