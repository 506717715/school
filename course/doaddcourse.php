<?php
//这是sql接受值方式

/*
$course=$_GET["coursename"];

mysql_connect("localhost","root","");
mysql_select_db("school");
mysql_query("set names utf8");
$sql="insert into t_course(coursename) value('$course')";
mysql_query($sql);
header("refresh:2;url='addcourse.html'");
echo "提交成功,2秒自动跳回添加页";
*/

//这是PDO接收值方式
$course = $_GET["coursename"];
if(empty($_GET["coursename"])){
	$sty = <<<eot
	<script>
	alert('不能为空');
	history.go(-1);
	</script>
eot;
	echo $sty;
}else{

$dsn = "mysql:host=localhost;dbname=school";
$db = new PDO($dsn,"root","");
$sql = "insert into t_course(coursename) values(?)";
$db->exec("set names utf8");
$pre = $db->prepare($sql);
$pre->bindValue(1,$course);
$pre->execute();
$db = null;

header("refresh:2;url=addcourse.html");
}
?>
