<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>班级详细页</title>
</head>
<body>
<table border="1">
<tr>
<th>姓名</th>
<th>性别</th>
<th>年龄</th>
<th>学号</th>
<th>手机</th>
<th>地址</th>
<th>班级id</th>
<th>操作</th>
</tr>
<?php

session_start();

if(empty($_SESSION['loginid'])){
	header("location:..\login.html");
}

$pageNum = 1;   //页码
if(isset($_GET["p"])){
	$pageNum=$_GET["p"];
}
$pageSize = 5;  //页面大小
$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn,"root","");
$db->exec("set names utf8");
$sql="select * from t_student limit ".($pageNum-1)*$pageSize.",$pageSize";
$pre=$db->prepare($sql);
$pre->execute();
$date=$pre->fetchAll();
foreach ($date as $v){
?>
	<tr>
	<td><?php echo $v["name"];?></td>
	<td><?php echo $v["sex"];?></td>
	<td><?php echo $v["age"];?></td>
	<td><?php echo $v["number"];?></td>
	<td><?php echo $v["phone"];?></td>
	<td><?php echo $v["address"];?></td>
	<td><?php echo $v["classid"];?></td>
	<td>
	<a href="showdetailstudent.php?id=<?php echo $v["id"];?>">编辑</a>
	</td>
	</tr>
	<?php 
}
?>
</table>
<?php 
//分页思路
/*
 * limit 声明页码 页面大小 
 * 求出最后一页页码
 * 
 * */
$sql="select * from t_student";
$res=$db->query($sql);
$counts=count($res->fetchAll());
$lastPageNum=(int)($counts/$pageSize);  //最后一页页码
if($counts%$pageSize!=0){				//总记录条数不能被页面大小整除 最后一页的页码就加加
	$lastPageNum++;
}

	if($pageNum<=1){
		echo "上一页";
	}else{
		?>
		<a href="liststudent.php?p=<?php echo $pageNum-1;?>">上一页</a>
		<?php 
	}
	
	if($pageNum>=$lastPageNum){
		echo "下一页";
	}else{
		?>
		<a href="liststudent.php?p=<?php echo $pageNum+1;?>">下一页</a>
		<?php 
	}
?>
<br />
</body>
</html>