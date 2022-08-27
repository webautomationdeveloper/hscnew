<?php 
ob_start();
session_start(); 

if(!empty($_SESSION['student']) || !empty($_SESSION['admin'])){

include_once('header.php');

$type="home";

if(isset($_GET["action"])){$type=$_GET['action'];}

if($type != "home")
{
  require_once('navbar.php');
}
else
{
  require_once('home.php');
}
  

  switch($type)
  {    
    case "eco":
      require_once('dashboard.php');
    break;

    case "essay":
      require_once('../subject_1/essayTracker.php');
    break;
          
    case "study":
      require_once('../subject_1/studyTracker.php');
    break;

    case "roadmap":
      require_once('../subject_1/roadmaptracker.php');
    break;
    case "syllabus":
      require_once('../subject_1/syllabusTracker.php');
    break;
    case "goals":
      require_once('../subject_1/goals1.php');
    break;
    
    case "English":
      require_once('english_dashboard.php');
    break;
  }


include_once('footer.php');
}else{
  header("Location:../logout.php");
}
?>

<style>
  input[type="checkbox"]{
  width: 20px; /*Desired width*/
  height: 20px; /*Desired height*/
  background-color:white;
}
</style>