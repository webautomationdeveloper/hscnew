<?php

session_start();



$conn = mysqli_connect("localhost","root","","hscdb");
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

/*
let a = $('#goaluniversitycourse').val();
let b = $('#atar_range').val();
let c = $('#marktable').val();
let d = $('#ranktable').val();
let ee = $('#mark1').val();
let f = $('#mark2').val();
let g = $('#mark3').val();
let h = $('#mark4').val();
let i = $('#rank1').val();
let j = $('#rank2').val();
let k = $('#rank3').val();
let l = $('#rank4').val();
let m = $('#InternalWeighting1').val();
let n = $('#InternalWeighting2').val();
let o = $('#InternalWeighting3').val();
let p = $('#InternalWeighting4').val();
let q = $('#internalVal1').text();
let r = $('#internalVal2').text();
let s = $('#internalVal3').text();
let t = $('#internalVal4').text();
let u = $("#universitiestable").val();
let v = $("#unibonuspoints").prop('href');
let uid = <?php echo $studid; ?>;

*/

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
$u=  $mydata["u"];
$v=  $mydata["v"];
$uid = $mydata["uid"];




$stuudentID= $_SESSION["UserID"];
$qry = "SELECT * FROM goal_assessment WHERE studentID='$stuudentID' ";
$result = mysqli_query($conn,$qry);
$val = mysqli_fetch_assoc($result);
if(empty($val)){

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