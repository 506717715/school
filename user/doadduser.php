<?php 


//接受表单提交
$loginid=$_POST["loginid"];
$loginpwd=$_POST["loginpwd"];
$loginname=$_POST["loginname"];
/*
//连接数据库
mysql_connect("localhost","root","");
mysql_select_db("school");
mysql_query("set names utf8");

//编写语句 执行
$sql="insert into t_user(loginid,loginpwd,loginname)".
	 " values ('$loginid','$loginpwd','$loginname')";
mysql_query($sql);
//header("refresh:2;url=adduser.html");
echo "添加成功,两秒后返回添加页面";
*/
if(empty($_POST["loginid"]) && empty($_POST["loginpwd"]) && empty($_POST["loginname"])){
	$sty = <<<eot
	<script>
	alert("不能为空");
	history.back();
	</script>
eot;
}else{
$dsn = "mysql:host=localhost;dbname=school";
$db = new PDO($dsn,"root","");
$db->query("set names utf8");
$sql = "insert into t_user(loginid,loginpwd,loginname) values(?,?,?)";
$pre = $db->prepare($sql);
$pre->bindValue(1, $loginid);
$pre->bindValue(2, $loginpwd);
$pre->bindValue(3, $loginname);
$count = $pre->execute();

$db = null;
header("refresh:2;url=adduser.html");
}
?>