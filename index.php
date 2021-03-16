<!DOCTYPE HTML>
<html>
<body>

<h1><a href="index.php"><?php echo "Promote-a-Cause" ?> </a></h1>

<h2>Current Campaigns <a href="add.php">⊞</a></h2>

<table>
<tbody>
  <tr>
    <th>Thumbs Up</th><th>Topic</th><th colspan="2">Actions</th>
  </tr>
  <?php
  $string_data = file_get_contents('causes.txt', true); # Grab the data
  $string_data = rtrim(trim($string_data), ',');
  $string_data = '[' . $string_data . ']';
  $string_data = json_decode($string_data); # Convert it back into a PHP Object/Array
  $temp='fail';
  foreach ($string_data as $value) {
  $temp=$value[0];
  ?>
  <tr>
      <th><?php echo $value[2]; ?></th>
      <th width=200px><a href=""><?php echo $value[0]; ?></a></th>
      <form method="POST"><th><input type="submit" value="Delete" name="delete"></th></form>
  </tr>
  <?php
    if(isset($_POST['delete'])){
      echo $temp;
    }
    }
  ?>
</body>
</html>
