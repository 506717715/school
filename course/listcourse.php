<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>班级添加页</title>
</head>
<body>
<table border="1">
<tr>
<th>id</th>
<th>课程名称</th>
<th>操作</th>
</tr>
<?php

$pageNum = 1;
if(isset($_GET["p"])){
	$pageNum = $_GET["p"];
}
$pageSize = 5;
header("Content-type:text/html;charset=uft-8");
$dsn = "mysql:host=localhost;dbname=school";
$db = new PDO($dsn,"root","");
$db->query("set names utf8");
$sql = "select * from t_course limit ".($pageNum-1)*$pageSize.",$pageSize";
$pre = $db->prepare($sql);
$pre->execute();
$date = $pre->fetchAll();
foreach ($date as $i){
?>
	<tr>
	<td><?php echo $i["id"];?></td>
	<td><?php echo $i["coursename"];?></td>
	<td>
		<a href = "showdetailcourse.php?id=<?php echo $i["id"];?>">编辑</a>
	</td>
	</tr>
	<?php
}
?>
</table>

<?php 

$sql = "select * from t_course";
$res = $db->query($sql);
$counts = count($res->fetchAll());  //总记录条数
$lastPageNum=(int)($counts/$pageSize); 	//最后一页页码
if($counts%$pageSize != 0){
	$lastPageNum++;
}

	if($pageNum<=1){
		echo "上一页";
	}else{
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