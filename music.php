<?php
/* Соединяемся с базой данных */
$hostname = "localhost"; // название/путь сервера, с MySQL
$username = "ivan"; // имя пользователя (в Denwer`е по умолчанию "root")
$password = "52977377"; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
$dbName = "stp2017"; // название базы данных
/* Создаем соединение */
$link = mysqli_connect($hostname, $username, $password) or die ("Не могу создать соединение");
mysqli_select_db($link, $dbName) or die (mysqli_error($link));

$query = "select code from players;";
 $res = mysqli_query($link, $query) or die(mysqli_error($link));
 while($row =  mysqli_fetch_array($res)){
 echo $row['code'];
}
mysqli_close($link);

?>

