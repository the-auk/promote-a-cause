<!DOCTYPE HTML>
<html>
<body>

<h1><a href="index.php">Promote-a-Cause</a></h1>

<form method = "post">
<label><b>Title:</b></label><br>
<input name="cause" type="text"><br>
<div><b><label>Description:</label></b></div>
<input type="text" name="description" style="width:2.5in;height:1in;" rows="3" cols="50" />
<div style="margin:auto; width:1.5in; padding:0.15in;">
<input type="submit" value="Save" name="submit" />
<input type="submit" value="Cancel" name="cancel">
</div>
</form>

<?php

if(isset($_POST['submit'])){
    save();
}
if(isset($_POST['cancel'])){
    cancel();
}

function save(){
    $myfile = 'causes.txt';
    $title =  $_REQUEST['cause'];
    $desc = $_REQUEST['description'];
    $likes = 0;
    $data = [0=> $title,1=> $desc,2=> $likes];
    $data = json_encode($data). ",\n";
    file_put_contents("causes.txt",$data, FILE_APPEND | LOCK_EX);

    $string_data = file_get_contents('causes.txt', true); # Grab the data
    $string_data = rtrim(trim($string_data), ',');
    $string_data = '[' . $string_data . ']';
    $string_data = json_decode($string_data); # Convert it back into a PHP Object/Array
    foreach ($string_data as $value) {
      echo "this is the title \n";
      echo $value[0];
      echo "\n";
    }
}

function cancel(){
      header("Location:index.php");
      echo "working";
}
 ?>
</body>
</html>
