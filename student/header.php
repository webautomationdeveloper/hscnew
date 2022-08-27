<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- bar chart graph -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>

  <!-- 2 bar -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



  <style>
    .navMenu a:hover {
      color: #008021b8 !important;
    }

    .card-header {
      background-color: #008021b8 !important;
    }

    .navMenu a {
      color: #000 !important;
      font-size: 16px;
    }

    .btn-info {
      color: #000;
      background-color: #008021b8 !important;
      border-color: #008021b8 !important;
    }

    .btn-info:hover {
      color: #fff;

    }

    ul.nav li.dropdown:hover ul.dropdown-menu {
      display: block;
    }

    .nav2 {
      margin-left: 24%;
      margin-bottom: -6%;
    }

    element.style {
      background: #0080516e !important;
      padding: 10px;
      margin-top: 9%;
    }

    .nameuser {
      margin-bottom: 5%;
      margin-right: -9%;
    }
  </style>
</head>

<body>
  <div class="container" id="mainContainer">



    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between nav1">

      <a class="navbar-brand" href="#">
        <img src="logo.png" alt="" class="img-fluid" style="height: 100px;">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse mt-5" id="navbarNav">

        <ul class="navbar-nav">

          <li class="nav-item active navMenu">
            <a class="nav-link" href="index.php?&action=home">Home</a>
          </li>

          <li class="nav-item navMenu">
            <a class="nav-link" href="index.php?&action=eco">Economics</a>
          </li>



        </ul>

      </div>

      <div class="mt-5 d-flex justify-content-end">
        <div class="mx-3 mt-2">
          <?php
          if (isset($_SESSION['student'])) {
            echo "Welcome " . $_SESSION["student"];
          }
          ?>

        </div>
        <a href="../logout.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
      </div>
    </nav>



  </div>