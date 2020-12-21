<?php
  session_start();
  require_once 'dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <!-- css -->
    <link href="../css/style.css" rel="stylesheet" />


</head>

<body>
    <!-- header -->
    <div class="main-header">
        <div class="header-ul">
            <nav>
                <ul>
                    <li><img src="../assets/usjr-header-logo.png"></li>
                    <li><a href="" id="isgroup">ONLINE ENROLLMENT</a></li>
                    <li><a href="" id="isgroup">ABOUT</a></li>
                    <li><a href="" id="isgroup">ADMISSIONS</a></li>
                    <li><a href="" id="isgroup">ACADEMICS</a></li>
                    <li><a href="" id="isgroup">STUDENT LIFE</a></li>
                    <li><a href="" id="isgroup">RESEARCH</a></li>
                    <li><a href="" id="isgroup">ALUMNI</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="main-body">

        <section class="login" style="text-align: center;">
            <section class="body-header-2">LOGIN</section>
            <form action="" method="get">
                <label for="uname"><b>Username</b></label>
                <br>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <br>
                <label for="psw"><b>Password</b></label>
                <br>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <br><br>

                <input type="submit" value="LOG-IN" name="login">

                <br><br>
                <span> <a href="create-users.php" id="islink" style="font-style: italic;">Don't have an account? Sign up here!</a></span>
            </form>
        </section>
    </div>
</body>
</html>

<?php 
if(isset($_GET['login'])){
    echo 'ambotwt';
    $inputUname = $_GET['uname'];
    $inputPassWord = $_GET['psw'];

    $sqlGetAcct = "SELECT * FROM users WHERE userName = ?;";
    $dbStatement = $dbconnection->prepare($sqlGetAcct);
    $dbStatement->bindParam('1', $_GET['uname'], PDO::PARAM_STR);
    $dbStatement->execute();
    $result = $dbStatement->fetch(PDO::FETCH_ASSOC);

    if(!$result){
        header("Location:".$_SERVER['HTTP_REFERER']."?loginFailed=true");
    }
    else {
          if(password_verify($inputPassWord,$result['userPass'])){
              $_SESSION['loggedUser'] = $result['userName'];  

              $sqlGetRoles = "SELECT * FROM users INNER JOIN usergroups ON users.userID = usergroups.userID INNER JOIN groupslist ON usergroups.roleID = groupslist.roleID WHERE users.userID = " . $result['userID'];
              $result2 = $dbconnection->query($sqlGetRoles);

              $cnt = 0;
              while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
                  $roles[$cnt] = $row2['roleID'];
                  $cnt++;
              }

              $isAdmin = 0;
              $isStudent = 0;
              $isFaculty = 0;
              for($i = 0; $i < sizeof($roles); $i++){
                    if($roles[$i]==0)
                        $isAdmin = 1;
                    else if ($roles[$i]==1 || $roles[$i]==2)
                        $isFaculty = 1;
                    else if ($roles[$i]==3 || $roles[$i]==4)
                        $isStudent = 1;
              }

              if($isAdmin==1)
                header("Location:http://localhost/FIS/univadmin/univhome.php");
              else if ($isFaculty==1)
                header("Location:http://localhost/FIS/faculty/facultyhome.php");
              else if ($isStudent==1)
                header("Location:http://localhost/FIS/students/studenthome.php");
          }
          else{
?>
            <script> alert("Incorrect details. Please try again."); window.history.back();</script>
<?php
          }
    }
}
?>