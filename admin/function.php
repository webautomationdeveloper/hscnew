<?php
include(dirname(__DIR__).'../config.php');



class Register extends Connection{
public $lastID=0;
  public function registration($name, $email, $phone, $password, $confirmpassword,$type,$studentLevel){
      if($password == $confirmpassword){

        $qry = "SELECT users.Name,users.Email,users.Phone,users.Type FROM users where users.Email='$email'";
        $result = mysqli_query($this->conn, $qry);
        $row = mysqli_fetch_assoc($result);

        if($row['Email'] == $email){
          return 0;
        }else{ 
          $query = "INSERT INTO users(Name,Email,Phone, Password,Type,Status) VALUES('$name', '$email', '$phone', '$password','$type','active')";
          mysqli_query($this->conn, $query);
        }

        if($type=='student'){
          $qry = "SELECT users_id FROM users ORDER BY users_id DESC LIMIT 1";
          $lastID = mysqli_insert_id($this->conn);
          $query = "INSERT INTO student(user_id,Level_id) VALUES('$lastID', '$studentLevel')";
          mysqli_query($this->conn, $query);
        }

        return 1;
        // Registration successful
      }
      else{
        return 100;
        // Password does not match
      } 
  }
}


class UpdateUser extends Connection{

  public function updatebyID($id,$name,$email,$phone,$type,$levelID){
  $qry = "SELECT users.Name,users.Email,users.Phone,users.users_id,users.Type FROM users WHERE users_id = '$id' AND status='active'";
  $result = mysqli_query($this->conn, $qry);
  $row = mysqli_fetch_assoc($result);


  $qry = "UPDATE users SET Email='$email', name= '$name',Phone='$phone', Type='$type' WHERE users_id=$id";
  mysqli_query($this->conn, $qry);




  if($row['Type']=='student' && 'student'===$type){
    $qry = "UPDATE student SET Level_id=$levelID WHERE user_id=$id";
    mysqli_query($this->conn, $qry);
  }else {
    if($type=='student'){
      $query = "INSERT INTO student(user_id,Level_id) VALUES('$id','$levelID')";
      mysqli_query($this->conn, $query);
      }else{
        $qry ="DELETE FROM student WHERE user_id=$id";
        mysqli_query($this->conn, $qry);
      }
  }

  if($row['Type']=='student'){
    $qry ="DELETE FROM subjectassigned WHERE user_id=$id";
    mysqli_query($this->conn, $qry);
  }
    return 1;
  }


  public function disableByID($id){
    $qry = "UPDATE users SET status='disabled' WHERE users_id=$id";
    mysqli_query($this->conn, $qry);
    return 1;
  }

  public function disableLevel($id){
    // $qry = "UPDATE level SET Status='disabled' WHERE level_ID=$id";
    $qry ="DELETE FROM level WHERE level_ID=$id";

    mysqli_query($this->conn, $qry);
    return 1;
  }

  public function editLevel($val,$id){
    $qry = "UPDATE level SET level_name	=$val WHERE level_ID=$id";
    mysqli_query($this->conn, $qry);
    return 1;
  }

  public function updateSubject($val,$id){
    $qry = "UPDATE subject SET 	name='$val' WHERE subject_ID=$id";
    mysqli_query($this->conn, $qry);
    return 1;
  }

  public function disableSub($id){
    $qry = "DELETE FROM subject WHERE subject_ID=$id";
    mysqli_query($this->conn, $qry);
    return 1;
  }

}



class Login extends Connection{
  public $id;
  public $type;
  public function loginCheck($email, $password){
    $result = mysqli_query($this->conn, "SELECT users_id,Name,Email,Type FROM users WHERE Email = '$email' AND password = '$password' AND status='active'");
    $row = mysqli_fetch_assoc($result);
   
    
    if(mysqli_num_rows($result) > 0){
        $this->id = $row["users_id"];
        $this->type=$row["Type"];
        return  $row;
    }

  }

  public function idUser(){
    return $this->id;
  }
}



class ReadUserType extends Connection{
  public function readuser($type){
    $val=array();
    
    $qry = "";
    switch($type){
      case 'student':
        $qry = "SELECT users.Name,users.Email,users.Phone,users.Type,level.level_name,level.level_ID,users.users_id	FROM users join student join  level where users.users_id = student.user_id and student.Level_id=level.level_ID and users.status='active' ";
      break;
      
      case 'tutor':
        $qry = "SELECT users.Name,users.Email,users.Phone,users.users_id,users.Type FROM users WHERE Type = '$type' AND status='active'";
      break;

      case 'parent':
        $qry = "SELECT users.Name,users.Email,users.Phone,users.users_id,users.Type FROM users WHERE Type = '$type' AND status='active'";
      break;
      }

    $result = mysqli_query($this->conn, $qry );
    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
    return ($val);
  }

