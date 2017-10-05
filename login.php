<?php
/* Соединяемся с базой данных */
$hostname = "localhost"; // название/путь сервера, с MySQL
$username = "ivan"; // имя пользователя (в Denwer`е по умолчанию "root")
$password = "52977377"; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
$dbName = "stp2017"; // название базы данных
$table = "users";

/* Создаем соединение */
$link = mysqli_connect($hostname, $username, $password) or die ("Не могу создать соединение");
mysqli_select_db($link, $dbName) or die (mysqli_error($link));
 $login_username =  $_POST['username'];
         $login_password = $_POST['password'];
         $query = "select Id from ".$table." where username='".$login_username."' and pass='".$login_password."';";
          $res = mysqli_query($link, $query) or die(mysqli_error($link));
        if (mysqli_fetch_array($res) !== null){
             $row = mysqli_fetch_array($res);
             echo 1;
       }else
       {
       $query = "insert into users (username, pass) values ('".$login_username."','".$login_password."')";
       mysqli_query($link, $query) or die(mysqli_error($link));
       echo 2;
       }


mysqli_close($link);
?>

