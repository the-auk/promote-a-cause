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
  $url = "localhost/$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $url_components = parse_url($url);
  parse_str($url_components['query'], $params);
  $title = $params['arg1'];

  $string_data = file_get_contents('causes.txt'); # Grab the data
  $string_data = rtrim(trim($string_data), ',');
  $string_data = '[' . $string_data . ']';
  $string_data = json_decode($string_data, true); # Convert it back into a PHP Object/Array
  $count=0;
  file_put_contents("causes.txt",NULL);
  foreach ($string_data as $value) {
    if($params['arg1']==$value['title']){
      unset($string_data[$count]);
    }
    $count++;
  }
  foreach ($string_data as $value) {
    $data = ['likes'=> $value['likes'],'title'=> $value['title'],'description'=> $value['description']];
    $data = json_encode($data). ",\n";
    echo "this is the data".$data;
    file_put_contents("causes.txt",$data, FILE_APPEND | LOCK_EX);
  }
}
?>
</body>
</html>
