<?php
require_once 'conf/db.connect.php'; 
session_start();
if(!isset($_SESSION['role']))
  header('Location:https://max-30ru.000webhostapp.com/index.php');
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
    <h1>Добро пожаловать</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <h1>Добро пожаловать</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <!-- Область основного контента -->
   <h3>книги на руках</h3>
   <table>
	   <tr><td>Автор (фамилия)</td><td>Автор (имя)
		  </td><td>Название книги</td><td>дата выдачи</td></tr>
	   
   <?php
   $users=$_SESSION["id"]; /*прилетает какого пользователя смотреть*/
   $selbook="SELECT avtor.lastname as avtorlastname, avtor.name as avtorname, books.name as bookname, book_vidan.createdate as createdate, users.id, users.name as username 
   FROM book_vidan JOIN users ON users.id=book_vidan.userid
   JOIN books on books.id=book_vidan.bookid
   join avtor on books.avtor=avtor.id where users.id='$users'";
   $fromuser=mysqli_query($connect, $selbook);
   while($bookdb=mysqli_fetch_assoc($fromuser))
   {
   echo "<tr><td>".$bookdb['avtorlastname']."</td><td>".$bookdb['avtorname'].
   "</td><td>".$bookdb['bookname']."</td><td>".$bookdb['createdate']."</td></tr>";
   }
   if(!isset($_SESSION['role'])==1)
   {
   
   $sqladminotcet="SELECT avtor.lastname as avtorlastname, avtor.name as avtorname, books.name as bookname, book_vidan.createdate as createdate, users.id, users.name as username 
   FROM book_vidan JOIN users ON users.id=book_vidan.userid
   JOIN books on books.id=book_vidan.bookid
   join avtor on books.avtor=avtor.id";
   echo $sqladminotcet;
   $adminotcetdb=mysqli_query($connect, $sqladminotcet);
   
   while($adminotcet= mysqli_fetch_assoc($adminotcetdb))
   //echo "rr";
   echo $adminotcet['avtorlastname']. $adminotcet['avtornamm']. $adminotcet['bookname'].$adminotcet['createdate'].$adminotcet['username'] ;               
   
}

   ?>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <!-- Навигация -->
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
   <?php require_once 'conf/leftconsol.php'  ?>
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
