<?php

session_start();

$loginid = $_POST["loginid"];
$loginpwd = $_POST["loginpwd"];

$_SESSION['loginid']=$loginid;

//keep  判断记录账号密码
if(!empty($_POST["remember"])){
	setcookie("loginid",$loginid,time()+24*3600);
	setcookie("loginpwd",$loginpwd,time()+24*3600);
}else{
	if(empty($_COOKIE["loginid"])){
	setcookie("loginid",$loginid,time()-1);
	setcookie("loginpwd",$loginpwd,time()-1);
	}
}

if(empty($_POST["loginid"]) && empty($_POST["loginpwd"])){  
	$sty = <<<eot
	<script>
	alert("不能为空");
	history.back();		
	</script>
eot;
echo $sty;	
}else{

$dsn = "mysql:host=localhost;dbname=school";
$db = new PDO($dsn,"root","");
$db->exec("set names uft8");
$sql = "select loginid,loginpwd from t_user ";
$pre=$db->prepare($sql);
$pre->bindValue(1, $loginid);
$pre->bindValue(2, $loginpwd);
$pre->execute();
$db=$pre->fetchAll();
foreach ($db as $v)
	
if($loginid == $v["loginid"] && $loginpwd == $v["loginpwd"]){
	header("location:index.php");
}else{
	$sty = <<<eot
	<script>
	alert("密码错误");
 	history.go(-1);
	</script>
	
eot;
	echo $sty;
}
}

?>