<?php
ob_start();
require('function.php');
// $URL = "https://quickdataautomation.com/test-env/hsc/main.php?&user=";
$URL = "index.php?&user=";


if(isset($_POST["updatestudent"])){
 $obj = new UpdateUser;
 $val=$obj->updatebyID($_POST['studentID'],$_POST['studentName'],$_POST['studentEmail'],$_POST['studentPhone'],$_POST['type'],$_POST['studentLevel']);
 header("Location:".$URL.$_POST['type']);
}

if(isset($_POST["updatelevel"])){
  $obj = new UpdateUser;
  $val=$obj->editLevel($_POST['levelName'],$_POST['levelupdateID']);
  header("Location:".$URL."level");
}




if(isset($_POST["updatetutor"])){

  $obj = new UpdateUser;
$val=$obj->updatebyID($_POST['tutorID'],$_POST['tutorName'],$_POST['tutorEmail'],$_POST['tutorPhone'],$_POST['type'],$_POST['studentLevel']);
header("Location:".$URL.$_POST['type']);
}


if(isset($_POST["updatesubject"])){
  $obj = new UpdateUser;
  $val=$obj->updateSubject($_POST['subjectName'],$_POST['subjectID']);
 header("Location:".$URL."subject");

  
}


if(isset($_POST["subjID"])){
  $obj = new UpdateUser;
  $obj->disableSub($_POST['subjID']);
 header("Location:".$URL."subject");

  
}

if(isset($_POST["updateparent"])){
  $obj = new UpdateUser;
  $val=$obj->updatebyID($_POST['parentID'],$_POST['parentName'],$_POST['parentEmail'],$_POST['parentPhone'],$_POST['type'],$_POST['studentLevel']);
header("Location:".$URL.$_POST['type']);
 
  
}


if(isset($_POST['delID'])){
  $id = $_POST['delID'];
  $obj = new UpdateUser();
  $val= $obj->disableByID($id);
 header("Location:".$URL."student");
}


if(isset($_POST['levelID'])){
  $id = $_POST['levelID'];
  $obj = new UpdateUser();
  $obj->disableLevel($id);
 header("Location:".$URL."level");
}


if(isset($_POST['levelID_enable'])){
  $id = $_POST['levelID_enable'];
  $obj = new UpdateUser();
  $obj->disableLevel($id);
 header("Location:".$URL."level");
}




if(isset($_POST['userID'])){
  $id = $_POST['userID'];
  $subject = $_POST['subID'];
  $obj = new ReadUserType();
  echo json_encode( $obj->addStudentSubjectRelation($id,$subject));
}

if(isset($_POST['parenID'])){
  $pid = $_POST['parenID'];
  $stuID = $_POST['studentID'];
  $obj = new ReadUserType();
  echo json_encode( $obj->addParentStudentRelation($pid,$stuID));
}

if(isset($_POST['tutorID'])){
  $tutorid = $_POST['tutorID'];
  $stuID = $_POST['studentID'];
  $obj = new ReadUserType();
  echo json_encode( $obj->addtutorStudentRelation($tutorid,$stuID));
}





if(isset($_POST['uid'])){
  $id = $_POST['uid'];
  $obj = new ReadUserType();
  echo json_encode( $obj->getassignedSubjectList($id));
}

if(isset($_POST['pid'])){
  $id = $_POST['pid'];
  $obj = new ReadUserType();
  echo json_encode( $obj->getParentStudentList($id));
}


if(isset($_POST['tutor1'])){
  $id = $_POST['tutor1'];
  $obj = new ReadUserType();
  echo json_encode( $obj->gettutorStudentList($id));
}


if(isset($_POST['usrID'])){
  $id = $_POST['usrID'];
  $subject = $_POST['subID'];
  $obj = new ReadUserType();
  $obj->removeSelectedSubject($id,$subject);
}



if(isset($_POST['stuID'])){
 
  $student = $_POST['stuID'];
  $parentID = $_POST['parentID'];
  $obj = new ReadUserType();
  $obj->removeSelectedStudent($student,$parentID);
}


if(isset($_POST['tutID'])){
  $student = $_POST['stuID'];
  $tutor = $_POST['tutID'];
  $obj = new ReadUserType();
  $obj->removeSelectedStudentfromTutor($student,$tutor);
}


if(isset($_POST["updatedatasheet-btn"]))
{
  $obj = new DataOfSheets();
  $atar_range = $_POST["atarrange"];
  $universities = $_POST["universities"];
  $bonuspointprograms = $_POST["bonuspointprograms"];
  $mark = $_POST["mark"];
  $ranksummary = $_POST["rankrummary"];
  $rank = $_POST["rank"];
  $id = $_POST["datasheetsID"];
  $result = $obj->UpdateDataSheet($atar_range,$universities,$bonuspointprograms,$mark,$ranksummary,$rank,$id);
  header("location:index.php?&user=goaldata");
}


if(isset($_POST["id"]))
{
  $id = $_POST["id"];
  $obj = new DataOfSheets();
  $result = $obj->DeleteDataSheets($id);
  //header("location:index.php?&user=goaldata");
}

if(isset($_POST["btn-add"]))
{
  $atar_range = $_POST["atar_range"];
  $universities =$_POST["universities"];
  $bonuspointprograms =$_POST["bonuspointprograms"];
  $mark = $_POST["mark"];
  $rankrummary = $_POST["rankrummary"];
  $rank = $_POST["rank"];
  $obj = new DataOfSheets();
  $result = $obj->datasheetsAdd($universities,$bonuspointprograms);
  // echo "<script>window.location.href='index.php?&user=goaldata'</script>";
  header('location:index.php?&user=goaldata');
}


if(isset($_POST["updatewighting"]))
{
  $obj = new InternalWeighting();
  $value = $_POST["interweightingname"];
  $id = $_POST["interweighitngID"];
  $result = $obj->internalweightingupdate($value,$id);
  echo $result;
  header("location:index.php?&user=interweighting");
}

if(isset($_POST["DID"]))
{
    $id = $_POST["DID"];
    echo $id;
    $obj = new InternalWeighting();
    $result = $obj->interweightingDelete($id);
    header("location:index.php?&user=interweighting");
}

?>