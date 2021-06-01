
<?php 
include('includes/header.php');
include('security.php');

?>

<div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
      <div class="logo"><a href="https://www.tcil.net.in/" class="simple-text logo-normal">
TCIL
        </a></div>
      <div class="sidebar-wrapper">
      <div class="user">
          <div class="photo">
            <img  src="./assets/img/faces/images.jpeg">
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username collapsed" aria-expanded="false">
              <span>
              <?php
          echo $_SESSION['username'];
          ?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample" style="">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./user.php">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal"> Settings </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./tables.php">
              <i class="material-icons">content_paste</i>
              <p>Complaint Management</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class="material-icons">library_books</i>
              <p>Admin Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Create New Ticket</p>
            </a>
          </li>
        </ul>


      </div>
      

      </div>

    <div class="main-panel">

    <?php 
include('includes/searchbarstart.php');
        
?>
<a class="navbar-brand" href="javascript:void(0)">Complaint Management</a>
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
                $query = "SELECT * FROM complaints";
                $query_run = mysqli_query($connection, $query);
             ?>
                  <table class="table" id="dataTable" width="100%">
                    <thead class=" text-primary">
                        <tr role="row">
                            <!-- <th> ID </th> -->
                            <th> Username </th>
                            <th>Itemname </th>
                            <th>Date </th>
                            <th>Status</th>
                            <th>Actions</th>
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
                                <!-- <td><?php  echo $row['id']; ?></td> -->
                                <td><?php  echo $row['username']; ?></td>
                                <td><?php  echo $row['itemname']; ?></td>
                                <td><?php  echo $row['date']; ?></td>
                                <td><?php  echo $row['status']; ?></td>
                                <td>
                                <form action="updatecomplaint.php" method="POST">
                                <input type="hidden" name="complaint_id" value="<?php echo $row['complaint_id']; ?>">
                                <input type="hidden" name="e_id" value="<?php echo $row['e_id']; ?>">
                                <input type="hidden" name="current_status" value="<?php echo $row['status']; ?>">
                                <button class="btn btn-link text-success btn-just-icon remove" type="submit" title="Resolved"  name="resolve_btn"><i class="material-icons">done</i></button>
                                <button class="btn btn-link text-warning btn-just-icon remove" type="submit" title="Processing" name="processing_btn"><i class="material-icons">schedule</i></button>
                                
                                <button class="btn btn-link text-danger btn-just-icon remove" type="submit" title="Reset" name="reset_btn"><i class="material-icons">close</i></button>
                                </form>
                                </td>

                                <!-- <td>
                                    <form action="updatecomplaint.php" method="POST">
                                        <input type="hidden" name="username" value="<?php echo $row['username']; ?>">
                                        <button style="height:25px; padding-top:0px; padding-bottom:0px;" type="submit" class="btn btn-success" name="update_btn"> Update</button>
                                    </form>
                                </td> -->
                                <!-- <td>
                                    <form action="register_edit.php" method="POST">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['e_id']; ?>">
                                        <button style="height:25px; padding-top:0px; padding-bottom:0px;" type="submit" class="btn btn-success" name="edit_btn"> EDIT</button>
                                    </form>
                                </td> -->

                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Complaints Found";
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
      <?php
      include('includes/footer.php');
      ?>
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>

  <?php

include('includes/settings.php');

?>

<?php 
include('includes/scripts.php');
?>
