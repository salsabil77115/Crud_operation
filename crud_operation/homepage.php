<!DOCTYPE html>
<html>
<head>
<title>Register Page</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body>
	<form method="post">
		<textarea rows="10" cols="100" name="text"
			placeholder="write comment .."></textarea>
		<br>
		<button id="post" style="margin-left: 230px;">post</button>
	</form>
	<br>
	<br>
<?php
$dbcon = Stalker_Database::instance();

$obj1 = new Crud($dbcon);
$array = $obj1->Read();
foreach ($array as $value) {
    ?>

   <form>
		<input value="<?php echo $value->text ?>" name="text"> <input
			value="<?php echo $value->id ?>" type="hidden" name="id"> <br>
		<button id="update" style="margin-left: 300px;">update</button>
		<button id="delete">delete</button>
	</form>
	<br>
	<br>
 <?php
}
?>
<div id="msg"></div>
	<script src="home.js?version=10" type="text/javascript"></script>
</body>
</html>
