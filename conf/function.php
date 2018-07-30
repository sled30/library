<?php
	require_once 'db.connect.php'; 
		function test()
	{
		echo "tect";
	}
	function autorysed($loginpost, $passwdpost)
	{
		global $connect; 
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
			}
	 }
	 function useraddfromdb($name, $lastname, $befdate, $login, $passwd, $email, $phone)
	 { 
		 global $connect; 
			if(($_SESSION["role"]!=1) &&  ($_POST["role"]=1)) 
			exit; 
				else 
				{
				$passwd=md5($_POST["passwd"]); 
				$sqladduser="insert into users (name, lastname, befdat, login, 
			password, mail, phone, role) value('".$_POST["name"]."', 
			'".$_POST["lastname"]."', '".$_POST["befdate"]."', 
			'".$_POST["login"]."', '".$passwd."', '".$_POST["email"]."', ' 
			".$_POST["phone"]."', '".$_POST["role"]."')"; 
			$useradd=mysqli_query($connect, $sqladduser); 
			}
		}
		function addautor($autorname, $autorlastname)
		{
			 global $connect;
			$autorname=$_POST["autorname"];
			$autorlastname=$_POST["autorlastname"];
			$sqladdautor="insert into avtor (name, lastname) value ('$autorname', '$autorlastname' )";
			$addautordb=mysqli_query($connect, $sqladdautor);
			echo"автор добавлен";
		}
?>
