<?php

session_start();
if(isset($_SESSION["login"])){
	header("location:../login/loginsuccess.html");
}

?>
登录成功页