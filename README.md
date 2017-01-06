校园管理系统

PDO方式

录入期中考试

学生信息管理
课程信息管理
成绩信息管理
班级信息管理

数据库
班级表 t_class
	classname 班级名称
	major  专业
	opendate 入学时间
学生表 t_student
 	姓名 name
 	性别 sex
 	年龄 age
 	学号 number
 	电话 phone
 	家庭住址  address
 	班级编号 classid
 课程表  t_course
	课程名称 coursename
成绩表 t_mark
	成绩 mark
	学生编号 studentid
	课程编号 courseid

问题
隐藏域带ID
处理修改跳转回详细页 报错

功能
用户上一次登录时间
自动保存账号密码


添加学生成绩

学生id 学生名字 课程 成绩 班级名称 


-----------------------------------------------------------------
是否保存密码代码
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>老杜</title>
<script type="text/javascript">
</script>
</head>
<body>
<form action="4.php" method="post">
账号<input id="loginid" type="text" name="loginid" value="<?php echo isset($_COOKIE['loginid'])?$_COOKIE["loginid"]:"";?>"/><br />
密码<input type="password" id="loginpwd" name="loginpwd" value="<?php echo isset($_COOKIE['loginid'])?$_COOKIE["loginid"]:"";?>"/><br /> 
是不是保存用户密码<input type="checkbox" value="yes" name="keep"><br />
<input type="submit" value="提交">

</form>
</body>
</html>

<?php
//获取

$loginid = $_POST["loginid"];
$loginpwd = $_POST["loginpwd"];

if (empty($_POST["keep"])) {
	//已经有的cookie删除
	if(!empty($_COOKIE["loginid"])){
		setCookie("loginid",$loginid,time()-3600);
		setCookie("loginpwd",$loginpwd,time()-3600);
	}	
}else{
	setCookie('loginid',$loginid,time()+24*3600);
	setCookie('loginpwd',$loginpwd,time()+24*3600);
	echo "用户保存";
}

//<?php echo isset($_COOKIE['loginpwd'])?$_COOKIE['loginpwd']:"
//setcookie($loginid,$loginpwd,time()+3600);
//md5(账号+密码+ip2long($ip_address)
-----------------------------------------------------------------





