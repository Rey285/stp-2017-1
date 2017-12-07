
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
         $query = "select admin from users where username='".$login_username."' and pass='".$login_password."';";
         $table = "users";
          $res = mysqli_query($link, $query) or die(mysqli_error($link));
          $row = mysqli_fetch_array($res);
        if ($row !== null){
             if($row['admin'] == 1){
               echo 3;
             }else if($row['admin'] == 0){
               echo 1;
             }
       }else
       {
      /// $query = "insert into users (username, pass) values ('".$login_username."','".$login_password."')";
      // mysqli_query($link, $query) or die(mysqli_error($link));
       echo 2;
       }
break;
case 'reg':
         $login_username =  $_POST['username'];
         $login_password = $_POST['password'];
         $query = "insert into users (username, pass, admin) values ('".$login_username."','".$login_password."', 0)";
         mysqli_query($link, $query) or die(mysqli_error($link));
break;
    case 'get-players':

        $query = "select code from players;";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        while($row =  mysqli_fetch_array($res)){
            echo $row['code'];
        }

    break;

    case 'get-rectangle':

        $query = "select code from rectangle where Id = '".$_GET['id']."';";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        $row =  mysqli_fetch_array($res);
        echo $row['code'];

        break;


//admin section



    case 'get-admin-users':

        $query = "SELECT * FROM users";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        echo '<table id="firstTable" class="table table-sm table-inverse"><thead><tr><th>ID</th><th>username</th><th>password</th><th>Button</th></tr></thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_array($res)) {
	    echo '<tr><th scope="row" style="padding-top: 27px;">'.$row['Id'].'</th><td><input type="text" id="input_username_'.$row['Id'].'" value="'.$row['username'].'" ></td><td><input type="text" id="input_pass_'.$row['Id'].'" value="'.$row['pass'].'" ></td><td><a href="javascript:void(0);"  onclick="update_user(this);" id="'.$row['Id'].'" class="button">Update</a></td></tr>';
        }
        echo "</tbody></table>";
        break;

   case 'insert-user':
                     $query = "INSERT INTO users (username,pass) VALUES('".$_POST['username']."','".$_POST['pass']."');";
                     echo $query ;
                     $res = mysqli_query($link, $query) or die(mysqli_error($link));
                     echo "<h4>Created user</h4>";
            break;

    case 'delete-user':
              $query = "DELETE FROM users WHERE username='".$_POST['username']."'";
               echo $query ;
                $res = mysqli_query($link, $query) or die(mysqli_error($link));
               break;
    case 'update-user':
                $query = "UPDATE users SET username='".$_POST['username']."', pass='".$_POST['pass']."' WHERE Id='".$_POST['id']."';";
                echo $query ;
                $res = mysqli_query($link, $query) or die(mysqli_error($link));
         break;



    case 'get-admin-rectangle':

                 $query = "SELECT * FROM rectangle";
                 $res = mysqli_query($link, $query) or die(mysqli_error($link));
                 echo '<table id="firstTable2" class="table table-sm table-inverse"><thead><tr><th>ID</th><th>name</th><th>text</th><th>image_path</th><th>Button</th></tr></thead>';
                 echo '<tbody>';

                 while ($row = mysqli_fetch_array($res)) {
         	    echo '<tr><th scope="row" style="padding-top: 27px;">'.$row['Id'].'</th><td><input type="text" id="input_name_rectangle_'.$row['Id'].'" value="'.$row['name'].'" ></td><td><input type="text" id="input_text_'.$row['Id'].'" value="'.$row['text'].'" ></td><td><input type="text" id="input_image_path_'.$row['Id'].'" value="'.$row['image_path'].'" ></td><td><a href="javascript:void(0);"  onclick="update_rectangle(this);" id="'.$row['Id'].'" class="button">Update</a></td></tr>';
                 }
                 echo "</tbody></table>";
                 break;

      case 'insert-rectangle':

                               $code='<div class="col-md-4 text-center"> <div class="service-item item1"><i class="service-icon fa fa-music fa-3x"></i><h3>'.$_POST['name'].'</h3> <p>'.$_POST['text'].'</p> <img class="horizontal" src="'.$_POST['image_path'].'" width="300" height="400" alt="placeholder">   </div></div>';

                              $query = "INSERT INTO rectangle (code,name,text,image_path) VALUES('".$code."','".$_POST['name']."','".$_POST['text']."','".$_POST['image_path']."');";
                              echo $query ;
                              $res = mysqli_query($link, $query) or die(mysqli_error($link));
                              echo "<h4>Created user</h4>";
                     break;

      case 'delete-rectangle':
                 $query = "DELETE FROM rectangle WHERE name='".$_POST['name']."'";
                 echo $query ;
                 $res = mysqli_query($link, $query) or die(mysqli_error($link));
                 break;
     case 'update-rectangle':
                         $code='<div class="col-md-4 text-center"> <div class="service-item item1"><i class="service-icon fa fa-music fa-3x"></i><h3>'.$_POST['name'].'</h3> <p>'.$_POST['text'].'</p> <img class="horizontal" src="'.$_POST['image_path'].'" width="300" height="400" alt="placeholder">   </div></div>';
                         $query = "UPDATE rectangle SET code='".$code."', name='".$_POST['name']."', text='".$_POST['text']."', image_path='".$_POST['image_path']."' WHERE Id='".$_POST['id']."';";
                         echo $query ;
                         $res = mysqli_query($link, $query) or die(mysqli_error($link));
                  break;





       case 'get-admin-players':

              $query = "SELECT * FROM players";
              $res = mysqli_query($link, $query) or die(mysqli_error($link));
              echo '<table id="firstTable3" class="table table-sm table-inverse"><thead><tr><th>ID</th><th>name</th><th>path</th><th>Button</th></tr></thead>';
              echo '<tbody>';

              while ($row = mysqli_fetch_array($res)) {
      	    echo '<tr><th scope="row" style="padding-top: 27px;">'.$row['Id'].'</th><td><input type="text" id="input_name_'.$row['Id'].'" value="'.$row['name'].'" ></td><td><input type="text" id="input_path_'.$row['Id'].'" value="'.$row['path'].'" ></td><td><a href="javascript:void(0);"  onclick="update_players(this);" id="'.$row['Id'].'" class="button">Update</a></td></tr>';
              }
              echo "</tbody></table>";
              break;

       case 'insert-players':
//Perturbator - Naked Tongues (ft. Memory Ghost's Isabella Goloversic)
  //              <div><audio src="music/Perturbator1.mp3" controls></audio></div>
              $code = $_POST['name'].'<div><audio src="'.$_POST['path'].'" controls></audio></div>';
              $query = "INSERT INTO players (name,path,code) VALUES('".$_POST['name']."','".$_POST['path']."','".$code."');";
              echo $query ;
              $res = mysqli_query($link, $query) or die(mysqli_error($link));
              echo "<h4>Created user</h4>";
                  break;

       case 'delete-players':
              $query = "DELETE FROM players WHERE name='".$_POST['name']."'";
              echo $query ;
              $res = mysqli_query($link, $query) or die(mysqli_error($link));
              break;

       case 'update-players':
                      $code = $_POST['name'].'<div><audio src="'.$_POST['path'].'" controls></audio></div>';
                     $query = "UPDATE players SET name='".$_POST['name']."', path='".$_POST['path']."',  code='".$code."' WHERE Id='".$_POST['id']."';";
                      echo $query ;
                      $res = mysqli_query($link, $query) or die(mysqli_error($link));
        break;


}

mysqli_close($link);

?>