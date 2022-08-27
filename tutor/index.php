<?php
session_start(); 
if(!@empty($_SESSION['tutor']))
{
  $userid = $_SESSION['UserID'];
  include_once('functions.php');
  $type = "home";

  if(isset($_GET["action"]))
  {
    $type=$_GET['action'];
  }
  if($type != "home" && $type != "dash"){
    require_once('../parent/header.php');
  }
  switch($type)
  { 
    case "home":
      require_once('tutorstudent_home.php');
    break;
    case "dash":
      require_once('tutor_dash.php');
    break;
    case "essay":
      
      require_once('../subject_1/essayTracker.php');
    break;
    case "roadmap":
      require_once('../subject_1/roadmaptracker.php');
    break;
    case "syllabus":
      require_once('../subject_1/syllabusTracker.php');
    break;
    case "study":
      require_once('../subject_1/studyTracker.php');
    break;
    case "goals":
      require_once('../subject_1/goals1.php');
    break;
    case "default":
      header("location:../logout.php");
    break;
  }

}
else
{
  header("Location:../logout.php");
}
?>
