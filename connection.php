<?php

$username = "root";
$password = "";
$server = "localhost";
$database = "registerdb";

$con = mysqli_connect($server,$username,$password);
$db = mysqli_select_db($con,$database);

if($con){
    ?>
    <script>
        alert("connected");
    </script>
    <?php
}else{
    ?>
    <script>
        alert("not connected");
    </script>
    <?php
    die();
}

?>