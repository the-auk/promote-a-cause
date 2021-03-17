<!DOCTYPE HTML>
<html>
<body>
  <?php
landingview();
function landingView(){ ?>
<h1><a href="index.php"><?php echo "Promote-a-Cause" ?> </a></h1>
<?php
function addCauseView(){ ?>
<h2>Current Campaigns <a href="add.php">⊞</a></h2>
<?php } addCauseView();?>
<table>
<tbody>
  <tr>
    <th>Thumbs Up</th><th>Topic</th><th colspan="2">Actions</th>
  </tr>
  <?php
  if(file_exists("causes.txt")){
  $string_data = file_get_contents('causes.txt', true); # Grab the data
  if($string_data==NULL){
    ?> <b><center>"no causes exist. Add more!"</center></b><?php
  }
  else{
  $string_data = rtrim(trim($string_data), ',');
  $string_data = '[' . $string_data . ']';
  $string_data = json_decode($string_data, true); # Convert it back into a PHP Object/Array
  $thumbsup = array_column($string_data, 'likes');
  array_multisort($thumbsup, SORT_DESC, $string_data);
  foreach ($string_data as $value) {
  ?>
  <form method="POST" action="delete.php?a=delete&arg1=<?php echo $value['title']; ?>">
    <tr>
      <td style="text-align:center"><?php echo $value['likes']; ?></td>
      <td style="text-align:center" width=200px ><a href="thumbs.php?a=like&arg1=<?php echo $value['title']; ?>&arg2=<?php echo $value['description']; ?>"><?php echo $value['title']; ?></a></td>
      <td><input type="submit" value="delete" name="delete"></th>
    </tr>
  </form>
  <?php
}}}
  else{
    ?><b><center>"no causes exist. Add more!"</center></b><?php
  }}
  ?>
</body>
</html>
