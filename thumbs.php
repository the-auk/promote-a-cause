<!DOCTYPE HTML>
<html>
<body>

<h1><a href="index.php">Promote-a-Cause</a></h1>
<?php
$url = "localhost/$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$title = $params['arg1'];
?>
<h2><?php $title ?>!</h2>
<p>Would you rather find inspiration in cooking, your family, and your pet or in cooking your family and your pet?</p>

<div style="margin:auto; width:1.5in; padding:0.15in;"><button>Thumbs Up!</button> <button>Return</button></div>


</body>
</html>
