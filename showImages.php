<?php
require("conn.php");
$result = mysqli_query($conn, "SELECT * FROM comments");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery</title>
</head>
<body>
    <div>
    <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div>";
        echo "<p><b>Uid: </b>" .$row['uid']."</p>";
        echo "<p><b>Messgae: </b>".$row['message']."</p>";
      	echo "<img src='images/".$row['imgFullNameGallery']."' >";
      	
      echo "</div><br>";
    }
  ?>
    </div>
</body>
</html>