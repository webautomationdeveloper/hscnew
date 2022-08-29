<?php

$conn = mysqli_connect("localhost","root","","hscdb");
$data = stripslashes(file_get_contents("php://input"));

$mydata = json_decode($data,true);
// echo "<pre>";
// print_r($mydata);
$a = $mydata["A"];

$d = $mydata["b"];

$g = $mydata["c"];

$j = $mydata["D"];

$id = $mydata["id"];
$qry = "UPDATE datasheet SET ATAR_Range='$a', Mark='$d', Rank_Summary = '$g', Rank_ = '$j' WHERE datasheet_id='$id'";
$result = mysqli_query($conn,$qry);
if($result == true)
{
    echo $result;
}
else
{
    echo "no";
}



?>