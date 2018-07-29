<?php
require_once 'conf/db.connect.php'; 
session_start();

if(!isset($_SESSION['role']))
  header('Location:https://max-30ru.000webhostapp.com/index.php');
	//id 	bookid 	userid 	createdate 	finfshdate 
	
if(isset($_POST['bookname']) && isset($_POST['username']))
{
$sqladdgetbook="insert into book_vidan (bookid, userid) value (".$_POST['bookname'].", ". $_POST['username']." )";
$addgetbookdb=mysqli_query($connect, $sqladdgetbook);
$messaddgetbook="книга выдана";	
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
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <h1>Добро пожаловать</h1>
    <!--	id 	bookid 	userid 	createdate 	finfshdate -->
    
    <form action='getbook.php' method='POST'>
		<table>
			<tr><td> <select name='bookname'> 
				<?php
        
         $sqlbook="select id, name from books";
        $bookdb=mysqli_query($connect, $sqlbook);
        while($book=mysqli_fetch_assoc($bookdb))
        {
        echo "<option value='".$book['id']."'>".$book['name']."</option>";
                  }
        ?>
        </select>
	  </td>
    <td><select name='username'> 
				<?php
        
         $sqlgetuser="select id, login from users";
        $getuserdb=mysqli_query($connect, $sqlgetuser);
        while($user=mysqli_fetch_assoc($getuserdb))
        {
        echo "<option value='".$user['id']."'>".$user['login']."</option>";
                  }
        ?>
		<td>
         <tr><td> <input type='submit' value='выдать' name='getbook'> </td></tr>
    </table>
    </form>
    <?php  if(isset($messaddgetbook)) echo $messaddgetbook?>

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
