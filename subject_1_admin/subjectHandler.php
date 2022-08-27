<?php
require_once('../admin/function.php');
$URL = "https://quickdataautomation.com/test-env/hsc/";
// $URL = "http://localhost/hscnew/";
if(isset($_POST['value'])){
    $obj = new SubjectHandler();
    echo $obj->updateStudyPlan($_POST['value'],$_POST['actionID'],$_POST['type']);
}

if(isset($_POST['updateRoadmapRow'])){

    $val = $_POST['roadmapWeek']."|".$_POST['roadmapAction']."|".$_POST['roadmapAbout']."|".$_POST['roadmapTime'];
    $obj = new SubjectHandler();
    if($obj->updateStudyPlan($val,$_POST['roadmapRowID'],'roadmap')){
    header("Location:".$URL."admin/studyHandler/ecoSubjectDesc.php?&form=roadmap");
    }
}

if(isset($_POST['rowID'])){
    $obj = new SubjectHandler();
    if($obj->updateQuestionType($_POST['rowID'],$_POST['value'],$_POST['type'])){
        echo true;
    }else{
        echo false;
    }
}


if(isset($_POST['syllabusPointID'])){
    $obj = new SubjectHandler();
    if($obj->updatesyllabus($_POST['syllabusPointID'],$_POST['topic'],$_POST['part'],$_POST['syllabusPoint'],$_POST['revise'],$_POST['saquestion'])){
        echo"updated";
    }else{
        echo"not updated";
    }
}

 

?>