<?php
session_start();
include('database/dbconfig.php');

if($connection)
{
    //echo "Database Connected";
}
else
{
    header("Location: database/dbconfig.php");
}









if(isset($_POST['complaintbtn']))
{
    $username = $_POST['username'];
    $itemid = $_POST['itemid'];
    $date = date('Y-m-d H:i:s');
    $status = $_POST['status'];

    $access = $connection->prepare("SELECT `i_name` FROM `item-list` WHERE i_id=? ");
    $access->bind_param('i', $itemid);
    $access->execute();
    $result = $access->get_result();
    $value = $result->fetch_object();
    $item_name = $value->i_name;

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



        $query = "INSERT INTO complaints (e_id,username,i_id,itemname,date,status) VALUES ('$e_id','$username','$itemid','$item_name','$date','$status')";
        $query_run = mysqli_query($connection, $query);
        
        if($query_run)
        {
            // echo "Saved";
            $_SESSION['status'] = "Complaint Registered";
            $_SESSION['status_code'] = "success";
            header('Location: index.php');
        }
        else 
        {
            $_SESSION['status'] = "Error! Please try again";
            $_SESSION['status_code'] = "error";
            header('Location: index.php');  
        }



 
     }
     else
     {
         $_SESSION['status'] = "You are not registered, please contact admin for registration";
         $_SESSION['status_code'] = "error";
         header('Location: index.php'); 
     }

}




?>