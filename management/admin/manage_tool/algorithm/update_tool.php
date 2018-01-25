<html>
<head>
</head>
<body>
<?php


require '../../../../connect/connect.php';
$sql="UPDATE description_tool SET
      name_tool='".$_GET["txtnametool"]."',
      num_tool='".$_GET["txtnumtool"]."',
      description_tool_id='".$_GET["txtidtool"]."',
      price_tool = '".$_GET["txtpricetool"]."'
      WHERE description_tool_id = '".$_GET["txtidtool"]."'
     ";

$query = mysqli_query($conn,$sql);

if($query) {
    header('location:../manage_tool.php');
}
else {
    echo 'ผิดไอ้ควาย';
}


mysqli_close($conn);
?>
</body>
</html>
