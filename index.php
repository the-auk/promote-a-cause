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
  foreach ($string_data as $key => $value) {
  $temp=$value[0];
  ?>
  <tr>
      <td style="text-align:center"><?php echo $value[2]; ?></td>
      <td style="text-align:center" width=200px ><a href=""><?php echo $temp; ?></a></td>
      <form method="POST"><td><input type="submit" value="delete" name="delete"></th></form>
  </tr>

  <?php
}
    if(isset($_POST['delete'])){
      echo "title";
    }
  ?>
</body>
</html>
