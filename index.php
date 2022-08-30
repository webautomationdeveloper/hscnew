<?php 

include('admin/function.php');

 $_SESSION["userID"];
if(!empty($_SESSION["userID"])){
  $select = new Select();
  $user = $select->selectUserById($_SESSION["id"]);
}
else{
  header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
   
  </head>
  <body>
    <h1>Welcome <?php echo $user["Name"]; ?></h1>
    <a href="logout.php">Logout</a>

   
  </body>
</html>

    


