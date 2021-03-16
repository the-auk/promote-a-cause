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
  $name="save the dogs";
  $string_data = file_get_contents('causes.txt', true); # Grab the data
  $filedata = file_get_contents('causes.txt', true);
  $string_data = rtrim(trim($string_data), ',');
  $string_data = '[' . $string_data . ']';
  $string_data = json_decode($string_data); # Convert it back into a PHP Object/Array
  $count=0;
  foreach ($string_data as $value) {
    if(strcmp($name, $value[0])==0)
    {
      $contents = str_replace("save the dogs", '', $filedata);
      #preg_replace($name, "", $filedata);
      file_put_contents("causes.txt",$filedata, FILE_APPEND | LOCK_EX);
    }
    $count = $count+1;
  }
}
?>
</body>
</html>
