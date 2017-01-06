<?php

$classname=$_POST["classname"];
$major=$_POST["major"];
$opendate=$_POST["opendate"];

if( empty($_POST["classname"]) && empty($_POST["major"]) && empty($_POST["opendate"]) ){
	$str = <<<eot
<script>
alert("提交不能为空");
history.go(-1);
</script>
eot;
	
	echo $str;
}	
	else{

$dsn="mysql:host=localhost;dbname=school";
$db=new PDO($dsn,"root","");
$db->exec("set names utf-8");
$sql="insert into t_class(classname,major,opendate) values(?,?,?)";
$pre=$db->prepare($sql);     //准备
$pre->bindValue(1, $classname);
$pre->bindValue(2, $major);
$pre->bindValue(3, $opendate);  //绑定
$count=$pre->execute();   //执行
$db=null;

//exec execute 差别

header("refresh:2;url=addclass.html");
echo "<br />2秒后返回添加页";

}





?>
