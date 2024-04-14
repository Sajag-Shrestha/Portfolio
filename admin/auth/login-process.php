<?php
require("../config/config.php");


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username != "" && $password != ""){
        $select = "SELECT * FROM users WHERE username = '$username' AND password = md5('$password')";
        $result = mysqli_query($con, $select);
        if ($result -> num_rows > 0){
            $data = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION['username'] = $data['username'];
            $_SESSION['email'] = $data['email'];
            header("Refresh:0; url=../dashboard.php?success");
        } else{
            header("Refresh:0; url = ../index.php?error");
        }
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"2;URL=index.php?empty\">";
    }
    
}
?>