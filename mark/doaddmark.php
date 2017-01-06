<?php

$mark=$_POST["mark"];
$studentid=$_POST["studentid"];
$courseid=$_POST["courseid"];


//这是sql接受值方式
/*
mysql_connect("localhost","root","");
mysql_select_db("school");
mysql_query("set names utf8");
$sql="insert into t_mark(mark,studentid,courseid) ". 
      " values('$mark','$studentid','$courseid')";
mysql_query($sql);
header("refresh:2;url=addmark.html");
echo "添加成功，2秒后自动跳回添加页面";
*/
//这是PDO接收值方式

if(empty($_POST["mark"]) && empty($_POST["studentid"]) && empty($_POST["courseid"])){
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
$sql="insert into t_mark(mark,studentid,courseid) values(?,?,?)";
$pre=$db->prepare($sql);
$pre->bindValue(1, $mark);
$pre->bindValue(2, $studentid);
$pre->bindValue(3, $courseid);
$pre->execute();
$db=null;

header("refresh:2;url=addmark.html");
}
?>