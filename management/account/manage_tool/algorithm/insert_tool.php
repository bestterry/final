<html>
<head>
</head>
<body>
<?php
$idtool = $_GET['txttoolid'];
require '../../../../connect/connect.php';

$sql_checkid="SELECT * FROM description_tool WHERE description_tool_id='$idtool'";
$objq_checkid = mysqli_query($conn, $sql_checkid);
$result  = mysqli_fetch_array($objq_checkid);
if ($result['description_tool']){
    header('location:../tool.php?status=HaveData');
}else {
    $sql = "INSERT INTO description_tool(description_tool_id, name_tool, num_tool, price_tool)
                 VALUES ('".$_GET['txttoolid']."','".$_GET['txtname_tool']."','".$_GET['txtnum']."','".$_GET['txtprice']."')";
    $query = mysqli_query($conn,$sql);
    if($query) {
        header('location:../manage_tool.php');
    }
    else {
        echo 'ERROR';
    }
    mysqli_close($conn);
}
?>
</body>
</html>