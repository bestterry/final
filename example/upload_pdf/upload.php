<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/1/2561
 * Time: 15:37
 */
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbtuts";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(isset($_POST['btn-upload']))
{
     $file = rand(1000,100000)."-".$_FILES['file']['name'];
     $file_loc = $_FILES['file']['tmp_name'];
     $file_size = $_FILES['file']['size'];
     $file_type = $_FILES['file']['type'];
     $folder="upload/";
     $file_type;

     move_uploaded_file($file_loc,$folder.$file);
     $sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$file','$file_type','$file_size')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
header('location:view.php');
?>

