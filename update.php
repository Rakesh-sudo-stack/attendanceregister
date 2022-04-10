<?php
include './connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
        include './css/style.css';
        ?>
        header{
            position: fixed;
            top: 0;
        }
        .center_div{
            min-height: 100vh;
            width: 100vw;
            background: linear-gradient(rgba(7, 9, 10, 0.63), rgba(6, 9, 10, 0.562)), url('./img/school.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            display: grid;
            place-items: center;
        }
    </style>
    <script src="https://kit.fontawesome.com/40bc81af5c.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>8E Attendance Register</header>
    <div class="center_div">
        <div class="main_div">
            <div class="details">Student Details</div>
            <form action="" method="POST">
            <?php

            $rolls= $_GET['roll'];

            $selectquery = " SELECT * FROM studentslist WHERE roll=$rolls ";

            $query = mysqli_query($con,$selectquery);

            $arrdata = mysqli_fetch_array($query);

            if(isset($_POST['add_student'])){
                $roll = $_POST['roll'];
                $name = $_POST['name'];

                $updatequery = " UPDATE `studentslist` SET `roll`='$roll',`name`='$name' WHERE roll=$rolls";

                $res = mysqli_query($con,$updatequery);

                if($res){
                    ?>
                    <script>
                        alert("Updated Successfully!!");
                    </script>
                    <?php
                    header('location:index.php');
                }else{
                    ?>
                    <script>
                        alert("An Error Occured");
                    </script>
                    <?php
                    
                }




            }

?>
                <input type="text" placeholder="Enter student's roll no" name="roll" value="<?php echo $arrdata['roll']; ?>">
                <input type="text" placeholder="Enter student's name" name="name" value="<?php echo $arrdata['name']; ?>">
                <button name="add_student">UPDATE</button>
            </form>
        </div>
    </div>
</body>
</html>
