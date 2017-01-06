<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>班级详细页</title>
<style>
.submit{
	
}
</style>
</head>
<body>
<table border="1">
<form action="doupdatestudent.php" method="post">
<tr>
<th>姓名</th>
<th>性别</th>
<th>年纪</th>
<th>学号</th>
<th>电话</th>
<th>地址</th>
<th>班级id</th>
<th>操作</th>
</tr>
<?php

$id=$_GET["id"];
 
$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn, "root",""); 
$db->exec("set names utf8");
$sql="select * from t_student where id=?";

$pre=$db->prepare($sql);
$pre->bindValue(1, $id);
$pre->execute();
$date=$pre->fetchAll();

foreach ($date as $v){
?>
	<tr>
	<input type="hidden" name="id" value="<?php echo $v['id'];?>"/>
	<td><input type='text' name="name" value='<?php echo $v["name"];?>'></td>
	<td><input type='text' name="sex" value='<?php echo $v["sex"];?>'></td>
	<td><input type='text' name="age" value='<?php echo $v["age"];?>'></td>
	<td><input type='text' name="number" value='<?php echo $v["number"];?>'></td>
	<td><input type='text' name="phone" value='<?php echo $v["phone"];?>'></td>
	<td><input type='text' name="address" value='<?php echo $v["address"];?>'></td>
	<td><input type='text' name="classid" value='<?php echo $v["classid"];?>'></td>
	<td>
	<input type="submit" value="修改">
	<a href="dodelstudent.php?id=<?php echo $v["id"];?>">删除</a>
	<a href="liststudent.php">返回</a>
	</td>
	</tr>
	<?php 
}

?>
</form>
</table>
</body>
</html>