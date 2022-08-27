<?php

  class Connection{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "hscdb";
    public $conn;

    public function __construct(){
      $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
    }
    
  }


// class Connection{
//   public $host = "localhost:3306";
//   public $user = "quickorm_hsc";
//   public $password = "webastral@99";
//   public $db_name = "quickorm_hsc";
//   public $conn;

//   public function __construct(){
//     $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
//   }
// }

class Dashboard extends Connection{
  
  public function readGoalData($userID){
        $qry = "SELECT * from goal_assessment where studentID=$userID";
        $result = mysqli_query($this->conn, $qry );
        $row=mysqli_fetch_assoc($result);
        return ($row);
  }

  public function dashboardData($userID,$sal_ID){
    $val=array();
    $qry = "SELECT * from userresponse where user_ID=$userID and SAL_ID=$sal_ID" ;
    $result = mysqli_query($this->conn, $qry );
    while($row=mysqli_fetch_assoc($result)){
      $val[]=$row;
    }
  
    return ($val);
}

public function essaytrackerdraftcompletedata()
{
  $arr = array();
  $result = mysqli_query($this->conn,"SELECT * FROM essay_tracker");
  while($row=mysqli_fetch_assoc($result))
  {
    $arr[] = $row;
  }
  return $arr;
}

}






  class Readactions extends Connection{
    public function essayTracker(){
        $val=array();
        $qry = "SELECT * from essay_tracker";
        $result = mysqli_query($this->conn, $qry );
        while($row=mysqli_fetch_assoc($result)){
          $val[]=$row;
        }
      
        return ($val);
      }


      public function syllabusTracker(){
        $val=array();
        $qry = "SELECT * from syllabus_tracker";
        $result = mysqli_query($this->conn, $qry );
        while($row=mysqli_fetch_assoc($result)){
          $val[]=$row;
        }
      
        return ($val);
      }


      public function roadMapTracker(){
        $val=array();
        $qry = "SELECT * from roadmap_tracker";
        $result = mysqli_query($this->conn, $qry );
        while($row=mysqli_fetch_assoc($result)){
          $val[]=$row;
        }
      
        return ($val);
      }

      public function studyplan(){
        $val=array();
        $qry = "SELECT * from subjectattribute";
        $result = mysqli_query($this->conn, $qry );
        while($row=mysqli_fetch_assoc($result)){
          $val[]=$row;
        }
      
        return ($val);
      }

      public function readUserReaponse($userID,$sal_ID){
        $val=array();
        $qry = "SELECT * from userresponse WHERE user_ID='$userID' and SAL_ID='$sal_ID'";
        $result = mysqli_query($this->conn, $qry );
        while($row=mysqli_fetch_assoc($result)){
          $val[]=$row;
        }
        return ($val);
      }
  }


  class SubjectActions extends Connection{
    public function addStudentResponse($qid,$sal_id,$sub_ID,$userID,$res){
      $qry = "SELECT * FROM userresponse WHERE 	user_ID =$userID and Q_ID='$qid' and subject_ID = '$sub_ID' and SAL_ID = $sal_id";
      $result = mysqli_fetch_assoc(mysqli_query($this->conn, $qry ));
      
     if($result>0){
      $qry = "UPDATE userresponse SET response='$res' WHERE Q_ID='$qid' and subject_ID = '$sub_ID' and SAL_ID = '$sal_id' and user_ID='$userID' ";
      if( mysqli_query($this->conn, $qry ))
      return 1;
     }else{
       $query = "INSERT INTO userresponse(Q_ID,subject_ID,SAL_ID,user_ID,response) VALUES('$qid','$sub_ID','$sal_id','$userID','$res')";
       if( mysqli_query($this->conn, $query ))
       return 2;
      }
    }
  }


  class GoalsAllData extends Connection
{
  public function goalsfetchdata()
  {
    $arr = array();
    $qry = "SELECT * FROM datasheet";
    $result = mysqli_query($this->conn,$qry);
    while($row=mysqli_fetch_assoc($result))
    {
      $arr[] = $row;
    }
    return ($arr);
  }


  public function goalsassessmentfetch()
  {
    $arr = array();
    $result = mysqli_query($this->conn,"SELECT * FROM goal_assessment");
    while($row=mysqli_fetch_assoc($result))
    {
      $arr[] = $row;
    }
    return ($arr);
  }

  public function buttonlinkuniversiti($id)
  {
    $result = mysqli_query($this->conn,"SELECT `Bonus_Point_Programs` FROM `datasheet` WHERE `Universities`='$id'");
    while($row=mysqli_fetch_assoc($result))
    {
      $arr[] = $row;
    }
    return $arr;
  }

  public function internalweightingfetch(){
    $arr = array();
      $result = mysqli_query($this->conn,"SELECT * FROM internal_weighting");
      while($row=mysqli_fetch_assoc($result))
      {
        $arr[] = $row;
      }
      return ($arr);
  }


  public function goaluniversitifetchlink()
  {
    $result = mysqli_query($this->conn,"select * from `datasheet`");
    $arr = array();
    while($row=mysqli_fetch_assoc($result))
    {
      $arr[] = $row;
    }
    return ($arr);
  }

  public function storedatagoals($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t)
  {
    $result = mysqli_query($this->conn,"INSERT INTO goal_assessment(university_course,atar,economic_marks,rank_,Mark1,Mark2,Mark3,Mark_hsc_trials,rank1,rank2,rank3,rank_hsc_trials,Internal_Weighting1,Internal_Weighting2,Internal_Weighting3,Internal_Weighting_hsc_trials,Overall_Weighting1,Overall_Weighting2,Overall_Weighting3,Overall_Weighting_hsc_trials) VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t')");
    return $result;
  }

  public function studentfetchdatabyid($studid)
  {
    $arr = array();
    $result = mysqli_query($this->conn,"SELECT * FROM `goal_assessment` WHERE studentID =$studid");
    while($row=mysqli_fetch_assoc($result))
    {
      $arr[] = $row;
    }
    return ($arr);
  }

  public function updatestudentexistdata($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$id)
  {
    $result = mysqli_query($this->conn,"UPDATE `goal_assessment` SET `university_course`='$a',`atar`='$b',`economic_marks`='$c',`rank_`='$d',`Mark1`='$e',`Mark2`='$f',`Mark3`='$g',`Mark_hsc_trials`='$h',`rank1`='$i',`rank2`='$j',`rank3`='$k',`rank_hsc_trials`='$l',`Internal_Weighting1`='$m',`Internal_Weighting2`='$n',`Internal_Weighting3`='$o',`Internal_Weighting_hsc_trials`='$p',`Overall_Weighting1`='$q',`Overall_Weighting2`='$r',`Overall_Weighting3`='$s',`Overall_Weighting_hsc_trials`='$t' WHERE studentID=$id");
    return 1;
  }
}
?>