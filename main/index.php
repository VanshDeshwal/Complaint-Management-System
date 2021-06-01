<?php 
include('includes/header.php');
include('security.php');
$un=$_SESSION['username'];

?>
<div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
    <div class="logo"><a href="https://www.tcil.net.in/" class="simple-text logo-normal" style="color:#fff;">
            TCIL
        </a></div>
    <div class="sidebar-wrapper">

        <ul class="nav">
            <li class="nav-item active  ">
                <a class="nav-link" href="./index.php">
                    <i class="material-icons">dashboard</i>
                    <p>Create New Ticket</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./history.php">
                    <i class="material-icons">content_paste</i>
                    <p>History</p>
                </a>
            </li>
        </ul>


    </div>


</div>

<div class="main-panel">
    <?php 
include('includes/searchbarstart.php');
        
?>

    <a class="navbar-brand" href="javascript:void(0)">Complaint Register</a>

    <?php 
        include('includes/searchbarend.php');
?>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <div class=" card">
                        <div class=" card-header card-header-primary">
                            <h4>Create New Ticket</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>

                        <form action="code.php" method="POST">

                            <div class="card-body">
                                <div class="row" style="margin-bottom: 15px;" >
                                    <div class="col-md-12">
                                        <div class="form-group md-form-group">

                                        <?php
                                               
                                               $access = $connection->prepare("SELECT `username` FROM `register` WHERE email='$un' ");

                                               $access->execute();
                                               $result = $access->get_result();
                                               $value = $result->fetch_object();
                                               $user_name = $value->username;

                                        ?>


                                        <label class="bmd-label-floating"> Username </label>
                                        <input type="text" name="username" value=<?php echo $user_name; ?> class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="dropdown bootstrap-select">
                                            <select name="itemid" class="btn btn-primary btn-round new-select ">
                                                <option disabled selected value="0">Select Item</option>
                                                <option value="1">CPU</option>    
                                                <option value="2">Monitor</option>
                                                <option value="3">Printer</option>
                                                <option value="4">Scanner</option>
                                                <option value="5">Keyboard</option>
                                                <option value="6">Scanner</option>
                                                <option value="7">Ethernet</option>
                                                
                                            </select>
                                        </div>
                                    </div>  
                                </div>
                                <input type="hidden" name="status" value="New">
                                <button type="submit" name="complaintbtn"
                                    class="btn btn-primary pull-right">Register</button>
                                <div class="clearfix"></div>


                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php

include('includes/settings.php');

?>



<?php

include('includes/scripts.php');

?>