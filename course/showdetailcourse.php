<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>班级详细页</title>
<style>
</style>
</head>
<body>
<table border="1">
<form action="doupdatecourse.php" method="post">
<tr>
<th>id</th>
<th>课程名称</th>
<th>操作</th>
</tr>

<?php

$id=$_GET["id"];

$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn,"root","");
$db->exec("set names utf8");
$sql="select * from t_course where id=?";
$pre=$db->prepare($sql);
$pre->bindValue(1, $id);
$pre->execute();
$count=$pre->fetchAll();

foreach ($count as $v){
?>
	<tr>
	<input type="hidden" name="id" value="<?php echo $v["id"];?>"/>
	<td><input type="text" name="id" value="<?php echo $v["id"];?>"></td>
	<td><input type="text" name="coursename" value="<?php echo $v["coursename"];?>"></td>
	<td>
	<input type="submit" class="submit" value="修改">
	<a href="dodelclass.php?id=<?php echo $v["id"];?>">删除</a>
	<a href="listcourse.php">返回</a>
	</td>
	</tr>
	<?php 
}
?>
</table>
</form>
</body>
</html>
