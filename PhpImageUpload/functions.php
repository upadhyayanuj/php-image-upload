<?php 

$upload_directory = "imgs";


function redirect($location){
return header("Location: $location ");
}

 function query($sql){
	global $connection;
	return mysqli_query($connection, $sql);
}

function confirm($result){
	global $connection;
	if(!$result){
    		die("Something went wrong " . mysqli_error($connection));
    	}
}

function escape_string($string){
	global $connection;
	return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
	return mysqli_fetch_array($result);
}

function display_image($picture) {
	global $upload_directory;
	return $upload_directory  . DS . $picture;
}


function Upload_Images(){
	if(isset($_POST['uploads'])) {
		$myfile= escape_string($_FILES['file']['name']);
		$image_temp_location    = escape_string($_FILES['file']['tmp_name']);
	
		if( $_FILES['file']['name'] != "" ){
			   copy ( $image_temp_location, UPLOAD_DIR . DS . $myfile) or die( "Could not copy file" );
		}
		else{
			 die( "No file specified" );
		}
	
		$query = query("INSERT INTO img_table VALUES(NULL, '{$myfile}')");
		confirm($query);
		echo "Upladed";
	}
}


function DisplayImage(){
	$querys = query("SELECT * FROM img_table");
	confirm($querys);

	while($pic = fetch_array($querys)) {
		$images = display_image($pic['img_name']);
		//$images = $pic['img_name'];
		$display = <<<DELIMETER
		<img height='100px' src="{$images}" alt="">
DELIMETER;
		echo $display;
	}
}
?>