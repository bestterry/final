<table width="80%" border="1">
    <tr>
        <td>File Name</td>
        <td>File Type</td>
        <td>File Size(KB)</td>
        <td>View</td>
    </tr>
    <?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "dbtuts";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    $sql="SELECT * FROM tbl_uploads";
    $result_set=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result_set))
    {
        ?>
        <tr>
            <td><?php echo $row['file'] ?></td>
            <td><?php echo $row['type'] ?></td>
            <td><?php echo $row['size'] ?></td>
            <td><a href="upload/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>

        <?php
    }
    ?>
    <a href="uploadpdf.php ?>" ">upload file</a>
</table>