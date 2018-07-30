<?php
require_once 'conf/db.connect.php'; 
require_once 'conf/function.php';
session_start();
if(isset($_SESSION['role']))
 {
     if($_SESSION['role'] !=1)
     header('Location:https://max-30ru.000webhostapp.com/index.php');
 }
																	/*жанр*/
if(isset($_POST["janrname"]) && isset($_POST["acsses"]))
{
	$janrname=$_POST["janrname"];
	$acsses=$_POST["acsses"];
	$janrsql="insert into janr (janr, acces) value ('$janrname', '$acsses')";
	$addjanr=mysqli_query($connect, $janrsql);
	$messjanradd="жанр добавлен";
}
																				/* енд*/
																				/*книга*/
if(isset($_POST["namebook"]) && isset($_POST["autor"]) && isset($_POST["janr"]) &&  isset($_POST["namebook"]))
{
	/*	id 	name 	avtor 	janr 	anotas */
	$sqladdbook="insert into  books(name, avtor, janr, anotas ) value('".$_POST["namebook"]. "', '".$_POST["autor"]."', '".$_POST["janr"]."', '"
	.$_POST["anotacia"]."')";
	$addbookdb=mysqli_query($connect, $sqladdbook);
	$messaddbook="книга".$_POST["namebook"]." добавлена в БД"; 
}
																	/*енд*/
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
      <centr>
 <?php    /* блок описывает сохранения автора*/
    if(isset($_POST["creatautor"]))
    {
echo "<form action='menu.php' method='POST'>
<table >
	<tr><td>ведите имя автора</td><td><input type='text' name='autorname'></td></tr>
	<tr><td>введите фамилию автора</td><td><input type='text' name='autorlastname'></td></tr>
	<tr><td><input type='submit'></td><td></td></tr>
</form>";
exit;
									/*конец блокаж*/
}
	if(isset($_POST["autorname"]) && isset($_POST["autorlastname"]))
	{
		addautor($_POST["autorname"], $_POST["autorlastname"]);
	}
								/* блок описывает сохранения жанра*/
    if(isset($_POST["createjanr"]))
    {
echo "<form action='menu.php' method='POST'>
<table >
	<tr><td>введите название жанра</td><td><input type='text' name='janrname'></td></tr>
	<tr><td>разрешенный возраст</td><td><input type='text' name='acsses'></td></tr>
	<tr><td><input type='submit'></td><td></td></tr>
</form>";
exit;
}
									/*конец блока*/
									/*создание книги*/
	if(isset($_POST["createbook"]))
	{
	echo	"<form action='menu.php' method='POST'><table>
     <theader> добовление книги </theader>
    <tr>
        <td>название книги</td>
        <td> <input type='text' name='namebook'></td>
        </tr><tr>
        <td>Автор</td>
        <td> 
        <select name='autor'> ";
        
         $sqlavtor="select id, name from avtor";
        $avtordb=mysqli_query($connect, $sqlavtor);
        while($avtor=mysqli_fetch_assoc($avtordb))
        {
        echo "<option value='".$avtor['id']."'>".$avtor['name']."</option>";
                  }
        echo "
        </select>
        </td>
        </tr><tr>
        <td>жанр</td>
        <td> <select name='janr'> ";
        
        $sqljanr="select id, janr from janr";
        $janrdb=mysqli_query($connect, $sqljanr);
        
        while($janr=mysqli_fetch_assoc($janrdb))
        {
        echo "<option value='".$janr['id']."'>".$janr['janr']."</option>";
                  }
        echo "
        </select>
        </td>
        </tr>
        <tr>
        <td>анатация</td>
        <td> <textarea name='anotacia'> </textarea></td>
        </tr>
        </table>
        <p> <input type='submit' value='сохранить книгу' >
        </p> </form>";
        exit;
	}								
																
									/*конец блока*/
    ?>
  
		<form action='menu.php' method='POST'>
		<table><thead>фунции администрирования</thead>
    <tr><td><input type='submit' value='создание автора' name='creatautor' </td></tr>
    <tr><td><input type='submit' value='создание жанра' name='createjanr'</td></tr>
    <tr><td><input type='submit' value='создание книги' name='createbook'</td></tr>
    <tr><td><input type='submit' value='отчет о взятых книгах' name='otchet'</td></tr>
     </table></centr>
</form>
<?php
if(isset($messjanradd)) echo $messjanradd ?>
<?php
if(isset($messaddbook)) echo $messaddbook?>
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
