<?php
   $obj = new ParentChildDetails();
   $studentalldata = $obj -> ParentChild($userid);
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Parent dashboard</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <style>
         .navMenu a:hover{
         color:#008021b8 !important;
         }
         .card-header{
         background-color:#008021b8 !important;
         }
         .navMenu a{
         color:#000 !important;
         font-size:16px;
         }
         .btn-info {
         color: #000;
         background-color: #008021b8 !important;
         border-color: #008021b8 !important;
         }
         .btn-info:hover {
         color: #fff;
         }
         ul.nav li.dropdown:hover ul.dropdown-menu{ display: block; }
         .mb-3 {
         margin-bottom: 1rem!important;
         width: 80%;
         margin: 0 auto;
         margin-top: -7%;
         }
         /*   Dropdown Button START  FROM HERE   */
         .dropbtn {
         color: black;
         padding: 16px;
         font-size: 16px;
         border: none;
         cursor: pointer;
         }
         .dropbtn:hover, .dropbtn:focus {
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
         width: 296px;
         }
         #myInput:focus {outline: 3px solid #ddd;}
         .dropdown {
         position: relative;
         display: inline-block;
         }
         .dropdown-content {
         display: none;
         position: absolute;
         background-color: #f6f6f6;
         min-width: 315px;
         height:300px;
         overflow: scroll;
         border: 1px solid #ddd;
         z-index: 1;
         }
         .dropdown-content a {
         color: black;
         padding: 12px 16px;
         text-decoration: none;
         display: block;
         }
         td{
          text-align:center;
         }
         .dropdown a:hover { background-color:lavender;}
         .show {display: block;}
         /* Dropdown CSS END */


         /* left side user name show css */
         .nameuser{
            margin-top: -42px;
            margin-right: -95px;
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
            <img src="logo.png" alt=""class="img-fluid" style="height: 100px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mt-5" id="navbarNav">
               <ul class="navbar-nav">
                  <li class="nav-item active navMenu">
                     <a class="nav-link" href="index.php?&action=home">HSC Parent Dashboard</a>
                  </li>
               </ul>
            </div>
            
            <div class ="mt-5">
               <a href="../logout.php" class="btn btn-info btn-lg">
               <span class="glyphicon glyphicon-log-out"></span> Log out
               </a>
            </div>
         </nav>
      </div>
      <?php 
         //  parent child details
         $id = $_SESSION['UserID'];
           $obj = new ParentChildDetails();
           $data = $obj->ParentChild($id);
         // print_r($data);
         $action = "essay"; 
         ?>      
      <div class="clearfix " style="height:180px;margin-top:-50px;margin-left:10%;">
         <!-- Header Dropdown Start From Here  -->
         <div class="dropdown mt-5">
            <div id="myDropdown" class="dropdown-content">
               <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
               <?php foreach($data as $item){ ?>
               <a href="index.php?&action=<?= $action;?>&id=<?php echo $item['users_id'];?>"><?php echo $item['Name']?><br/>( <?php echo $item['Email']?>)</a>
               <?php } ?>
            </div>
         </div>
         <!-- Header Dropdown End From Here  -->
      </div>
      <div class="app-main__inner">
         <div class="row">
            <div class="col-md-12">
               <div class="main-card mb-3 card">
                  <div class="card-header">
                     Students
                     <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                        </div>
                     </div>
                  </div>
                  <p id="demo"></p>
                  <div class="table-responsive">
                     <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                           <tr>
                              <th class="text-center">Name</th>
                              <th class="text-center">Email ID</th>
                              <th class="text-center">Phone</th>
                              <th class="text-center">Action</th>
                           </tr>
                        </thead>
                        <tbody id="Student_AllDetails">
                           <?php foreach($data as $item){ ?>
                           <tr>
                              <td> 
                                 <a href="index.php?&action=<?=$action;?>&id=<?php echo $item['users_id'];?>&uname=<?php echo $item['Name'];?>"><?php echo $item['Name'];?></a>
                              </td>
                              <td> 
                                 <?php echo $item['Email'];?>
                              </td>
                              <td> 
                                <?php echo $item['Phone'];?>
                              </td>
                              <td>
                              <a href="index.php?&action=<?= $action;?>&id=<?php echo $item['users_id'];?>&uname=<?php echo $item["Name"]?>"><button class="btn btn-success">View</button></a>
                              </td>
                           </tr>
                           <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- Modal -->
   </body>
</html>
<script></script>