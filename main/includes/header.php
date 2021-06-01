<!DOCTYPE html>
<html lang="en">
<?php
$themeStyleSheet = 'assets/css/light/material-dashboard.css?v=2.1.2';
if (!empty($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark') {
  $themeStyleSheet = 'assets/css/dark/material-dashboard.css?v=2.1.0';
}
?>

<head>
  <meta charset="utf-8" />
  <link r el="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Complaint Management
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo $themeStyleSheet; ?>" rel="stylesheet" id="theme-link" />
  <link rel="stylesheet" href="assets/css/dark/custom.css"  id="theme-link" />
</head>

<body class="dark-edition">

  <div class="wrapper ">