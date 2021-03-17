<!DOCTYPE HTML>
<html>
<body>
  <?php
  $url = "localhost/$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $url_components = parse_url($url);
  parse_str($url_components['query'], $params);
  $title = $params['arg1'];
  $desc=$params['arg2'];
  ?>

<h1><a href="index.php">Promote-a-Cause</a></h1>
<h2><?php echo $title; ?></h2>
<p><?php echo $desc; ?></p>
<form method="POST">
<div style="margin:auto; width:1.5in; padding:0.15in;">
<input type="submit" value="Thumbs Up!" name="like" />
<input type="submit" value="Return" name="return" /></div>
</form>

<?php
if(isset($_POST['return'])){
    cancel();
}
function cancel(){
  header("Location:index.php");
  }

$url = "localhost/$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$title = $params['arg1'];
$desc=$params['arg2'];

if(isset($_POST['like'])){
  like();
}

function like(){
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
      $new_like=$value['likes']+1;
      $data = ['likes'=> $new_like,'title'=> $value['title'],'description'=> $value['description']];
      unset($string_data[$count]);
      array_push($string_data, $data);
    }
    $count++;
  }
  foreach ($string_data as $value) {
    $data = ['likes'=> $value['likes'],'title'=> $value['title'],'description'=> $value['description']];
    $data = json_encode($data). ",\n";
    file_put_contents("causes.txt",$data, FILE_APPEND | LOCK_EX);
  }
  cancel();
}

?>

</body>
</html>
