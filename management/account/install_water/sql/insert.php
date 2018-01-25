<?php
function connectDB_insert(){
    $connent = mysqli_connect('localhost','root','','waterwork');
    mysqli_set_charset($connent, "utf8");
    return $connent;
}

function insert1($table,$colum1,$colum2,$value1,$value2){
    $connect = connectDB_insert();
    $sql = "INSERT INTO $table($colum1,$colum2) VALUES ('$value1','$value2')";
    $result = mysqli_query($connect,$sql);
    return $result;
}
?>
