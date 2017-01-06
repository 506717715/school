<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>班级详细页</title>
</head>
<body>
<table border="1">
<form action="doupdateclass.php" method="post">
<tr>
<th>id</th>
<th>班级名称</th>
<th>专业名称</th>
<th>开班日期</th>
<th>操作</th>
</tr>

<?php

$id=$_GET["id"];

$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn,"root","");
$db->exec("set names utf8");
$sql="select * from t_class where id=?";
$pre=$db->prepare($sql);
$pre->bindValue(1, $id);
$pre->execute();
$count=$pre->fetchAll();

foreach ($count as $v){
//隐藏域带ID
?>
	<tr>
	<input type="hidden" name="id" value="<?php echo $v['id'];?>"/>
	<td><?php echo $v["id"];?></td>
	<td><input type="text" name="classname" value="<?php echo $v["classname"];?>"></td>
	<td><input type="text" name="major" value="<?php echo $v["major"];?>"></td>
	<td><input type="text" name="opendate" value="<?php echo $v["opendate"];?>"></td>
	<td>
	<input type="submit" class="submit" value="修改">
	<a href="dodelclass.php?id=<?php echo $v["id"];?>">删除</a>
	<a href="listclass.php">返回</a>
	</td>
	</tr>
	<?php 
}
?>
</table>
</form>
</body>
</html>
