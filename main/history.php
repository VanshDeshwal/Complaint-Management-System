<?php 
include('includes/header.php');
include('security.php');

$un=$_SESSION['username'];

                                               
$access = $connection->prepare("SELECT `username` FROM `register` WHERE email='$un' ");
$access->execute();
$result = $access->get_result();
$value = $result->fetch_object();
$user_name = $value->username;

?>
<div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
    <div class="logo"><a href="https://www.tcil.net.in/" class="simple-text logo-normal" style="color:#fff;">
            TCIL
        </a></div>
    <div class="sidebar-wrapper">

        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="./index.php">
                    <i class="material-icons">dashboard</i>
                    <p>Create New Ticket</p>
                </a>
            </li>

            <li class="nav-item active">
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

    <a class="navbar-brand" href="javascript:void(0)">History</a>

    <?php 
        include('includes/searchbarend.php');
?>

    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">User Management Table</h4>
<!--                   <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php
                        $query = "SELECT * FROM complaints WHERE username='$user_name' ";
                        $query_run = mysqli_query($connection, $query);
                    ?>
                    <table class="table" id="dataTable" width="100%">
                    <thead class=" text-primary">
                        <tr role="row">
                            <th>Username </th>
                            <th>Itemname </th>
                            <th>Date </th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr class=" text-primary">
                                <td><?php  echo $row['username']; ?></td>
                                <td><?php  echo $row['itemname']; ?></td>
                                <td><?php  echo $row['date']; ?></td>
                                <td><?php  echo $row['status']; ?></td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Past Complaints Found";
                        }
                        ?>
                    </tbody>
                </table>
                  </div>
                </div>
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