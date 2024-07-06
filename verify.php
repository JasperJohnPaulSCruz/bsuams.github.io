<?php 
session_start();
require('connect.php');

if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

    $sql = "SELECT * FROM user_acount WHERE email = '$email' AND password = '$password' limit 1";
    $result=$conn->query($sql);
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            if($password === $row['password'] && $email === $row['email']){

                $_SESSION['name'] = $row['name'];
                $_SESSION['loggedin'] = "true";

                if($row['admin'] === 'Y'){
                    $_SESSION['role'] = "Admin";
                }else{
                    $_SESSION['role'] = "Faculty";
                }

                header("Location: home");
                exit;
            }else {
                header('Location: login.php?error=1');
                exit;
            }
        }
        
    } else {
        header('Location: login.php?error=1');
        exit;
    }
}
$conn->close();
?>