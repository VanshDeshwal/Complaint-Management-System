<?php
include('includes/header.php');
include('security.php');

?>

<div class="main-panel">

    <?php 
include('includes/searchbarstart.php');
        
?>
    <a class="navbar-brand" href="javascript:void(0)">Edit Profile</a>
    <?php 
        include('includes/searchbarend.php');
?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class=" card">
                        <div class=" card-header card-header-primary">
                            <h4>Edit Admin Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form action="code.php" method="POST">

                            <div class=" card-body">

                                <?php

                                if(isset($_POST['edit_btn']))
                                    {
                                    $id = $_POST['edit_id'];
                            
                                    $query = "SELECT * FROM register WHERE e_id='$id' ";
                                    $query_run = mysqli_query($connection, $query);

                                    foreach($query_run as $row)
                                        {
                                ?>

                                <input type="hidden" name="edit_id" value="<?php echo $row['e_id'] ?>">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> Username </label>
                                    <input type="text" name="edit_username" class="form-control"
                                        value="<?php echo $row['username'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" name="edit_email" value="<?php echo $row['email'] ?>"
                                        class="form-control checking_email">
                                    <small class="error_email" style="color: red;"></small>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Password</label>
                                    <input type="password" name="edit_password" value="<?php echo $row['password'] ?>"
                                        class="form-control">
                                </div>
                                <!-- <div class="form-group">
                                    <label class="bmd-label-floating">Confirm Password</label>
                                    <input type="password" name="confirmpassword" class="form-control">
                                </div> -->
                                <div class="togglebutton form-group">
                                    <label>
                                        <input type="checkbox" name="admin_power" value="admin">
                                        <span class="toggle"></span>
                                        Admin
                                    </label>
                                </div>
                                <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                                <div class="clearfix"></div>

                        </form>

                                <?php
                                    }

                                }
                                ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<?php include('includes/scripts.php');
?>