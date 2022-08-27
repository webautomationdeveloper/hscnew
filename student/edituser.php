<?php

session_start();



$conn = mysqli_connect("localhost","root","","hscdb");
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);



$a = $mydata["a"];
$b = $mydata["b"];
$c = $mydata["c"];
$d = $mydata["d"];
$e = $mydata["e"];
$f = $mydata["f"];
$g = $mydata["g"];
$h = $mydata["h"];
$i = $mydata["i"];
$j = $mydata["j"];
$k = $mydata["k"];
$l = $mydata["l"];
$m = $mydata["m"];
$n = $mydata["n"];
$o = $mydata["o"];
$p = $mydata["p"];
$q = $mydata["q"];
$r = $mydata["r"];
$s = $mydata["s"];
$t = $mydata["t"];
$u= $mydata["u"];
$v=$mydata["v"];
$uid = $mydata["uid"];

// $id = $_SESSION["UserID"];
// if(isset($a) == "" || isset($b) == "" || isset($c) == "Open this select Goal HSC Economics Mark" || isset($d) == "Open this select Goal Rank" || isset($e) == "Select Mark" || isset($f) == "Select Mark" || isset($g) == "Select Mark" || isset($h) == "Select Mark" || isset($i) == "Select Rank" || isset($j) == "Select Rank" || isset($k) == "Select Rank" || isset($l) == "Select Rank" || isset($m) == "0" || isset($n) == "0" || isset($o) == "0" || isset($p) == "0" || isset($q) == "0" || isset($r) == "0" || isset($s) == "0" || isset($t) == "0")
// {
//     header("location:index.php?&action=goals");
// }s


$stuudentID= $_SESSION["UserID"];

$qry = "SELECT * FROM goal_assessment WHERE studentID='$stuudentID' ";
$result = mysqli_query($conn,$qry);
$val = mysqli_fetch_assoc($result);
if(empty($val)){

$qry = "INSERT INTO goal_assessment(university_course,atar,economic_marks,rank_,Mark1,Mark2,Mark3,Mark_hsc_trials,rank1,rank2,rank3,rank_hsc_trials,Internal_Weighting1,Internal_Weighting2,Internal_Weighting3,Internal_Weighting_hsc_trials,Overall_Weighting1,Overall_Weighting2,Overall_Weighting3,Overall_Weighting_hsc_trials,studentID) 
 VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$stuudentID','$u')";


$result = mysqli_query($conn,$qry);
if($result == true)
{
    echo $result;
}
else
{
    echo "no";
}
}else{
    $qry = "UPDATE goal_assessment SET `university_course` = '$a',
                                        `atar`='$b',
                                       `economic_marks`='$c',
                                       `rank_`='$d',
                                       `Mark1`='$e',
                                       `Mark2`='$f',
                                       `Mark3`='$g',
                                       `Mark_hsc_trials`='$h',
                                       `rank1` ='$i',
                                       `rank2` ='$j',
                                       `rank3`='$k',
                                       `rank_hsc_trials`='$l',
                                       `Internal_Weighting1`=$m,
                                       `Internal_Weighting2`='$n',
                                       `Internal_Weighting3`='$o',
                                       `Internal_Weighting_hsc_trials`='$p',
                                       `Overall_Weighting1`='$q',
                                       `Overall_Weighting2`='$r',
                                       `Overall_Weighting3`='$s',
                                       `Overall_Weighting_hsc_trials`='$t',
                                       `studentID`=$stuudentID,
                                       `goal_University`='$u'
                                        WHERE studentID = '$stuudentID'" ;

$qry = "INSERT INTO goal_assessment(university_course,atar,economic_marks,rank_,Mark1,Mark2,Mark3,Mark_hsc_trials,rank1,rank2,rank3,rank_hsc_trials,Internal_Weighting1,Internal_Weighting2,Internal_Weighting3,Internal_Weighting_hsc_trials,Overall_Weighting1,Overall_Weighting2,Overall_Weighting3,Overall_Weighting_hsc_trials,studentID) VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$uid')";
$result = mysqli_query($conn,$qry);
if($result == true)
{
    echo $result;
}
else
{
    echo "no";
}



                                                               
}



?>