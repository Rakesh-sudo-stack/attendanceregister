<?php

include './connection.php';

$roll = $_GET['roll'];

$deletquery = " DELETE FROM `studentslist` WHERE roll=$roll ";

$res = mysqli_query($con,$deletquery);

if($res){
    ?>
    <script>
        alert("Successfully Deleted");
    </script>
    <?php
    header('location:index.php');
}else{
    ?>
    <script>
        header("location:index.php");
    </script>
    <?php
}


?>