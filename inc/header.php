<?php
session_start();

include_once "Conn/sqlConnection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="inc/js/bootstrap.bundle.min.js"></script>
    <link href="inc/css/starter-template.css" rel="stylesheet">
    <link href="inc/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">
    <link rel="stylesheet" href="inc/css/templatemo.css">
    <link rel="stylesheet" href="inc/css/fontawesome.min.css">
    <link rel="stylesheet" href="inc/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    
    <title>K2S</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light shadow ">
  <a class="navbar-brand" href="crudProduit.php">
    <img src="inc/image/LOGO.png" height="50" class="d-inline-block" alt="">
    Key To Success
  </a>
  <?php

if ((empty($_SESSION['username']))){
    ?>
    <div class="container d-flex justify-content-between align-items-center">

           
<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
    <div class="flex-fill">
        <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/TP/shop.php">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
            </li>
        </ul>
    </div>
    <div class="navbar align-self-center d-flex">
        <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
            <div class="input-group">
                <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                <div class="input-group-text">
                    <i class="fa fa-fw fa-search"></i>
                </div>
            </div>
        </div>
        <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
        <i class='material-icons'>&#xe8b6;</i>
        </a>
        <a class="nav-icon position-relative text-decoration-none" href="#">
        <i class='material-icons'>&#xe8cc;</i>
            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
        </a>
        <a class="nav-icon position-relative text-decoration-none" title="Login" href="/TP/login.php">
        <i class='material-icons'>&#xe7fd;</i>

        </a>
    </div>
</div>

</div>
<?php
}
  if (!(empty($_SESSION['username']))){
    ?>
        <a href="logout.php" class="btn d-flex align-items-center" title="Logout" data-toggle="tooltip" ><i class='material-icons'>&#xe9ba;</i></a>
    
    <?php
   if ($_SESSION['username']!= "admin"){
  ?>
    <div class="container d-flex justify-content-between align-items-center">

           
<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
    <div class="flex-fill">
        <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/TP/shop.php">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
            </li>
        </ul>
    </div>
    <div class="navbar align-self-center d-flex">
        <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
            <div class="input-group">
                <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                <div class="input-group-text">
                    <i class="fa fa-fw fa-search"></i>
                </div>
            </div>
        </div>
        <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
        <i class='material-icons'>&#xe8b6;</i>
        </a>
        <a class="nav-icon position-relative text-decoration-none" href="#">
        <i class='material-icons'>&#xe8cc;</i>
            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
        </a>
        <a class="nav-icon position-relative text-decoration-none" href="#">
        <i class='material-icons'>&#xe7fd;</i>
            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
        </a>
    </div>
</div>

</div>
    

  <?php
  }
  }
  ?>
  
</nav>
