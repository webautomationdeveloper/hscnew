<?php

if (isset($_REQUEST['id'])) {
  $id = base64_decode($_REQUEST['id']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parent Tutor dashboard</title>
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
      margin-bottom: 10%;
      /* 76 */
    }

    .btn-info:hover {
      color: #fff;

    }

    ul.nav li.dropdown:hover ul.dropdown-menu {
      display: block;
    }


    .menu1 {
      margin-top: 15%;
    }

    .username {
      margin-top: -24.6%;
      margin-left: 13%;
    }

    img,
    svg {
      vertical-align: middle;
      margin-bottom: -4%;
    }

    nav.navbar.navbar-expand-lg.navbar-light.d-flex.justify-content-between {
      margin-bottom: -5%;
      text-align: center;
    }

    .nav2 {
      justify-content: center;
    }

    .dropbtn {
      background: none;
      color: black;
      padding: 16px;
      font-size: 16px;
      border: none;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;

      min-width: 10px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: blue;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }


    /* @media (min-width: 992px) */
    .navbar-expand-lg .navbar-collapse {
      display: flex !important;
      flex-basis: auto;
      margin-bottom: -28px;
    }


    nav.navbar.navbar-expand-lg.navbar-light.d-flex.justify-content-between {
      /*margin-bottom: -3%;*/
      text-align: center;
    }


    /*   Dropdown Button Style */

    .dropbtn {

      color: black;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    .dropbtn:hover,
    .dropbtn:focus {
      /*background-color: #3e8e41;*/
    }

    #myInput {
      box-sizing: border-box;
      background-image: url('searchicon.png');
      background-position: 14px 12px;
      background-repeat: no-repeat;
      font-size: 16px;
      padding: 14px 20px 12px 45px;
      border: none;
      border-bottom: 1px solid #ddd;
    }

    #myInput:focus {
      outline: 3px solid #ddd;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f6f6f6;
      min-width: 230px;
      overflow: auto;
      border: 1px solid #ddd;
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown a:hover {
      background-color: lavender;
    }

    .show {
      display: block;
    }


    nav.navbar.navbar-expand-lg.navbar-light.d-flex.justify-content-between {
      /*margin-bottom: -1%;*/
      text-align: center;
    }

    .username {
      margin-top: 120px;

    }
  </style>
  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    function filterFunction() {
      var input, filter, ul, li, a, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      div = document.getElementById("myDropdown");
      a = div.getElementsByTagName("a");
      for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          a[i].style.display = "";
        } else {
          a[i].style.display = "none";
        }
      }
    }
  </script>

</head>

<body>
  <div class="container" id="mainContainer">



    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">

      <a class="navbar-brand" href="#">
        <img src="logo.png" alt="" class="img-fluid" style="height: 100px;">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse mt-3 nav1" id="navbarNav">

        <ul class="navbar-nav">
          <li class="nav-item active navMenu">
            <a class="nav-link" href="index.php?&action=home">Home</a>
          </li>



        </ul>
      </div>
      <div>

      </div>

      <div class="mt-5 d-flex justify-content-end">
        <div class="mx-4 mt-2">
          <?php
          if (isset($_SESSION['tutor'])) {
            echo $_SESSION["tutor"];
          } else if (isset($_SESSION['parent'])) {
            echo $_SESSION['parent'];
          } else if (isset($_SESSION['admin'])) {
            echo $_SESSION['admin'];
          }


          ?>
        </div>
        <a href="<?php echo $localHostUrl;?>logout.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
      </div>

    </nav>

    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between" style="margin-top: 15px;">
      <div class="username mx-4">
        <?php if (isset($_REQUEST['uname'])) {
          echo "Student Name : " . $_REQUEST['uname'];
        } ?>
      </div>
      <div class="collapse navbar-collapse nav2 mt-3">
        <ul class="navbar-nav">
          <?php if (isset($_REQUEST['id'])) {
            $id = ($_REQUEST['id']);
            $name = $_REQUEST['uname'];
          } ?>

          <!-- saprate link  -->
          <?php $_REQUEST["action"]; ?>

          <li class="nav-item navMenu menu1">
            <a class="nav-link" href="index.php?&action=dash&id=<?php echo $id; ?>&uname=<?= $name; ?>">Hsc Dashboard</a>
          </li>

          <li class="nav-item navMenu menu1">
            <a class="nav-link" href="index.php?&action=essay&id=<?php echo $id; ?>&uname=<?= $name; ?>">Essay Tracker</a>
          </li>

          <li class="nav-item navMenu menu1">
            <a class="nav-link" href="index.php?&action=roadmap&id=<?php echo $id; ?>&uname=<?= $name; ?>">Roadmap</a>
          </li>

          <li class="nav-item navMenu menu1">
            <a class="nav-link" href="index.php?&action=syllabus&id=<?php echo $id; ?>&uname=<?= $name; ?>">Syllabus Tracker</a>
          </li>

          <li class="nav-item navMenu menu1">
            <a class="nav-link" href="index.php?&action=study&id=<?php echo $id; ?>&uname=<?= $name; ?>">Study Plan</a>
          </li>

          <li class="nav-item navMenu menu1">
            <a class="nav-link" href="index.php?&action=goals&id=<?php echo $id; ?>&uname=<?= $name; ?>">Goals</a>
          </li>

        </ul>
        <div class="nav-item navMenu username"><?php //echo "Name:- ".$_SESSION["student"]
                                                ?></div>
      </div>

    </nav>

  </div>

  <script>
    function childdata() {
      console.log(childid);

    }
  </script>