<?php session_start(); ?>
<?php require("../admin/function.php");?>
<?php require_once('../admin/header.php') ?>
<?php require_once('../admin/sidebar.php') ?> 


<style>
             
 

            
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content12 {
  background-color: #fefefe;
  margin: 15% 32%; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 54%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.btn12{
    color:white;
    background:#52B760;
    padding:5px;
    border-radius:5px;
    outline:none;
    border:0px;
}
            </style>

<?php

$type="";
if(isset($_GET["form"])){$type=$_GET['form'];}
require_once('ecoStudyplan.php');





switch($type){
    case 'study':
        require_once('studyAction.php');
        break;
    case 'essay':
        require_once('essayTracker.php');
        break;
    case 'roadmap':
        require_once('roadmap.php');
        break;
    case 'syllabus':
        require_once('SyllabusTracker.php');
        break;
}




 ?>  


 