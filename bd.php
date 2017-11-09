
<?php
/* Соединяемся с базой данных */
$hostname = "localhost"; // название/путь сервера, с MySQL
$username = "ivan"; // имя пользователя (в Denwer`е по умолчанию "root")
$password = "52977377"; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
$dbName = "stp2017"; // название базы данных
$link = mysqli_connect($hostname, $username, $password) or die ("Не могу создать соединение");
mysqli_select_db($link, $dbName) or die (mysqli_error($link));


switch ($_GET['action']) {

case 'login':
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
break;

    case 'get-players':

        $query = "select code from players;";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        while($row =  mysqli_fetch_array($res)){
            echo $row['code'];
        }

    break;

    case 'get-rectangle':

        $query = "select text from rectangle where Id = '".$_GET['id']."';";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        $row =  mysqli_fetch_array($res);
        echo $row['text'];

        break;

    case 'insert-rectangle':
        $query = "INSERT INTO rectangle (text,name) VALUES('".$_GET['text'].",".$_GET['name']."');";
        echo $query ;
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        break;

        break;
    case 'insert-players':
        $query = "INSERT INTO players (code) VALUES('".$_GET['code']."');";
        echo $query ;
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        break;
    case 'delete-rectangle':
        $query = "DELETE FROM rectangle WHERE Id='".$_GET['id']."'";
        echo $query ;
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        break;
    case 'delete-players':
        $query = "DELETE FROM players WHERE Id='".$_GET['id']."'";
        echo $query ;
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        break;
    case 'insert-users':
        $query = "INSERT INTO users (username,pass) VALUES('".$_GET['username'].",".$_GET['pass']."');";
        echo $query ;
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        break;
    case 'delete-users':
        $query = "DELETE FROM users WHERE Id='".$_GET['id']."'";
        echo $query ;
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        break;

    case 'get':
        $query = "SELECT * FROM players";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        echo "<h2>payers table</h2>";
        echo "<table>";
        $i = 0;
        while ($row = mysqli_fetch_array($res)) {
            echo '<tr class="players' . $i . '" style="border: solid 1px #000"> <td> id'.$i.'<textarea id="players' . $i . '" name="text' . $i . '" value="" style="margin: 0px; width: 557px; height: 74px;" >' . $row['code'] . '</textarea></td></tr>';
            $i++;
        }
        echo "</table>";

        $query = "SELECT * FROM rectangle";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        echo "<h2>rectangle table</h2>";
        echo "<table>";
        $i = 0;
        while ($row = mysqli_fetch_array($res)) {
            echo '<tr class="rectangle' . $i . '" style="border: solid 1px #000"> <td>id' . $i . '<textarea id="rectangle' . $i . '" name="text' . $i . '" value="" style="margin: 0px; width: 557px; height: 74px;" >' . $row['text'] . '</textarea></td></tr>';
            $i++;
        }
        echo "</table>";

        $query = "SELECT * FROM users";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        echo "<h2>users table</h2>";
        echo "<table>";
        $i = 0;
        while ($row = mysqli_fetch_array($res)) {
            echo '<tr class="users' . $i . '" style="border: solid 1px #000"> <td>id' . $i . '<textarea id="users' . $i . '" name="text' . $i . '" value="" style="margin: 0px; width: 121px; height: 21px;" >' . $row['username'] . '</textarea> <textarea id="users' . $i . '" name="text' . $i . '" value="" style="margin: 0px; width: 121px; height: 21px;" >' . $row['pass'] . '</textarea> </td></tr>';
            $i++;
        }
        echo "</table>";
        break;
}

mysqli_close($link);

?>