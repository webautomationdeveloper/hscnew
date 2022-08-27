<?php 
require_once('../student/functions.php');

if(!empty($_POST['res'])){
    $obj = new SubjectActions();
    $val=$obj->addStudentResponse($_POST['qid'],$_POST['sal_id'],$_POST['sub_ID'],$_POST['userID'],$_POST['res']);
    echo $val;
}

?>