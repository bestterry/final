<?php
    function connectDB_select(){
        $connent = mysqli_connect('localhost','root','','watermanagement');
        mysqli_set_charset($connent, "utf8");
        return $connent;
    }

    function select_star($table){
        $connect = connectDB_select();
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($connect,$sql);
        return $result;
    }
    function select_star_where($table,$colum,$value){
        $connect = connectDB_select();
        $sql = "SELECT * FROM $table WHERE $colum='$value'";
        $result = mysqli_query($connect,$sql);
        return $result;
    }
    function select_star_inner($table,$table2,$join1,$join2,$colum,$value){
        $connect = connectDB_select();
        $sql = "SELECT * FROM $table INNER JOIN $table2 ON $join1=$join2 WHERE $colum=$value";
        $result = mysqli_query($connect,$sql);
        return $result;
    }
?>
