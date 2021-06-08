<?php
include('security.php');

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    
    $username_query = "SELECT * FROM register WHERE username='$username' ";
    $username_query_run = mysqli_query($connection, $username_query);    


    if((mysqli_num_rows($email_query_run) > 0) || (mysqli_num_rows($username_query_run) > 0))
    {
        $_SESSION['status'] = "Email or username Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO register (username,email,password,usertype) VALUES ('$username','$email','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    if(isset($_POST['admin_power']))
    {
    $usertype = $_POST['admin_power'];
    }
    else{
        $usertype = "user";
    }
    $query = "UPDATE register SET username='$username', email='$email', password='$password', usertype='$usertype' WHERE e_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: register.php');
    }
    else{
        $_SESSION['success'] = "Your Data is not Updated";
        header('Location: register.php');
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];
    
    $query = "DELETE FROM register WHERE e_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        header('Location: register.php');
    }
    else{
        $_SESSION['success'] = "Your Data is not Updated";
        header('Location: register.php');
    }
}


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
        header('Location: ./vendor/login.php');
    }
}








if(isset($_POST['complaintbtn']))
{
    $username = $_POST['username'];
    $itemid = $_POST['itemid'];
    $date = date('Y-m-d H:i:s');
    $status = $_POST['status'];


     $username_query = "SELECT * FROM register WHERE username='$username' ";
     $username_query_run = mysqli_query($connection, $username_query);
     if(mysqli_num_rows($username_query_run) > 0)
     {  

        $query = "SELECT e_id FROM register WHERE username='$username' ";
        $query_run = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc($query_run))
        {
            $e_id = $row['e_id'];
        }



        $query = "INSERT INTO complaints (e_id,username,i_id,date,status) VALUES ('$e_id','$username','$itemid','$date','$status')";
        $query_run = mysqli_query($connection, $query);
        
        if($query_run)
        {
            // echo "Saved";
            $_SESSION['status'] = "Complaint Registered";
            $_SESSION['status_code'] = "success";
            header('Location: newcomplaints.php');
        }
        else 
        {
            $_SESSION['status'] = "Error! Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: newcomplaints.php');  
        }



 
     }
     else
     {
         $_SESSION['status'] = "You are not registered, please contact admin for registration";
         $_SESSION['status_code'] = "error";
         header('Location: newcomplaints.php'); 
     }

}






?>