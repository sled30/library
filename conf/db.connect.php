<?php
//phpinfo();
$dbhost="localhost";
$dbname="id6468118_dbtest";
$dbschem="name";
$dbuser="id6468118_test";
$bdpaswd="1Xthysirf";
//echo "$dbhost, $dbuser, $$bdpaswd, $dbname";
$connect= mysqli_connect($dbhost, $dbuser, $bdpaswd, $dbname);
//echo $connect;
if(!$connect) 
{
   echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>
