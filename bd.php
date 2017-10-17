
 <?php
 /* Соединяемся с базой данных */
 $hostname = "localhost"; // название/путь сервера, с MySQL
 $username = "ivan"; // имя пользователя (в Denwer`е по умолчанию "root")
 $password = "52977377"; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
 $dbName = "stp2017"; // название базы данных
 $link = mysqli_connect($hostname, $username, $password) or die ("Не могу создать соединение");
 mysqli_select_db($link, $dbName) or die (mysqli_error($link));

 $query = "SELECT * FROM players";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        echo "<h2>payers table</h2>";
        echo "<table>";
        $i = 0;
        while ($row = mysqli_fetch_array($res)) {
             echo '<tr class="players' . $i . '" style="border: solid 1px #000"> <td><textarea id="players' . $i . '" name="text' . $i . '" value="" style="margin: 0px; width: 557px; height: 74px;" >' . $row['code'] . '</textarea></td></tr>';
        $i++;
        }
        echo "</table>";

  $query = "SELECT * FROM rectangle";
          $res = mysqli_query($link, $query) or die(mysqli_error($link));
          echo "<h2>rectangle table</h2>";
          echo "<table>";
          $i = 0;
          while ($row = mysqli_fetch_array($res)) {
               echo '<tr class="rectangle' . $i . '" style="border: solid 1px #000"> <td><textarea id="rectangle' . $i . '" name="text' . $i . '" value="" style="margin: 0px; width: 557px; height: 74px;" >' . $row['text'] . '</textarea></td></tr>';
          $i++;
          }
          echo "</table>";

   $query = "SELECT * FROM users";
           $res = mysqli_query($link, $query) or die(mysqli_error($link));
           echo "<h2>users table</h2>";
           echo "<table>";
           $i = 0;
           while ($row = mysqli_fetch_array($res)) {
                echo '<tr class="users' . $i . '" style="border: solid 1px #000"> <td><textarea id="users' . $i . '" name="text' . $i . '" value="" style="margin: 0px; width: 121px; height: 21px;" >' . $row['username'] . '</textarea></td></tr>';
           $i++;
           }
           echo "</table>";




mysqli_close($link);

?>