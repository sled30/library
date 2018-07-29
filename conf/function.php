<?php
	require_once 'db.connect.php'; 
	function autorysed($loginpost, $passwdpost)
	{
	$passwd=$passwdpost;
	$md5passwd=md5($passwd);
	$login=$loginpost;
	 /*	id 	name 	createdate 	lastname 	befdat 	login 	password*/
	$sqlaut="select id, name, createdate, lastname, password, login, role from users where login='$login' and password='$md5passwd'";
	$autdb=mysqli_query($connect, $sqlaut);
	$aut=mysqli_fetch_assoc($autdb);
			if($login==$aut['login'] && $md5passwd==$aut['password'])
			{
			$_SESSION['id']=$aut['id'];
			$_SESSION['name']=$aut['name'];
			$_SESSION['lastname']=$aut['lastname'];
			$_SESSION['role']=$aut['role'];
			echo "авторизация успешна";
			}
	}
?>
