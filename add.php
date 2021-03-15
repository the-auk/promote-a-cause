<!DOCTYPE HTML>
<html>
<body>

<h1><a href="index.php">Promote-a-Cause</a></h1>

<form method = "post">
<label><b>Title:</b></label><br>
<input name="cause" type="text"><br>
<div><b><label>Description:</label></b></div>
<textarea name="description" style="width:2.5in;height:1in;" rows="3" cols="50"></textarea>
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
    $likes = 1;

    $data = serialize(array('title' => $title, 'description' => $desc, 'likes' => $likes));
    $handle = fopen($myfile, 'a');

    if(fwrite($handle, $data) === FALSE) {
        echo "Cannot write to file ($myfile)";
        exit;
    }
}

function cancel(){
      header("Location:index.php");
      echo "working";
}
 ?>
</body>
</html>
