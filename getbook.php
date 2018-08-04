<?php
require_once 'conf/db.connect.php'; 
require_once 'conf/function.php'; 
session_start();

	//id 	bookid 	userid 	createdate 	finfshdate 
	
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
    
    <form action='getbook.php' method='get'>
		<table>
			<tr>
			
			<?php
        
         $sqlbook="select id, name from books";
        $bookdb=mysqli_query($connect, $sqlbook);
        while($book=mysqli_fetch_assoc($bookdb))
        {
            /*<input type="checkbox" name="option2" value="a2">Windows 2000<Br>*/
        echo "<tr><td ><a href=https://max-30ru.000webhostapp.com/getbook.php?book=".$book['id'].">";
        echo $book['name']."</a></td> </tr>";
                  }
        ?>
			<!--<select name='bookname'> 
				<?php/*
        
         $sqlbook="select id, name from books";
        $bookdb=mysqli_query($connect, $sqlbook);
        while($book=mysqli_fetch_assoc($bookdb))
        {
        echo "<option value='".$book['id']."'>".$book['name']."</option>";
                  }
        */?>
        </select>-->
	  </td>
    <!--<td><select name='username'> -->
			
		<!--<td>
         <tr><td> <input type='submit' value='выдать' name='getbook'> </td></tr>-->
    </table>
    </form>
  <?php
  if(isset($_GET['book']))
{
getbook($_GET['book']);
}
?>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <!-- Навигация -->
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
  <?php require_once 'conf/leftconsol.php'?>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; копирайт, 2000 &ndash; 2015
    <!-- Нижняя часть страницы -->
  </div>
</body>

</html>
