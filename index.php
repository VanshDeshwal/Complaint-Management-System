<?php 
include('includes/header.php');
include('security.php');

?>
<div class="sidebar" data-color="purple" data-background-color="black" data-image="assets/img/sidebar-2.jpg">
      <div class="logo"><a href="https://www.tcil.net.in/" class="simple-text logo-normal" style="color:#fff;">TCIL</a>
      </div>
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
          <li class="nav-item active">
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
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class="material-icons">library_books</i>
              <p>Admin Profile</p>
            </a>
          </li>
          <li class="nav-item">
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

<a class="navbar-brand" href="javascript:void(0)">Dashboard</a>

<?php 
        include('includes/searchbarend.php');
?>

  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Total Users</p>
              <h3 class="card-title">
                  <?php
                  $query = "SELECT e_id FROM register ORDER BY e_id";
                  $query_run = mysqli_query($connection, $query);
                  
                  $row = mysqli_num_rows($query_run);

                  echo $row;
                  ?>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">warning</i>
                <a href="#pablo" class="warning-link"></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category" > Total Complaints </p>
              <h3 class="card-title">
              <?php
                  $query = "SELECT complaint_id FROM complaints ORDER BY complaint_id";
                  $query_run = mysqli_query($connection, $query);
                  
                  $row = mysqli_num_rows($query_run);

                  echo $row;
                  ?>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Solved Complaints</p>
              <h3 class="card-title">

              <?php
                  $query = "SELECT complaint_id FROM complaints WHERE status='resolved'";
                  $query_run = mysqli_query($connection, $query);
    
                  $row = mysqli_num_rows($query_run);

                  echo $row;
                  ?>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i>
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

</div>


<?php

include('includes/settings.php');

?>


<?php

include('includes/scripts.php');

?>