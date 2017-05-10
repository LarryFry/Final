
<!DOCTYPE html>
<html>
  <body>
    <form action="" method="POST" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="myFile" id="myFile">
        <input type="submit" value="Upload Image">
    </form>
  </body>
</html>

<?php
  if(isset($_FILES['myFile'])){
    $file_name= $_FILES['myFile']['name'];
    echo("<br><br>$file_name");

    $file_type= $_FILES['myFile']['type'];
    echo("<br><br>$file_type");

    $file_size= $_FILES['myFile']['size'];
    echo("<br><br>$file_size<br><br>");


    $file_temp_loc = $_FILES['myFile']['tmp_name'];
    $file_store = "uploads/" . $file_name;

    if(move_uploaded_file($file_temp_loc, $file_store)){
      echo("File uploaded succesfully. Check the dir. to see them!");
      echo("<img src='$file_store'>");
      var_dump($_POST);
    }
  }
    else{
      echo("File not uploaded succesfully.<br><br>");
    }
?>
