<?php 
include 'config.php';
Upload_Images();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	
Select File : <input type="file" name="file">
<br>
<input type="submit" name="uploads">
</form>
<h4>Your Image is : </h4>
<?php DisplayImage(); ?>
</body>
</html>
