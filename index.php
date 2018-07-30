<?php
session_start();
require_once 'conf/db.connect.php';
if(isset($_POST['login']) && isset($_POST['passwd']))
{
	$login=$_POST['login'];
	$passwd=$_POST['passwd'];
autorysed($login, $passwd);
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
    <span class="slogan"><?php if(isset($_SESSION["name"]))echo $_SESSION["name"]?></span>
    
    <!-- Верхняя часть страницы -->
  </div>

  <div id="content">
    <!-- Заголовок -->
    <h1>Добро пожаловать</h1>
   <!-- Заголовок -->
    <!-- Область основного контента -->
    <?php 
    if(!isset($_SESSION['id']))
    {
		echo "<h3>авторизуйтесь</h3>
<form action='index.php' method='POST'>
    <p> логин <input type='text' name='login'></p>
    <p>пароль<input type='password' name='passwd'></p>
    <p> <input type='submit' value='вход' name='aut'>
    <input type='submit' value='регистрация' name='reg'></p>
    </form>
<h2>Вход не авторизованным пользователям запрещен!</h2>";
}
?>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <!-- Навигация -->
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <ul>
      <li><a href='index.php'>Домой</a>
      </li>
      <li><a href='menu.php'>Управление книгами</a>
      </li>
      <li><a href='useradd.php'>Управление пользователями</a>
      </li>
      <li><a href='getbook.php'>выдача книг</a>
      </li>
        <li><a href='library.php'>выданые книг</a>
      </li>
    </ul>
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