  public function readSubject(){
    $val=array();
    $qry = "SELECT subject_ID,name FROM `subject`;";
    // $result = mysqli_query($this->conn, "SELECT * FROM users WHERE Type = '$type' AND status='active'");
    $result = mysqli_query($this->conn, $qry );

    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
    return ($val);
  }

  public function addStudentSubjectRelation($uid,$subID){
    $query = "INSERT INTO subjectassigned(user_ID,subject_ID) VALUES('$uid','$subID')";
    mysqli_query($this->conn, $query );
    $query = "SELECT subject_ID,name from subject where subject_ID = '$subID'";
    $result = mysqli_query($this->conn, $query );
    $row=mysqli_fetch_assoc($result);
    return $row;
  }



  public function addParentStudentRelation($pid,$stuID){
    $query = "INSERT INTO studentparent(parent_ID,student_ID) VALUES('$pid','$stuID')";
    mysqli_query($this->conn, $query );
    $query = "SELECT users_id,Name from users where users_id = $stuID";
    $result = mysqli_query($this->conn, $query );
    $row=mysqli_fetch_assoc($result);
    return $row;
  }

  public function addtutorStudentRelation($tutorid,$stuID){
    $query = "INSERT INTO studenttutor(tutor_ID,student_ID) VALUES('$tutorid','$stuID')";
    mysqli_query($this->conn, $query );
    $query = "SELECT users_id,Name from users where users_id = $stuID";
    $result = mysqli_query($this->conn, $query );
    $row=mysqli_fetch_assoc($result);
    return $row;
  }

  public function getassignedSubjectList($userID){
    $qry = "SELECT name,subject_ID from subject where subject_ID IN (SELECT subject_ID from subjectassigned WHERE user_ID IN (SELECT users_id FROM users where users_id=$userID and status='active'))";
    mysqli_query($this->conn, $qry );
    $val=array();
    $result = mysqli_query($this->conn, $qry );
    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
    return ($val);
  }


  public function getParentStudentList($pid){
    $qry = "SELECT Name,users_id from users where users_id IN (  SELECT 	student_ID FROM studentparent WHERE parent_ID=$pid)";
    mysqli_query($this->conn, $qry );
    $val=array();
    $result = mysqli_query($this->conn, $qry );
    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
    return ($val);
  }

  public function gettutorStudentList($tutorid){
    $qry = "SELECT Name,users_id from users where users_id IN (  SELECT 	student_ID FROM studenttutor WHERE tutor_ID=$tutorid)";
    mysqli_query($this->conn, $qry );
    $val=array();
    $result = mysqli_query($this->conn, $qry );
    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
    return ($val);
  }





  public function removeSelectedSubject($uid,$subId){
    $qry = "DELETE FROM subjectassigned WHERE subjectassigned.user_ID=$uid and subject_ID=$subId";
    mysqli_query($this->conn, $qry );
    return 1;
  }


  public function removeSelectedStudent($student,$parentID){
    $qry = "DELETE FROM studentparent WHERE student_ID=$student";
    mysqli_query($this->conn, $qry );
    return 1;
  }

  public function removeSelectedStudentfromTutor($student,$parentID){
    $qry = "DELETE FROM studenttutor WHERE student_ID=$student";
    mysqli_query($this->conn, $qry );
    return 1;
  }
}









class Select extends Connection{
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM users WHERE users_id = '$id'");
    return mysqli_fetch_assoc($result);
  }
}



class Settings extends Connection{
  public function levels(){
    $val=array();
    $result = mysqli_query($this->conn, "SELECT * FROM `level` WHERE Status='active'");
    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
    return ($val);
  }
  
    public function subjects(){
    $val=array();
    $result = mysqli_query($this->conn, "SELECT * FROM `subject`");
    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
    return ($val);
  }
  
   public function updateSubjects($subjectname){
    $val=array();
    $result = mysqli_query($this->conn, "INSERT INTO `subject` (`subject_ID`, `name`, `Status`) VALUES (NULL, '$subjectname', 'active');");
 
  
  }
    public function updateLevel($levelname){
    $val=array();
    $result = mysqli_query($this->conn, "INSERT INTO `level` (`level_name`) VALUES ('$levelname');");
  }
  
}





class SubjectHandler extends Connection{

  public function studyPlanRead(){
    $val=array();
    $result = mysqli_query($this->conn, "SELECT * FROM `subjectattribute`");
    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
    return ($val);
  }

  public function readRoadMap(){
    $val=array();
    $result = mysqli_query($this->conn, "SELECT * FROM `roadmap_tracker`");
    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
    return ($val);
  }


