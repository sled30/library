<?php
require_once 'conf/db.connect.php'; 
require_once 'conf/function.php';
session_start();
if(!isset($_SESSION['role']))
  header('Location:https://max-30ru.000webhostapp.com/index.php');
/* 	id )(	name )(	createdate )(	lastname )(	befdat )(	login 	)(password )(	mail )(	phone )(role*/
if(isset($_POST["name"]) && isset($_POST["lastname"]) && isset($_POST["befdate"]) && isset($_POST["login"]) && isset($_POST["passwd"])
&& isset($_POST["email"]) && isset($_POST["phone"]))
{
	useraddfromdb($_POST['name'],  $_POST['lastname'], $_POST['befdate'], $_POST['login'], $_POST['passwd'], $_POST['email'], $_POST['phone']);
}
 ?>
<!DOCTYPE html>
<html>

<head>
  <title>Сайт библиотеки</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <div id="header">
    <!-- Верхняя часть страницы -->
    <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
    <span class="slogan">ресурс библиотеки</span>
    <span class="slogan"><?php echo $_SESSION["name"]?></span>
    
    <!-- Верхняя часть страницы -->
  </div>

  <div id="content">
    <!-- Заголовок -->
 
    <!-- Область основного контента -->
    <form action="useradd.php" method="POST">
		<table> <theade>создание пользователя</theade>
			<tr><td>имя</td> <td><input type="text" name="name"></td></tr>
			<tr><td>фамилия</td> <td><input type="text" name="lastname"></td></tr>
			<tr><td>дата рождения</td> <td><input type="text" name="befdate"></td></tr>
			<tr><td>имя пользователя</td> <td><input type="text" name="login"></td></tr>
			<tr><td>пароль</td> <td><input type="password" name="passwd"></td></tr>
			<tr><td>адрес электронной почты</td> <td><input type="text" name="email"></td></tr>
			<tr><td>телефон</td> <td><input type="text" name="phone"></td></tr>
			<?php if($_SESSION['role'] ==1) echo "<tr><td>роль</td> <td><select name='role'>
			<option value='1'>администратор</option>
			<option value='2'>пользователь</option></td></tr>";
			?>
			<tr><td></td><td><input type='submit' value='сохранить'></td>
		</table>
    </form>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <!-- Навигация -->
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <?php
 require_once 'conf/leftconsol.php';
 ?>
    <!-- Меню -->
    <!-- Навигация -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; копирайт, 2000 &ndash; 2015
    <!-- Нижняя часть страницы -->
  </div>
</body>

</html>
