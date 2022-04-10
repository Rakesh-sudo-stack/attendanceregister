<?php
include 'connection.php';
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
                <input type="text" placeholder="Enter student's roll no" name="roll" required>
                <input type="text" placeholder="Enter student's name" name="name" required>
                <button name="add_student">ADD</button>
                <br>
                <a href="./attendance/attendance.php">Maintain Attendance</a>
            </form>
        </div>
    </div>
    <div class="studentslist">
        <table border="1">
            <thead>
                <tr>
                    <td>roll no</td>
                    <td>name</td>
                    <td>edit</td>
                    <td>delete</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $selectquery = " SELECT * FROM studentslist ";

                $query = mysqli_query($con,$selectquery);

                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $data['roll']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td><a href="update.php?roll=<?php echo $data['roll']; ?>" style="color:green;"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="delete.php?roll=<?php echo $data['roll']; ?>" style="color:red;"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php

if(isset($_POST['add_student'])){
    $roll = $_POST['roll'];
    $name = $_POST['name'];

    $insertquery = " INSERT INTO `studentslist`(`roll`, `name`) VALUES ('$roll','$name') ";

    $res = mysqli_query($con,$insertquery);

    if($res){
        ?>
        <script>
            alert("Added Successfully!!");
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("Student already added");
        </script>
        <?php
        
    }




}

?>