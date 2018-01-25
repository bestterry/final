<?php
$num = $_GET['description_tool_id'];
require '../../../../connect/connect.php';
$sql = "DELETE FROM description_tool WHERE description_tool_id='$num'";
if (mysqli_query($conn, $sql)) {
    header('Location:../manage_tool.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
