<?php
include_once('config.php');
   
function test_input($data) {
      
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
if ($_SERVER["REQUEST_METHOD"]== "POST") {
      
    $adminname = test_input($_POST["adminname"]);
    $password = test_input($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM adminlogin");
    $stmt->execute();
    $users = $stmt->fetchAll();
      
    foreach($users as $user) {
          
        if(($user['adminname'] == $adminname) && 
        ($user['password'] == $password)) 
        {
            if (!isset($_SESSION["username"])) {
                $_SESSION["username"] = $user['adminname'];
                header("location: adduser.php");
                exit; // prevent further execution, should there be more code that follows
            }
            
    }
    else {
        echo "<script language='javascript'>";
        echo "alert('WRONG INFORMATION')";
        echo "</script>";
        die();
    }
}
}
  
?>