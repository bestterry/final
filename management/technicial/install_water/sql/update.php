<?php
function connectDB_update(){
    $connent = mysqli_connect('localhost','root','','watermanagement');
    mysqli_set_charset($connent, "utf8");
    return $connent;
}

function update1($table,$colum,$value,$key,$input_key){
    $connect = connectDB_update();
    $sql = "UPDATE $table SET $colum=$value WHERE $key=$input_key";
    $result = mysqli_query($connect,$sql);
    return $result;
}
?>
