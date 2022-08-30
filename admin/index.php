<?php

ob_start();
session_start(); 
//error_reporting(0);


if(!empty($_SESSION['admin'])){
  require("function.php");
  require('header.php'); 
  require('sidebar.php'); 
  $readUser = new  ReadUserType();
  $studentData = $readUser->readuser("student");
  $subject = $readUser->readSubject();
  
  $level = new  Settings();
  $levelData = $level->levels();  
  $type="index";
  if(isset($_GET["user"])){$type=$_GET['user'];}

    if(isset($_POST["addUser"])){
      $addUser =new Register();
      $retval=$addUser->registration($_POST['username'],$_POST['userEmail'],$_POST['userPhone'],$_POST['password'],$_POST['confirmPassword'],$_POST['type'],$_POST['studentLevel']);
      $type = $_POST['type'];    
      if($retval==0){
        echo '<script>alert("E-mail ID already exists");</script>';
        $type = 'addnew';    

      }
   
      


   
      if($retval==1){
        echo '<script>alert("Record added Successfully");</script>'; 
        header("location:".$localHostUrl."admin/index.php?&user=".$type);  

      }


    }
  

  switch($type)
  {    
    case "index":
      require_once('dashboard.php');
    break;

    case "student":
      require_once('student.php');
    break;

    case "parent":
      require_once('parent.php');
    break;
          
    case "tutor":
      require_once('tutor.php');
    break;

    case "addnew":
      require_once('adduser.php');
    break; 

    case "level":
      require_once('levels.php');
    break;	

    case "subject":
      require_once('subject.php');
    break;	

    case "eco":
      require_once('subject_1_admin/ecoStudyplan.php');
    break;

    case "goaldata":
      require_once('datasheet.php');
      break;

    case "interweighting":
      require_once('interweighting.php');
      break;
}
#require_once('footer.php') 
}else{
header("Location:../logout.php");
}
?>   