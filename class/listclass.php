<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>班级详细页</title>
</head>
<body>
<table border="1">
<tr>
<th>id</th>
<th>班级名称</th>
<th>专业名称</th>
<th>开班日期</th>
<th>操作</th>
</tr>

<?php

$pageNum=1;				
if(isset($_GET["p"])){
	$pageSize=$_GET["p"];
}
$pageSize=5;

$dsn = "mysql:host=localhost;dbname=school";
$db = new PDO($dsn,"root","");
$db->exec("set names uft8");
$sql = " select * from t_class limit ".($pageNum-1)*$pageSize.",$pageSize";
$pre = $db->prepare($sql); //准备
$pre->execute();	//执行方法
$date = $pre->fetchAll();//获取全部

foreach ($date as $v){
?>
	<tr>
	<td><?php echo $v["id"];?></td>
	<td><?php echo $v["classname"];?></td>
	<td><?php echo $v["major"];?></td>
	<td><?php echo $v["opendate"];?></td>
	<td>
	       <a href="showdetailclass.php?id=<?php echo $v["id"];?>">编辑</a>
	</td>
	</tr>
	<?php 
	}
	?>


</table>
<?php

$sql = "select * from t_class";
$res = $db->query($sql);
$counts = count($res->fetchAll());  //总记录条数
$lastPageNum = (int)($counts/$pageSize);
if($counts%$pageSize !=0){
	$lastPageNum++;
}

	if($pageNum<=1){
		echo "上一页";
}else {
		?>
		<a href="listcourse.php?p=<?php echo $pageNum-1;?>">上一页</a>
		<?php 
}
	if($pageNum>=$lastPageNum){
		echo "下一页";
}else{
		?>
		<a href="listcourse.php?p=<?php echo $pageNum+1;?>">下一页</a>
		<?php 
}
?>
</body>
</html>

 
 
 
 
 
 
 