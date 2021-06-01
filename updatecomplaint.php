<?php
include('includes/header.php');
include('security.php');


$complaint_id = $_POST['complaint_id']; 
$current_status = $_POST['current_status'];







$e_id = $_POST['e_id'];
if(isset($_POST['resolve_btn']))
{
    $statusto="resolved";
}

elseif(isset($_POST['processing_btn']))
{
    $statusto="processing";
}

elseif(isset($_POST['reset_btn']))
{
    $statusto="New";
}

$user = $_SESSION['username'];

$date = date('Y-m-d');

$query = "UPDATE complaints SET status='$statusto' WHERE complaint_id='$complaint_id' ";
$query_run = mysqli_query($connection, $query);

$query = "INSERT INTO logs (e_id,status_from,status_to,status_by,date) VALUES ('$e_id','$current_status','$statusto','$user','$date')";
$query_run = mysqli_query($connection, $query);

if($query_run)
{
    $_SESSION['success'] = "Your Data is Updated";
    header('Location: tables.php');
}
else{
    $_SESSION['success'] = "Your Data is not Updated";
    header('Location: tables.php');
}



if(isset($_POST['delete_btn']))
{
$complaint_id = $_POST['complaint_id']; 

$query = "DELETE FROM complaints WHERE complaint_id='$complaint_id' ";
$query_run = mysqli_query($connection, $query);

if($query_run)
{
    $_SESSION['success'] = "Your Data is Updated";
    header('Location: tables.php');
}
else{
    $_SESSION['success'] = "Your Data is not Updated";
    header('Location: tables.php');
}

}
