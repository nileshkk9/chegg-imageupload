<?php
  // Create database connection
  
  require("conn.php");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
    // Get text
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $date = $_POST['date'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);

  	// $image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO comments (uid, date,message,imgFullNameGallery) VALUES ('$uid', '$date','$message','$image')";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<form  method="POST" action="index.php" enctype="multipart/form-data">
<input type="hidden" name="size" value="50000000">
 Uid: <input type="text" name="uid"><br><br>
  Date: <input type="date" name="date"><br><br>
  Message: <input type="text" name="message"><br><br>
  Image FullName Gallery : <input type="file" name="image">
  
  		<button type="submit" name="upload">Upload</button>
  	
</form>

<h3>
    <?php
    echo $msg;
    ?>
</h3>
</body>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>