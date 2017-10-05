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

switch ($_GET['action']) {
    case get:

        $query = "SELECT * FROM $table";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        $i = 0;
        while ($row = mysqli_fetch_array($res)) {
            echo '<tr class="res' . $i . '" style="border: solid 1px #000"> <td value="'. $row['Переменная'] .'"id="vare' . $i .'" name="vare' . $i . '">' . $row['Переменная'] . '</td> <td><input id="vale' . $i . '" name="vale' . $i . '" value="' . $row['Значение'] . '" type="text"></td></tr>';
            $i++;
        }

        break;

    case post:

         $login_username =  $_POST['username'];
         $login_password = $_POST['password'];
         $query = "select Id from ".$table." where username='".$login_username."' and pass='".$login_password."';";
        // echo $query;
         $res = mysqli_query($link, $query) or die(mysqli_error($link));
         while ($row = mysqli_fetch_array($res)) {

         if( $row['Id'] > 0){
         echo "ok";
         }else
         {
         echo "you are not registered";
         }

         }

        break;

}

mysqli_close($link);
?>

