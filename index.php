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
  $string_data = json_decode($string_data, true); # Convert it back into a PHP Object/Array
  foreach ($string_data as $value) {
  ?>
  <form method="POST" action="delete.php?a=delete&arg1=<?php echo $value['title']; ?>"><tr>
      <td style="text-align:center"><?php echo $value['likes']; ?></td>
      <td style="text-align:center" width=200px ><a href="thumbs.php?a=like&arg1=<?php echo $value['title']; ?>"><?php echo $value['title']; ?></a></td>
      <td><input type="submit" value="delete" name="delete"></th>
  </tr></form>
  <?php
}
  ?>
</body>
</html>
