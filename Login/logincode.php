<?php
include('./security.php');

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];
    
    
    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";
    $query_run = mysqli_query($connection, $query);

    $access = $connection->prepare("SELECT usertype FROM register WHERE email='$email_login' AND password='$password_login' limit 1");
    $access->execute();
    $result = $access->get_result();
    $value = $result->fetch_object();


    if(mysqli_fetch_array($query_run))
    {
        if($value->usertype == 'admin')
        {
            $_SESSION['username'] = $email_login;
            header('Location:./index.php');
        }
        else{
            $_SESSION['username'] = $email_login;
            header('Location:./main/index.php');

        }

    }
    else{
        $_SESSION['status'] = 'Email id / Password is invalid';
        header('Location: ./login/login.php');
    }
}

?>