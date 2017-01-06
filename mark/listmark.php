
<?php
ini_set('date.timezone','Asia/Shanghai');
//用户登录时间
//第一次登录的话写这一次登录时间，第二次则显示上次的登录时间

if(!empty($_COOKIE['lastvisit'])){
	echo "您上次访问时间是".$_COOKIE['lastvisit'];
}else{
	echo "您是第一次访问";
}
setcookie("lastvisit",date("Y-M-D h:i:s"),time()+3600*60*30*12);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>班级详细页</title>
</head>
<body>
<table border="1">
<tr>
<th>id</th>
<th>成绩</th>
<th>学生id</th>
<th>班级名称</th>
<th>操作</th>
</tr>
<?php

$pageNum=1;
if(isset($_GET["p"])){
	$pageNum=$_GET["p"];
}
$pageSize=5;
$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn,"root","");
$db->exec("set names utf8");
$sql="select * from t_mark limit ".($pageNum-1)*$pageSize.",$pageSize";
$pre=$db->prepare($sql);
$pre->execute();
$date=$pre->fetchAll();
foreach ($date as $v){
	?>
	<tr>
	<td><?php echo $v["id"];?></td>
	<td><?php echo $v["mark"];?></td>
	<td><?php echo $v["studentid"];?></td>
	<td><?php echo $v["courseid"];?></td>
	<td>
		<a href="showdetailmark.php?id=<?php echo $v['id'];?>">编辑</a>
	</td>
	</tr>
	<?php 
}
?>
</table>
</body>
	<?php
	//最后一页的页码
	//总记录条数    除以页面大小 =最后一页的页码  如果不能被整除就加一
	$sql="select * from t_mark";
	$res=$db->query($sql);
	$counts=count($res->fetchAll());  //总记录条数
	$lastPageNum=(int)($counts/$pageSize);
	
	if($counts%$pageSize != 0){
		$lastPageNum++;
	}
	if($pageNum<=1){
		echo "上一页";
	}else{
		?>
		<a href="listmark.php?p=<?php echo $pageNum-1;?>">上一页</a> 
		<?php 
	}
	
	if($pageNum>=$lastPageNum){
		echo "下一页";
	}else{
	?>
		<a href="listmark.php?p=<?php echo $pageNum+1;?>">下一页</a>
		<?php 
		}
		?>
</html>