  public function syllabusTracker(){
    $val=array();
    $result = mysqli_query($this->conn, "SELECT * FROM `syllabus_tracker`");
    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
    return ($val);
  }


  public function updateStudyPlan($val,$id,$type){
      if($type=="studyAction"){ 
        $qry = "UPDATE subjectattribute SET Question='$val' WHERE Q_ID=$id";
        if(mysqli_query($this->conn, $qry))
          return $val;
      }
      if($type=='essayTracker'){
        $qry = "UPDATE essay_tracker SET essay_name='$val' WHERE Q_ID=$id";
        if(mysqli_query($this->conn, $qry))
          return $val;
      }

      if($type=='roadmap'){
        $qry = "UPDATE roadmap_tracker SET Property='$val' WHERE Q_ID=$id";
        if(mysqli_query($this->conn, $qry))
          return true;
      }

  }

  public function updatesyllabus($id,$topic,$part,$syllabusPoint,$revise,$saq){
    $qry = "UPDATE syllabus_tracker SET topic='$topic',part='$part',syllabus_point='$syllabusPoint',revise='$revise',sa_question='$saq' WHERE Q_ID=$id";
        if(mysqli_query($this->conn, $qry))
          return true;
      }

    public function updateQuestionType($rowID,$val,$col){
      
      if($col=='mc'){
        $qry = "UPDATE syllabus_tracker SET mc=$val WHERE Q_ID=$rowID";
        if(mysqli_query($this->conn, $qry))
          return true;
       }
      

      if($col=='saq'){
        $qry = "UPDATE syllabus_tracker SET saq=$val WHERE Q_ID=$rowID";
        if(mysqli_query($this->conn, $qry))
          return true;
       }
      
      if($col=='essay'){
        $qry = "UPDATE syllabus_tracker SET essay=$val WHERE Q_ID=$rowID";
        if(mysqli_query($this->conn, $qry))
          return true;
       }
      
    }

    
  



  
  public function essayPlanRead(){
    $val=array();
    $result = mysqli_query($this->conn, "SELECT * FROM `essay_tracker`");
    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
    return ($val);
  }
}



class DataOfSheets extends Connection
{
  //fetch data in database table name is datasheets
  public function datasheetsread()
  {
    $arr=array();
    $qry = "SELECT * FROM `datasheet`";
    // $result = mysqli_query($this->conn, "SELECT * FROM users WHERE Type = '$type' AND status='active'");
    $result = mysqli_query($this->conn, $qry );

    while($row=mysqli_fetch_assoc($result)){
      $arr[]=$row;
    }
    return ($arr);
  }

//insert data sheets
  public function datasheetsAdd($atarrange,$universities,$bonuspointprograms,$mark,$ranksummary,$rank)
  {
    $query = "INSERT INTO datasheet(ATAR_Range,Universities,Bonus_Point_Programs,Mark,Rank_Summary,Rank_) VALUES('$atarrange', '$universities', '$bonuspointprograms', '$mark','$ranksummary','$rank')";
    $result = mysqli_query($this->conn, $query);

    return $result;
    // Registration successful
  }

  //update
  public function UpdateDataSheet($atarrange,$universities,$bonuspointprograms,$mark,$ranksummary,$rank,$id)
  {
   
    $result = mysqli_query($this->conn, "UPDATE `datasheet` SET `ATAR_Range`='$atarrange',`Universities`='$universities',`Bonus_Point_Programs`='$bonuspointprograms',`Mark`='$mark',`Rank_Summary`='$ranksummary',`Rank_`='$rank' WHERE `datasheet_id`='$id'");
  }

  //delete
  public function DeleteDataSheets($id)
  {

      $result = mysqli_query($this->conn,"DELETE from datasheet where datasheet_id='$id'");
    
  }
}

class InternalWeighting extends Connection
{
  public function interweightingdata()
  {
    $arr = array();
    $qry = mysqli_query($this->conn,"SELECT * FROM internal_weighting");
    while($row=mysqli_fetch_assoc($qry))
    {
      $arr[] = $row;
    }
    return $arr;
  }

  public function internalweightingupdate($value,$id)
  {
    $qry =mysqli_query($this->conn,"UPDATE `internal_weighting` SET `value`='$value' WHERE `iw_id` = '$id'");
    return $qry;
  }

  public function interweightingDelete($id)
  {
    $qry = mysqli_query($this->conn,"DELETE FROM `internal_weighting` WHERE `iw_id` = '$id'");
    return $qry;
  }

  public function interweightingInsert($value)
  {
    $qry = mysqli_query($this->conn,"INSERT INTO `internal_weighting`(value) VALUES($value)");
    return $qry;
  }
}