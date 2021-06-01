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

          <li class="nav-item">
            <a class="nav-link" href="./tables.php">
              <i class="material-icons">content_paste</i>
              <p>Complaint Management</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="./register.php">
              <i class="material-icons">library_books</i>
              <p>Admin Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./newcomplaints.php">
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
<a class="navbar-brand" href="javascript:void(0)">Admin Profile</a>
<?php 
        include('includes/searchbarend.php');
?>
      <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                    Register New User 
                </button>
            </div>
          </div>

        <div class="card">
        <div class="card-header card-header-primary">
                  <h4 class="card-title ">List of Users</h4>
<!--                   <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
          <div class="card-body">

<!-- <?php
// if(isset($_SESSION['success']) && $_SESSION['success'] !='')
// {
//   echo '<h2>'.$_SESSION['success'].'</h2>'  ;
//   unset($_SESSION)['success']);
// }
// if(isset($_SESSION['status']) && $_SESSION['status'] !='')
// {
//   echo '<h2 class="bg-info"> '.$_SESSION['status'].'</h2>';
//   unset($_SESSION)['status']);
// }
// ?> -->

            <div class="table-responsive">
             <?php
                $query = "SELECT * FROM register ORDER BY e_id ";
                $query_run = mysqli_query($connection, $query);
             ?>
                <table class="table" id="dataTable" width="100%">
                    <thead class=" text-primary">
                        <tr>
                            <th> Employ-ID </th>
                            <th> Username </th>
                            <th>Email </th>
                            <th>Password</th>
                            <th>UserType</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
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
                                <td><?php  echo $row['e_id']; ?></td>
                                <td><?php  echo $row['username']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['password']; ?></td>
                                <td><?php  echo $row['usertype']; ?></td>
                                <td>
                                    <form action="register_edit.php" method="POST">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['e_id']; ?>">
                                        <button style="height:25px; padding-top:0px; padding-bottom:0px;" type="submit" class="btn btn-success" name="edit_btn"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="POST">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['e_id']; ?>">
                                        <button style="height:25px; padding-top:0px; padding-bottom:0px;" type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
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
<!-- ------------------------------------------for adding modal------------------------------------------------------ -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content card">
      <div class="modal-header card-header card-header-primary">
        <h4 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body card-body">

            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating"> Username </label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label class="bmd-label-floating">Email</label>
                <input type="email" name="email" class="form-control checking_email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label class="bmd-label-floating">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label class="bmd-label-floating">Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control">
            </div>

            <input type="hidden" name="usertype" value="user">


        </div>
        
            <button type="submit" name="registerbtn"  class="btn btn-primary pull-right">Save</button>
            <div class="clearfix"></div>
            
        
      </form>

    </div>
  </div>
</div>

<?php

include('includes/settings.php');

?>



<?php include('includes/scripts.php');
?>