<?php
include '../connection.php';
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
        include '../css/style.css';
        ?>
        form{
            position: relative;
            width:100%;
        }
        form button{
            position:absolute;
            bottom:-7%;
            left:50%;
            transform:translate(-50%,-50%);
            background: linear-gradient(to right,rgb(56, 56, 180),rgb(153, 153, 245));
            height:2rem;
            width:5rem;
            border-radius:1rem;
        }
    </style>
    <script src="https://kit.fontawesome.com/40bc81af5c.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>8E Attendance Register</header>
    <div class="studentslist">
        <form action="" method="POST">
            <table border="1">
                <thead>
                    <tr>
                        <td>roll no</td>
                        <td>name</td>
                        <td>status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $selectquery = " SELECT * FROM studentslist ";

                    $query = mysqli_query($con,$selectquery);
                    $totalStudents = array();

                    while($data = mysqli_fetch_array($query)){
                        array_push($totalStudents,$data['name']);
                        ?>
                        <tr>
                            <td><?php echo $data['roll']; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><input type="checkbox" name="status[]" id="" value="<?php echo $data['name']; ?>"></td>
                        </tr>
                        <?php
                    }
                    
                    ?>
                </tbody>
            </table>
            <input type="date" name="date" id="" required />
            <a href="./attendance_check/checkaattendance.php">CHECK ATTENDANCE</a>
            <button name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
<?php

if(isset($_POST['submit'])){
    $date = $_POST['date'];
    if(empty($_POST['status'])){
        ?>
        <script>alert("No Checkbox is checked");</script>
        <?php
    }else{
        $status = $_POST['status'];
        foreach($totalStudents as $value){
            if(in_array($value,$status,TRUE)){
                $attendance = "PRESENT";
                $insertquery = " INSERT INTO `attendance_register`(`name`, `status`, `date`) VALUES ('$value','$attendance','$date') ";
                $query = mysqli_query($con,$insertquery);
            }else{
                $attendance = "ABSENT";
                $insertquery = " INSERT INTO `attendance_register`(`name`, `status`, `date`) VALUES ('$value','$attendance','$date') ";
                $query = mysqli_query($con,$insertquery);
            }
        };
    }
}

?>