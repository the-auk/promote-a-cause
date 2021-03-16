<!DOCTYPE HTML>
<html>
<body>

<h1><a href="index.php">Promote-a-Cause</a></h1>

<p>Are you sure you want to delete the cause:</p>
<form method="post">
  <input type="text" value="title" name="title">
  <div style="margin:auto; width:1.5in; padding:0.15in;">
  <input type="submit" value="Confirm" name="confirm">
  <input type="submit" value="Cancel" name="cancel">
</form>
<?php

if(isset($_POST['confirm'])){
    confirm();
}
if(isset($_POST['cancel'])){
    cancel();
}

function cancel(){
      header("Location:index.php");
}

function confirm(){
    $myfile = "causes.txt";
    $data = file($myfile);
    foreach($data as $line) {
      $temp = unserialize($line);
      echo $temp[0];
    }
}
?>
</body>
</html>
