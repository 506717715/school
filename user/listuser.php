<?php 

$dsn = "mysql:host=localhost;dbname=school";
$db  = new PDO($dsn, "root","");
$db->exec("set names utf8");
$sql = "select * from t_user";
$pre = $db->prepare($sql);
$pre->execute();

$date = $pre->fetchAll();
?>
<table border="1">
<tr>
<th>账号</th>
<th>密码</th>
<th>昵称</th>
<th>操作</th>
</tr>
<?php 
		foreach ($date as $v){
?>		
			<tr>
			<td><?php echo $v["loginid"];?></td>
			<td><?php echo $v["loginpwd"];?></td>
			<td><?php echo $v["loginname"];?></td>
			<td>
			分配权限
			</td>
			</tr>
<?php 
		}

?>
</table>