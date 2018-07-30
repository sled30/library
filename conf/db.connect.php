<?php
$dbhost="localhost";
$dbname="id6468118_dbtest";
$dbschem="name";
$dbuser="id6468118_test";
$bdpaswd="1Xthysirf";
global $connect= mysqli_connect($dbhost, $dbuser, $bdpaswd, $dbname);
if(!$connect) 
{
   echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
/*function autorysed($loginpost, $passwdpost)
	{
	$passwd=$passwdpost;
	$md5passwd=md5($passwd);
	$login=$loginpost;
	 /*	id 	name 	createdate 	lastname 	befdat 	login 	password*//*
	$sqlaut="select id, name, createdate, lastname, password, login, role from users where login='$login' and password='$md5passwd'";
	global $connect;
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
		}*/
?>
